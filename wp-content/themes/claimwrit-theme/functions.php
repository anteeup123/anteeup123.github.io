<?php
/**
 * Theme setup: register nav menus, add support for title tag, post thumbnails, etc.
 */
function claimwrit_theme_setup() {
    // Let WordPress manage the document title
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support( 'post-thumbnails' );

    // Register a Primary Menu location
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'textdomain' ),
    ) );
}
add_action( 'after_setup_theme', 'claimwrit_theme_setup' );

/**
 * Enqueue theme styles and scripts
 */
function claimwrit_enqueue_assets() {
    // Main stylesheet
    wp_enqueue_style(
        'claimwrit-style',
        get_stylesheet_uri(),
        array(),
        filemtime( get_template_directory() . '/style.css' )
    );

    // Navigation script (if any)
    if ( file_exists( get_template_directory() . '/scripts.js' ) ) {
        wp_enqueue_script(
            'claimwrit-nav',
            get_template_directory_uri() . '/scripts.js',
            array( 'jquery' ),
            filemtime( get_template_directory() . '/scripts.js' ),
            true
        );
    }
}
add_action( 'wp_enqueue_scripts', 'claimwrit_enqueue_assets' );
