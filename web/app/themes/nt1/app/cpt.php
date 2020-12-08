<?php

function cptui_register_my_cpts() {

    /**
     * Post Type: Paslaugos.
     */

    $labels = [
        "name" => __( "Paslaugos", "nt1" ),
        "singular_name" => __( "Paslauga", "nt1" ),
    ];

    $args = [
        "label" => __( "Paslaugos", "nt1" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => [ "slug" => "services", "with_front" => true ],
        "query_var" => true,
        "menu_position" => 5,
        "supports" => [ "title" ],
    ];

    register_post_type( "services", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );
