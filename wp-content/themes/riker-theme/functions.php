<?php

// Setting up initials for our riker theme
function riker_basics() {

	add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );

}
add_action( 'after_setup_theme', 'riker_basics' );

// Loading our riker theme styles
function riker_styles() {

    wp_enqueue_style( 'main-css', get_stylesheet_directory_uri() . '/dist/css/style.css', [ 'reset-css' ], '', 'all' );
    wp_enqueue_style( 'reset-css', get_stylesheet_directory_uri() . '/dist/css/reset.css', array(), '', 'all' );

}
add_action( 'wp_enqueue_scripts', 'riker_styles' );

// Loading our riker theme scripts
function riker_scripts() {
    wp_enqueue_script( 'main-js', get_template_directory_uri() . '/dist/js/main.js', array(), '', true );
}
add_action( 'wp_enqueue_scripts', 'riker_scripts' );

// Setting up our riker sidebar
function riker_sidebar() {
    register_sidebar([
      'name'          => esc_html__( 'Main Sidebar', 'riker-theme' ),
      'id'            => 'main-sidebar',
      'description'   => esc_html__( 'Add widgets for main sidebar here', 'riker-theme' ),
      'before_widget' => '<section class="widget">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title aside-heading">',
      'after_title'   => '</h2>',
    ]);
}
add_action( 'widgets_init', 'riker_sidebar' );