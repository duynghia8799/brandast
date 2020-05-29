<?php
// Register Custom Post Type
function service_func() {

	$labels = array(
		'name'                  => _x( 'Dịch Vụ', 'Post Type General Name', 'sontq' ),
		'singular_name'         => _x( 'Dịch Vụ', 'Post Type Singular Name', 'sontq' ),
		'menu_name'             => __( 'Dịch Vụ', 'sontq' ),
		'name_admin_bar'        => __( 'Dịch Vụ', 'sontq' ),
		'archives'              => __( 'Item Archives', 'sontq' ),
		'attributes'            => __( 'Item Attributes', 'sontq' ),
		'parent_item_colon'     => __( 'Parent Item:', 'sontq' ),
		'all_items'             => __( 'All Items', 'sontq' ),
		'add_new_item'          => __( 'Add New Item', 'sontq' ),
		'add_new'               => __( 'Add New', 'sontq' ),
		'new_item'              => __( 'New Item', 'sontq' ),
		'edit_item'             => __( 'Edit Item', 'sontq' ),
		'update_item'           => __( 'Update Item', 'sontq' ),
		'view_item'             => __( 'View Item', 'sontq' ),
		'view_items'            => __( 'View Items', 'sontq' ),
		'search_items'          => __( 'Search Item', 'sontq' ),
		'not_found'             => __( 'Not found', 'sontq' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'sontq' ),
		'featured_image'        => __( 'Featured Image', 'sontq' ),
		'set_featured_image'    => __( 'Set featured image', 'sontq' ),
		'remove_featured_image' => __( 'Remove featured image', 'sontq' ),
		'use_featured_image'    => __( 'Use as featured image', 'sontq' ),
		'insert_into_item'      => __( 'Insert into item', 'sontq' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'sontq' ),
		'items_list'            => __( 'Items list', 'sontq' ),
		'items_list_navigation' => __( 'Items list navigation', 'sontq' ),
		'filter_items_list'     => __( 'Filter items list', 'sontq' ),
	);
	$args = array(
		'label'                 => __( 'Dịch Vụ', 'sontq' ),
		'description'           => __( 'Post Type Project', 'sontq' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
		'taxonomies'            => array( 'service_group' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-awards',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'Service', $args );

}
add_action( 'init', 'service_func', 0 );


// Register Sector Taxonomy
function service_group_func() {

    $labels = array(
        'name'                       => _x( 'Group Service', 'Taxonomy General Name', 'sontq' ),
        'singular_name'              => _x( 'Group Service', 'Taxonomy Singular Name', 'sontq' ),
        'menu_name'                  => __( 'Group Service', 'sontq' ),
        'all_items'                  => __( 'All Items', 'sontq' ),
        'parent_item'                => __( 'Parent Item', 'sontq' ),
        'parent_item_colon'          => __( 'Parent Item:', 'sontq' ),
        'new_item_name'              => __( 'New Item Name', 'sontq' ),
//		'add_new_item'               => __( 'Add New Item', 'sontq' ),
        'edit_item'                  => __( 'Edit Item', 'sontq' ),
        'update_item'                => __( 'Update Item', 'sontq' ),
        'view_item'                  => __( 'View Item', 'sontq' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'sontq' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'sontq' ),
//		'choose_from_most_used'      => __( 'Choose from the most used', 'sontq' ),
        'popular_items'              => __( 'Popular Items', 'sontq' ),
        'search_items'               => __( 'Search Items', 'sontq' ),
        'not_found'                  => __( 'Not Found', 'sontq' ),
        'no_terms'                   => __( 'No items', 'sontq' ),
        'items_list'                 => __( 'Items list', 'sontq' ),
        'items_list_navigation'      => __( 'Items list navigation', 'sontq' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'service_group', array( 'service' ), $args );

}
add_action( 'init', 'service_group_func', 0 );



