<?php

/**
 * Theme setup.
 */

namespace App;

use function Roots\asset;

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('sage/vendor.js', asset('scripts/vendor.js')->uri(), ['jquery'], null, true);
    wp_enqueue_script('swiper-js', get_stylesheet_directory_uri() . '/resources/assets/scripts/swiper-bundle.min.js', ['jquery'], null, true);
    wp_enqueue_script('sage/app.js', asset('scripts/app.js')->uri(), ['sage/vendor.js', 'jquery', 'swiper-js'], null, true);

    wp_add_inline_script('sage/vendor.js', asset('scripts/manifest.js')->contents(), 'before');

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    if (!empty(get_query_var('retype')) && !empty(get_query_var('reobj'))) {
	    wp_enqueue_script('fancybox-js', get_stylesheet_directory_uri() . '/resources/assets/scripts/jquery.fancybox.min.js', ['jquery'], null, true);
	    wp_enqueue_style('fancybox-css', get_stylesheet_directory_uri() . '/resources/assets/styles/jquery.fancybox.min.css', false, null);

	    wp_enqueue_script('maps-js', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyD-MB6x16RzU_f51DYwbMM5XU-2zw6lajk', [], null, true);
	    wp_enqueue_script('gmaps-js', get_stylesheet_directory_uri() . '/resources/assets/scripts/gmaps.min.js', ['maps-js'], null, true);
    }

    wp_enqueue_style('swiper-css', get_stylesheet_directory_uri() . '/resources/assets/styles/swiper-bundle.min.css', false, null);
    wp_enqueue_style('sage/app.css', asset('styles/app.css')->uri(), ['swiper-css'], null);
}, 100);

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
    if ($manifest = asset('scripts/manifest.asset.php')->get()) {
        wp_enqueue_script('sage/vendor.js', asset('scripts/vendor.js')->uri(), $manifest['dependencies'], null, true);
        wp_enqueue_script('sage/editor.js', asset('scripts/editor.js')->uri(), ['sage/vendor.js'], null, true);

        wp_add_inline_script('sage/vendor.js', asset('scripts/manifest.js')->contents(), 'before');
    }

    wp_enqueue_style('sage/editor.css', asset('styles/editor.css')->uri(), false, null);
}, 100);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');
    add_theme_support('custom-logo');

	add_image_size( 'xlarge', 1920, 1920 );

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
        'footer_navigation' => __('Footer Navigation', 'sage'),
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Add theme support for Wide Alignment
     * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#wide-alignment
     */
    add_theme_support('align-wide');

    /**
     * Enable responsive embeds
     * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Enable theme color palette support
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#block-color-palettes
     */
    add_theme_support('editor-color-palette', [
        [
            'name'  => __('Primary', 'sage'),
            'slug'  => 'primary',
            'color' => '#525ddc',
        ]
    ]);
}, 20);

/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary'
    ] + $config);

    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id' => 'sidebar-footer'
    ] + $config);
});

require_once 'cpt.php';
