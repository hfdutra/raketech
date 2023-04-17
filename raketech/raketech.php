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
    exibir_informacoes_json();
    return ob_get_clean();
}
add_shortcode('plugin-raketech', 'shortcode_raketech');

// Register CSS file
function raketech_plugin_enqueue_styles() {
    wp_enqueue_style( 'raketech_plugin-styles', plugin_dir_url( __FILE__ ) . 'assets/css/styles.css' );
}
add_action( 'wp_enqueue_scripts', 'raketech_plugin_enqueue_styles' );

// Function for displaying information from the JSON file.
function exibir_informacoes_json() {
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
    
        // Loop through each item on the toplist
        foreach ($toplist as $item) {
            ?>
            <div class="table loop">
                <div class="table-row">
                <!-- First Column: Casino -->
                    <div class="table-cell brand">
                        <?php echo '<img src="'. $item->logo .'" class="brand-logo" width="100%">'; ?>
                        <a href="<?php echo get_site_url(). '/' . $item->brand_id; ?>" class="review">Review</a>
                    </div>
                <!-- Second Column: Casino -->
                    <div class="table-cell bonus">
                        <span class="rating">
                            <!-- require star rating file -->
                        <?php include('rating.php'); ?>
                        </span>
                        <span class="bonus">
                            <?php echo $item->info->bonus; ?>
                        </span>
                    </div>
                <!-- Third Column: Features -->
                    <div class="table-cell features">
                        <ul class="icon-list">
                        <?php foreach ($item->info->features as $feature) { ?>
                            <li><i class="fa fa-arrow-right"></i> <?php echo $feature; ?></li>
                        <?php } ?>
                        </ul>
                    </div>
                <!-- Fourth Column: Play -->
                    <div class="table-cell play">
                        <a href="<?php echo $item->play_url; ?>" class="play-btn">Play now</a>
                        <br>
                        <span class="terms">
                            <?php echo $item->terms_and_conditions; ?>
                        </span>
                    </div>
                </div>
            </div>
            <?php
        }

    // End of shortcode content
    echo "</div>";
    }
}

?>