<?php

// Return if called directly by path
if (!defined ('WPINC')) {
    die;
}

function cptui_register_announcement_cpts() {
    /**
     * Post type: Announcement
     */

     $labels = [
         "name" => esc_html__( "Announcements", "custom-post-type-ui" ),
         "singular_name" => esc_html__( "Announcement", "custom-post-type-ui" ),
         "menu_name" => esc_html__( "Announcements", "custom-post-type-ui" ),
         "all_items" => esc_html__( "All Announcements", "custom-post-type-ui" ),
         "add_new" => esc_html__( "Add New Announcement", "custom-post-type-ui" ),
         "add_new_item" => esc_html__( "Add New Announcement", "custom-post-type-ui" ),
         "edit_item" => esc_html__( "Edit Announcement", "custom-post-type-ui" ),
         "new_item" => esc_html__( "New Announcement", "custom-post-type-ui" ),
         "view_item" => esc_html__( "View Announcement", "custom-post-type-ui" ),
         "view_items" => esc_html__( "View Announcement", "custom-post-type-ui" ),
         "search_items" => esc_html__( "Search Announcement", "custom-post-type-ui" ),
         "not_found" => esc_html__( "Announcement not found", "custom-post-type-ui" ),
         "parent" => esc_html__( "Parent Announcement", "custom-post-type-ui" ),
         "parent_item_colon" => esc_html__( "Parent Announcement", "custom-post-type-ui" ),
     ];

     $args = [
        "label" => esc_html__( "Announcements", "custom-post-type-ui" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "can_export" => false,
        "rewrite" => [ "slug" => "announcements", "with_front" => true ],
        "query_var" => true,
        "supports" => [ "title"],
        "show_in_graphql" => true,
        "menu_icon" => 'dashicons-images-alt2'
	];

    register_post_type("announcements", $args);
}
add_action ( 'init', 'cptui_register_announcement_cpts' );