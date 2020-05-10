<?php
/**
 * Plugin Name: MapQuality
 * Description: An easy-to-use plugin to add a map to your website
 * Version: 1.0
 * Author: Pierluigi Barocci
 * Author URI: https://github.com/PierluigiBarocci
 */

function add_tomtom_scripts() {
    include 'scripts/tomtomscripts.php';
};


function calling_tomtom_api( $atts = array() ) {

    $atts = shortcode_atts( array(
        'token' => '',
        'city' => 'Roma',
        'cap' => '00184',
        'via' => 'Piazza del Colosseo 1',
        'stato' => 'italia',
    ), $atts);

    $key = $atts['token'];
    $city = $atts['city'];
    $cap = $atts['cap'];
    $via = $atts['via'];
    $stato = $atts['stato'];

    $full_address = $city . ' ' . $cap . ' ' . $via;

    $request_uri_tomtom = ' https://api.tomtom.com/search/2/geocode/' . $full_address . '.json?countrySet=' . $stato . '&key=' . $key;
    $request_tomtom = wp_remote_get( $request_uri_tomtom );
    $response_tomtom = wp_remote_retrieve_body( $request_tomtom );
    $response_tomtom_decoded = json_decode( $response_tomtom );
    $current_lat = $response_tomtom_decoded->results[0]->position->lat;
    $current_lon = $response_tomtom_decoded->results[0]->position->lon;
    
    ob_start();
    echo '<div id="map" style="height: 300px; width: 100%;"></div>';
    include 'scripts/mapscript.php';
    return ob_get_clean();
}



add_action('wp_head', 'add_tomtom_scripts');
add_shortcode( 'map_quality', 'calling_tomtom_api' );