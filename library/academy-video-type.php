<?php

// let's create the function for the custom type
function library_academy_video() { 
	// creating (registering) the custom type 
	register_post_type( 'academy_video', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('LibraryLearn', 'bonestheme'), /* This is the Title of the Group */
			'singular_name' => __('Video', 'bonestheme'), /* This is the individual type */
			'all_items' => __('All Videos', 'bonestheme'), /* the all items menu item */
			'add_new' => __('Add New Video', 'bonestheme'), /* The add new menu item */
			'add_new_item' => __('Add a Video', 'bonestheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Video', 'bonestheme'), /* Edit Display Title */
			'new_item' => __('New Video', 'bonestheme'), /* New Display Title */
			'view_item' => __('View this Tutorial', 'bonestheme'), /* View Display Title */
			'search_items' => __('Search for a Tutorial', 'bonestheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'bonestheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'bonestheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'These are specially formatted, cross-browser instructional videos produced by librarians!', 'bonestheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 2, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/academy-video-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'watch', 'with_front' => false ), /* you can specify it's url slug */
			'has_archive' => 'videos', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author')
	 	) /* end of options */
	); /* end of register post type */
	
	/* this ads your post categories to your custom post type */
	register_taxonomy_for_object_type('category', 'academy_video');
	
	/* this ads your post tags to your custom post type */
	register_taxonomy_for_object_type('post_tag', 'academy_video');
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'library_academy_video');

/* ==================
 * User-Friendly Labeling
 */ // 
function library_academy_label_rewrite($translation, $text, $domain) {
	global $post;
        if ( !isset( $post->post_type ) ) { return $translation; }
	$translations = get_translations_for_domain($domain);
	$translation_array = array();
	switch ($post->post_type) {
		case 'academy_video': // enter your post type name here
			$translation_array = array(
				'Excerpt' => 'A brief summary of the video:'
			);
			break;
	}
 
	if (array_key_exists($text, $translation_array)) {
		return $translations->translate($translation_array[$text]);
	}
	return $translation;
}
add_filter('gettext', 'library_academy_label_rewrite', 10, 4);

    register_taxonomy( 'library-audience', 
        array('spotlight_databases', 'spotlight_events', 'spotlight_reviews', 'spotlight_items', 'post', 'academy_video'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
        array('hierarchical' => true,     /* if this is true it acts like categories */             
            'labels' => array(
                'name' => __( 'Library Audience', 'bonestheme' ), /* name of the custom taxonomy */
                'singular_name' => __( 'Audience Type', 'bonestheme' ), /* single taxonomy name */
                'search_items' =>  __( 'Search Audiences', 'bonestheme' ), /* search title for taxomony */
                'all_items' => __( 'All Audiences', 'bonestheme' ), /* all title for taxonomies */
                'parent_item' => __( 'Patron Type', 'bonestheme' ), /* parent title for taxonomy */
                'parent_item_colon' => __( 'Patron Type:', 'bonestheme' ), /* parent taxonomy title */
                'edit_item' => __( 'Edit Audience', 'bonestheme' ), /* edit custom taxonomy title */
                'update_item' => __( 'Update Audience', 'bonestheme' ), /* update title for taxonomy */
                'add_new_item' => __( 'Add New Audience', 'bonestheme' ), /* add new title for taxonomy */
                'new_item_name' => __( 'New Audience Name', 'bonestheme' ) /* name title for taxonomy */
            ),
            'show_ui' => false,
            'query_var' => true,
            'capabilities' => array(
                'manage_terms' => 'admin',
                'edit_terms' => 'admin',
                'delete_terms' => 'admin',
                'assign_terms' => 'admin'
            ),
        )
    ); 	
    
	

?>