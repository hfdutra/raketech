<?php
    // Convert the rating to a number of stars
    $stars = round($item->info->rating);

    // Create an HTML string to display the stars
    $stars_html = '';
    for ($i = 1; $i <= 5; $i++) {
        $class = ($i <= $stars) ? 'filled' : 'empty';
        $stars_html .= '<i class="star fa fa-star ' . $class . '"></i>';
    }

    // Showing the stars 
    echo '<div class="rating">' . $stars_html . '</div>';
?>
