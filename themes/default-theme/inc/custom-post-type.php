<?php
/**
 * Sample implementation of the Custom Post Type
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Default Theme
 */


 add_action( 'init', 'faq_register_post_type_init' );

 function faq_register_post_type_init() {
 
	 $labels = array(
		 'name'                => 'FAQ',
		 'singular_name'       => 'FAQ',
		 'add_new'             => 'Add new',
		 'add_new_item'        => 'Add new FAQ',
		 'edit_item'           => 'Edit',
		 'new_item'            => 'New FAQ',
		 'view_item'           => 'View FAQ',
		 'search_items'        => 'Search FAQ',
		 'not_found'           => 'FAQ not found', 
		 'not_found_in_trash'  => 'FAQ not found in Tresh', 
		 'menu_name'           => 'FAQ',
	 );
 
	 $args = array(
		 'labels'              => $labels,
		 'hierarchical'        => false,
		 'public'              => true,
		 'publicly_queryable'  => true,
		 'show_ui'             => true,
		 'show_in_menu'        => true,
		 'show_in_admin_bar'   => true,
		 'show_in_rest'        => true,
		 'menu_position'       => 22,
		 'menu_icon'           => 'dashicons-list-view',
		 'show_in_nav_menus'   => true,
		 'exclude_from_search' => false,
		 'has_archive'         => true,
		 'query_var'           => true,
		 'can_export'          => true,
		 'supports'            => array('title', 'editor')
	 );
 
	 register_post_type( 'faq', $args );
 }