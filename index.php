<?php

/*
Plugin Name: My bmi calculator
Version: 1.0
Description: A great plugin to calculate your weight
Author: Maffei Marco
*/

include 'style.php';

function render_form_request($atts , $content){
    $atts = shortcode_atts( array(
        'data'=>'0'
    ) , $atts);

    $content =  (empty($content))? " " : $content;

    extract($atts);
    ob_start();

    include( dirname(__FILE__) . '/bmi.php' );

    return ob_get_clean();
}
add_shortcode('form_request' , 'render_form_request' );


function wpse_load_plugin_scripts() {

	$plugin_url = plugin_dir_url( __FILE__ );

	wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js');
    wp_enqueue_script('parsley', 'https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.1/parsley.min.js');
    wp_enqueue_script('canvasjs', 'https://canvasjs.com/assets/script/canvasjs.min.js');
    wp_enqueue_script('main_script', $plugin_url . 'js/bmijs.js');

    
    wp_enqueue_style( 'style1', $plugin_url . 'css/style.css' );
    wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' );

}
add_action( 'wp_enqueue_scripts', 'wpse_load_plugin_scripts' );
