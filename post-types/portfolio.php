<?php

/**
 * Registers the `portfolio` post type.
 */
function portfolio_init() {
	register_post_type( 'portfolio', array(
		'labels'                => array(
			'name'                  => __( 'Portfolios', 'portfolio' ),
			'singular_name'         => __( 'Portfolio', 'portfolio' ),
			'all_items'             => __( 'All Portfolios', 'portfolio' ),
			'archives'              => __( 'Portfolio Archives', 'portfolio' ),
			'attributes'            => __( 'Portfolio Attributes', 'portfolio' ),
			'insert_into_item'      => __( 'Insert into Portfolio', 'portfolio' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Portfolio', 'portfolio' ),
			'featured_image'        => _x( 'Featured Image', 'portfolio', 'portfolio' ),
			'set_featured_image'    => _x( 'Set featured image', 'portfolio', 'portfolio' ),
			'remove_featured_image' => _x( 'Remove featured image', 'portfolio', 'portfolio' ),
			'use_featured_image'    => _x( 'Use as featured image', 'portfolio', 'portfolio' ),
			'filter_items_list'     => __( 'Filter Portfolios list', 'portfolio' ),
			'items_list_navigation' => __( 'Portfolios list navigation', 'portfolio' ),
			'items_list'            => __( 'Portfolios list', 'portfolio' ),
			'new_item'              => __( 'New Portfolio', 'portfolio' ),
			'add_new'               => __( 'Add New', 'portfolio' ),
			'add_new_item'          => __( 'Add New Portfolio', 'portfolio' ),
			'edit_item'             => __( 'Edit Portfolio', 'portfolio' ),
			'view_item'             => __( 'View Portfolio', 'portfolio' ),
			'view_items'            => __( 'View Portfolios', 'portfolio' ),
			'search_items'          => __( 'Search Portfolios', 'portfolio' ),
			'not_found'             => __( 'No Portfolios found', 'portfolio' ),
			'not_found_in_trash'    => __( 'No Portfolios found in trash', 'portfolio' ),
			'parent_item_colon'     => __( 'Parent Portfolio:', 'portfolio' ),
			'menu_name'             => __( 'Portfolios', 'portfolio' ),
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
		'menu_icon'             => 'dashicons-portfolio',
		'show_in_rest'          => true,
		'rest_base'             => 'portfolio',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'portfolio_init' );

/**
 * Sets the post updated messages for the `portfolio` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `portfolio` post type.
 */
function portfolio_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['portfolio'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Portfolio updated. <a target="_blank" href="%s">View Portfolio</a>', 'portfolio' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'portfolio' ),
		3  => __( 'Custom field deleted.', 'portfolio' ),
		4  => __( 'Portfolio updated.', 'portfolio' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Portfolio restored to revision from %s', 'portfolio' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Portfolio published. <a href="%s">View Portfolio</a>', 'portfolio' ), esc_url( $permalink ) ),
		7  => __( 'Portfolio saved.', 'portfolio' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Portfolio submitted. <a target="_blank" href="%s">Preview Portfolio</a>', 'portfolio' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Portfolio scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Portfolio</a>', 'portfolio' ),
		date_i18n( __( 'M j, Y @ G:i', 'portfolio' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Portfolio draft updated. <a target="_blank" href="%s">Preview Portfolio</a>', 'portfolio' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'portfolio_updated_messages' );
