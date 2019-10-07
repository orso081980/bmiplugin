<div class="bmi-background">
   <div class="bmi-calculator">
      <div class="container-fluid header">
         <h2>BMI calculator</h2>
         <a href="#" id="reset">Reset</a>
      </div>
      <div class="container-fluid body">
         <form action="/send.php" id="formid" method="post" data-parsley-validate="">
            <div class="row">
               <div class="col-md-4">
                  <div class="row">
                     <h3 class="col-md-8">Height</h3>
                     <p class="switch col-md-4">cm</p>
                  </div>

                  <div class="antbits-bmi-form_section_layer antbits-bmi-metric">
                     <div>
                        <label for="antbits-bmi-cm" class="antbits-bmi-form_section_label">Centimetres</label>
                        <input class="form-control" id="antbits-bmi-cm" aria-describedby="antbits-bmi-form_height-error" alt="height, centimeters" inputmode="numeric" type="text" step="0.1" min="0" maxlength="5" name="centimeter" placeholder="cm" required="">
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="row">
                     <h3 class="col-md-7">Weight</h3>
                     <p class="col-md-5 switch">st, lb</p>
                  </div>
                  <div class="antbits-bmi-form_section_layer antbits-bmi-imperial"> 
                     <div>
                        <label for="antbits-bmi-kg" class="antbits-bmi-form_section_label">Kg</label>
                        <input class="form-control" id="antbits-bmi-kg" placeholder="Kg" alt="kg" type="text" inputmode="numeric" min="0" maxlength="3" required="" name="kilogram" required="">
                     </div>

                  </div>
               </div>
               <div class="col-md-4">
                  <h3>Age</h3>
                  <div class="antbits-bmi-form_section_inner">
                     <div>
                        <label for="antbits-bmi-age" class="antbits-bmi-form_section_label antbits-accessible_hidden">Age in years</label>
                        <?php include 'include/age.php'; ?>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <h3>Sex<small>?</small></h3>
                  <div class="info hide">
                     <h3>Sex</h3>
                     <p>For children, BMI centile is gender specific. For both children and adults, we give more personalised information based on whether you are male or female.</p>
                  </div>
                  <div class="radio-click row height">
                     <div class="radio-inline col-md-6 checked" id="male">
                        <input type="radio" name="optradio" value="male">Male
                     </div>
                     <div class="radio-inline col-md-6" id="female">
                        <input type="radio" name="optradio" value="female">Female
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <h3>Ethnic Group (optional)<small>?</small></h3>
                  <div class="info hide">
                     <h3>Ethnic</h3>
                     <p>Black, Asian and other minority ethnic groups with a BMI of 23 or more have a higher risk of getting type 2 diabetes and other long term illnesses.</p>
                  </div>
                  <select class="form-control" id="antbits-bmi-ethnicity" alt="Ethnic group" name="ethnic" required="">
                     <option disabled selected value class="antbits-bmi-form_option">Not stated</option>
                     <option value="2" class="antbits-bmi-form_option">White</option>
                     <option value="3" class="antbits-bmi-form_option">Black Caribbean</option>
                     <option value="4" class="antbits-bmi-form_option">Black African</option>
                     <option value="5" class="antbits-bmi-form_option">Indian</option>
                     <option value="6" class="antbits-bmi-form_option">Pakistani</option>
                     <option value="7" class="antbits-bmi-form_option">Bangladeshi</option>
                     <option value="8" class="antbits-bmi-form_option">Chinese</option>
                     <option value="9" class="antbits-bmi-form_option">Middle Eastern</option>
                     <option value="10" class="antbits-bmi-form_option">Mixed</option>
                     <option value="11" class="antbits-bmi-form_option">Other</option>
                  </select>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <h3>Activity Level</h3>
                  <p>So we can personalize your results</p>
                  <div class="slidercontainer">
                     <input type="range" min="0" max="150" value="75" class="slider" id="myRange" name="range">
                     <div class="row center height activity">
                        <div class="col-md-4">
                           <p>Inactive</p>
                        </div>
                        <div class="col-md-4">
                           <p>Moderate Active</p>
                        </div>
                        <div class="col-md-4">
                           <p>Active</p>
                        </div>
                     </div>
                     <div class="row center height">
                        <div class="col-md-4">
                           <p>Less than 30 minutes a week</p>
                        </div>
                        <div class="col-md-4">
                           <p>Between 30 and 60 minutes a week</p>
                        </div>
                        <div class="col-md-4">
                           <p>Between 60 and 150 minutes a week</p>
                        </div>
                     </div>
                     <!-- <p>Value: <span id="demo"></span></p> -->
                  </div>
               </div>

            </div>
            <!-- <div id="chartContainer"></div> -->
            <div class="center">
               <input type="submit" value="Calculate" id="submit">
            </div>
         </form>
      </div>
   </div>
</div>