<?php

/**
 * Registers the `dev` post type.
 */
function dev_init() {
	register_post_type( 'dev', array(
		'labels'                => array(
			'name'                  => __( 'Développements', 'portfolio' ),
			'singular_name'         => __( 'Développement', 'portfolio' ),
			'all_items'             => __( 'All Développements', 'portfolio' ),
			'archives'              => __( 'Développement Archives', 'portfolio' ),
			'attributes'            => __( 'Développement Attributes', 'portfolio' ),
			'insert_into_item'      => __( 'Insert into Développement', 'portfolio' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Développement', 'portfolio' ),
			'featured_image'        => _x( 'Featured Image', 'dev', 'portfolio' ),
			'set_featured_image'    => _x( 'Set featured image', 'dev', 'portfolio' ),
			'remove_featured_image' => _x( 'Remove featured image', 'dev', 'portfolio' ),
			'use_featured_image'    => _x( 'Use as featured image', 'dev', 'portfolio' ),
			'filter_items_list'     => __( 'Filter Développements list', 'portfolio' ),
			'items_list_navigation' => __( 'Développements list navigation', 'portfolio' ),
			'items_list'            => __( 'Développements list', 'portfolio' ),
			'new_item'              => __( 'New Développement', 'portfolio' ),
			'add_new'               => __( 'Add New', 'portfolio' ),
			'add_new_item'          => __( 'Add New Développement', 'portfolio' ),
			'edit_item'             => __( 'Edit Développement', 'portfolio' ),
			'view_item'             => __( 'View Développement', 'portfolio' ),
			'view_items'            => __( 'View Développements', 'portfolio' ),
			'search_items'          => __( 'Search Développements', 'portfolio' ),
			'not_found'             => __( 'No Développements found', 'portfolio' ),
			'not_found_in_trash'    => __( 'No Développements found in trash', 'portfolio' ),
			'parent_item_colon'     => __( 'Parent Développement:', 'portfolio' ),
			'menu_name'             => __( 'Développements', 'portfolio' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor' ),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_position'         => null,
		'menu_icon'             => 'dashicons-code-standards',
		'show_in_rest'          => true,
		'rest_base'             => 'dev',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'dev_init' );

/**
 * Sets the post updated messages for the `dev` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `dev` post type.
 */
function dev_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['dev'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Développement updated. <a target="_blank" href="%s">View Développement</a>', 'portfolio' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'portfolio' ),
		3  => __( 'Custom field deleted.', 'portfolio' ),
		4  => __( 'Développement updated.', 'portfolio' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Développement restored to revision from %s', 'portfolio' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Développement published. <a href="%s">View Développement</a>', 'portfolio' ), esc_url( $permalink ) ),
		7  => __( 'Développement saved.', 'portfolio' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Développement submitted. <a target="_blank" href="%s">Preview Développement</a>', 'portfolio' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Développement scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Développement</a>', 'portfolio' ),
		date_i18n( __( 'M j, Y @ G:i', 'portfolio' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Développement draft updated. <a target="_blank" href="%s">Preview Développement</a>', 'portfolio' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'dev_updated_messages' );
