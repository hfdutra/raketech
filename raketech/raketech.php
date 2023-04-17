<?php
/**
 * Plugin Name: Plugin Raketech
 * Plugin URI: https://github.com/hfdutra/raketech
 * Description: Plugin task for the role of WordPress Developer at Raketech.
 * Version: 1.0.0
 * Author: Henrique Ferreira
 * Author URI: https://github.com/hfdutra/
 * License: GPL2
 */

// Register shortcode
function shortcode_raketech() {
    ob_start();
    display_json_info();
    return ob_get_clean();
}
add_shortcode('plugin-raketech', 'shortcode_raketech');

// Register CSS file
function raketech_plugin_enqueue_styles() {
    wp_enqueue_style( 'raketech_plugin-styles', plugin_dir_url( __FILE__ ) . 'assets/css/styles.css' );
}
add_action( 'wp_enqueue_scripts', 'raketech_plugin_enqueue_styles' );

// Function for displaying information from the JSON file.
function display_json_info() {
    // Read JSON file
    $json_string = file_get_contents(plugin_dir_path(__FILE__) . 'assets/json/data.json');
    
    // Converting JSON into a PHP object
    $data = json_decode($json_string);
    
    // Loop through each item in the 'toplists' property
    foreach ($data->toplists as $key => $toplist) {

    // Start of shortcode content
    ?>
    <div class="rake">
        <div class="theader">
            <div class="table-header">Casino</div>
            <div class="table-header">Bonus</div>
            <div class="table-header">Features</div>
            <div class="table-header">Play</div>
        </div>
    
        <?php

        // Sort the toplist based on the "position" key
        usort($toplist, function ($a, $b) {
            return $a->position <=> $b->position;
        });        
    
        // Loop through each item on the toplist
        foreach ($toplist as $item) {
            include('loop.php');
        }
        
    // End of shortcode content
    echo "</div>";
    }
}

?>