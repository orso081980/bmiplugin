$(document).ready(function() {
   $('form').on('change', function() {

      console.log('change');
      var instance = $(this).parsley();
      console.log(instance.isValid());
      if (instance.isValid()) {
          console.log('vero');
         $('#submit').prop('disabled', false).addClass('valid');
      } else {
          console.log('falso');
         $('#submit').prop('disabled', 'disabled');
      }
      
   });

   $('#reset').click(function(e) {
      e.preventDefault();
      $('form').find('input[name=centimeter], input[name=kilogram], select, textarea').val('');
   });

   $('#male').click(function(){
      $(this).children('input').prop("checked", true);
   });

   $('#female').click(function(){
      $(this).children('input').prop("checked", true);
   });

   $('.radio-inline').click(function() {
      if ($('.radio-inline').hasClass('checked')) {
         $('.radio-inline').toggleClass('checked');
      }
   });

   $('h3 small').hover(function(){
      $(this).parent().next().toggleClass('hide');
   });

   

   $(document).on('submit', 'form', function(event) {

      $.ajax({
         type        : 'POST',
         url         : $(this).attr("action"),
         data        : $(this).serialize(),
         dataType    : 'json',
         encode      : true
      }).done(function(data) {
         // console.log(data);
         var result = data.kilogram/Math.pow((data.centimeter/100), 2);

         var result3 = result.toFixed(2);
         var result2 = '<div id="chartContainer"></div>';
         result2 += '<div class="results">'+result.toFixed(2);

         var bmiback = '<a id="clickhere">Back</a>';
         $('.header').append(bmiback);

         if (result > 25) {
            result2 += '<div>Your should loose at least the 5% of your weight</div>'
         } else if (result > 18.5) {
            result2 += '<div>Your weight is ideal</div>'
         } else {
            result2 += '<div>You\'re underweight, you should take integrate your diet with different food and eat more often</div>'
         }

         
         result2 += '</div>';
         var clickhere = $('#clickhere');
         var form = $('form');
         $('.body').append(result2);
         $('form').hide();

         $(document).on("click", "#clickhere" , function() {
            $('.results').remove();
            $('form').show();
            $('#clickhere').remove();
            $('#chartContainer').remove();
         });

         var gauge = {
            title:{ text: "BMI" },
            data : { y: result3 },
            maximum : 30
         };

         var chart = new CanvasJS.Chart("chartContainer");
         createGauge(chart);

         function createGauge(chart){
            gauge.unoccupied = {
               y: gauge.maximum - gauge.data.y , 
               color: "#e3e3e3", 
               toolTipContent: null, 
               highlightEnabled: false,
               click : function (){ gauge.unoccupied.exploded = true; }
            }
            gauge.data.click = function (){ gauge.data.exploded = true; };
            if(!gauge.data.color)
               gauge.data.color = "#6b58f2";
            gauge.valueText = {text: gauge.data.y.toString(), verticalAlign :"center"};

            var data = {
               type: "doughnut",
               dataPoints: [
               {
                  y: gauge.maximum ,
                  color: "transparent",
                  toolTipContent: null
               },
               gauge.data,
               gauge.unoccupied
               ],
            };

            if(!chart.options.data)
               chart.options.data = [];
            chart.options.data.push(data);

            if(gauge.title){
               chart.options.title = gauge.title;
            }

            if(!chart.options.subtitles)
               chart.options.subtitles = [];
            chart.options.subtitles.push(gauge.valueText);

            chart.render();
         }


      });

      event.preventDefault();
   });

});
