<?php
function cptui_register_countdown_cpts() {

/**
* Post Type: Draws.
*/

	$labels = [
		"name" => esc_html__("Draws", ""),
		"singular_name" => esc_html__("Draw", ""),
		"menu_name" => esc_html__("Draws", ""),
		"all_items" => esc_html__("All Draws", ""),
		"add_new" => esc_html__("Add new Draws", ""),
		"add_new_item" => esc_html__("Add new Draws", ""),
		"edit_item" => esc_html__("Edit Draws", ""),
		"new_item" => esc_html__("New Draws", ""),
		"view_item" => esc_html__("View Draws", ""),
		"view_items" => esc_html__("View Draws", ""),
		"search_items" => esc_html__("Search Draws", ""),
		"not_found" => esc_html__("Draws not found", ""),
		"parent" => esc_html__("Parent Draws", ""),
		"parent_item_colon" => esc_html__("Parent Draws", ""),
	];

	$args = [
		"label" => esc_html__("Draws", ""),
		"labels" => $labels,
		"description" => "",
		"public" => false,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"menu_icon"           => "dashicons-megaphone",
		"delete_with_user" => false,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => ["slug" => "draws", "with_front" => true],
		"query_var" => true,
		"supports" => ["title", "custom-fields"],
		"show_in_graphql" => false,
	];

	register_post_type("Draws", $args);
	
	
	
}

add_action( 'init', 'cptui_register_countdown_cpts' );

// Add the custom columns to the book post type:
add_filter( 'manage_draws_posts_columns', 'set_custom_edit_book_columns' );
function set_custom_edit_book_columns($columns) {
    $columns['shortcode'] = "Shortcode";
    return $columns;
}

// Add the data to the custom columns for the book post type:
add_action( 'manage_draws_posts_custom_column' , 'custom_book_column', 10, 2 );
function custom_book_column( $column, $post_ID ) {
    switch ( $column ) {
        case 'shortcode' :
            echo '[countdown id="' . $post_ID . '"]';
            break;

    }
}
