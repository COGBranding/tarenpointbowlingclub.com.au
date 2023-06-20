<?php
// RETURN IF CALLED DIRECTLY BY PATH
if (!defined('WPINC')) {
    die;
}

function create_whats_on_post_type() {

	/**
	 * Post Type: Whats' On.
	 */

	$labels = [
		"name" => esc_html__( "Events", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "Event", "custom-post-type-ui" ),
		"menu_name" => esc_html__( "What's On", "custom-post-type-ui" ),
		"all_items" => esc_html__( "All Events", "custom-post-type-ui" ),
		"add_new" => esc_html__( "Add New Events", "custom-post-type-ui" ),
		"add_new_item" => esc_html__( "Add New Events", "custom-post-type-ui" ),
		"edit_item" => esc_html__( "Edit Events", "custom-post-type-ui" ),
		"new_item" => esc_html__( "New Events", "custom-post-type-ui" ),
		"view_item" => esc_html__( "View Events", "custom-post-type-ui" ),
		"view_items" => esc_html__( "View Events", "custom-post-type-ui" ),
		"search_items" => esc_html__( "Search Events", "custom-post-type-ui" ),
		"not_found" => esc_html__( "Events not found", "custom-post-type-ui" ),
		"parent" => esc_html__( "Parent Events", "custom-post-type-ui" ),
		"parent_item_colon" => esc_html__( "Parent Events", "custom-post-type-ui" ),
	];

	$args = [
		"label" => esc_html__( "What's On", "custom-post-type-ui" ),
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
		"rewrite" => [ "slug" => "whats-on", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title"],
		"show_in_graphql" => true,
    ];

	register_post_type("whats-on", $args );
}

add_action( 'init', 'create_whats_on_post_type' );

// Add the custom columns to the book post type:
add_filter( 'manage_whats-on_posts_columns', 'set_custom_edit_whats_on_post_column' );
function set_custom_edit_whats_on_post_column($columns) {
    $columns['shortcode'] = "Shortcode";
    return $columns;
}

// Add the data to the custom columns for the book post type:
add_action( 'manage_whats-on_posts_custom_column' , 'custom_whats_on_column', 10, 2 );
function custom_whats_on_column( $column, $post_ID ) {
    switch ( $column ) {
        case 'shortcode' :
			echo "<code>";
            echo '[get_events id="' . $post_ID . '" name="'.get_the_title().'"]';
			echo "</code>";
            break;

    }
}