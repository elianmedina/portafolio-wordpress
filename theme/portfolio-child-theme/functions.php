<?php
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('gafata-font', 'https://fonts.googleapis.com/css2?family=Gafata&display=swap', false);
    wp_enqueue_style('portfolio-child-style', get_stylesheet_uri(), array('hello-elementor'));
});
