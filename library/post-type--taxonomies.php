<?php 

    // now let's add custom categories (these act like categories)
    register_taxonomy( 'resource-subjects', 
        array('spotlight_databases', 'spotlight_items'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
        array('hierarchical' => true,     /* if this is true it acts like categories */             
            'labels' => array(
                'name' => __( 'Database Subjects', 'bonestheme' ), /* name of the custom taxonomy */
                'singular_name' => __( 'Database Subject', 'bonestheme' ), /* single taxonomy name */
                'search_items' =>  __( 'Search Database Subjects', 'bonestheme' ), /* search title for taxomony */
                'all_items' => __( 'All Database Subjects', 'bonestheme' ), /* all title for taxonomies */
                'parent_item' => __( 'Parent DB Subject', 'bonestheme' ), /* parent title for taxonomy */
                'parent_item_colon' => __( 'Parent DB Subject:', 'bonestheme' ), /* parent taxonomy title */
                'edit_item' => __( 'Edit Subject', 'bonestheme' ), /* edit custom taxonomy title */
                'update_item' => __( 'Update Subject', 'bonestheme' ), /* update title for taxonomy */
                'add_new_item' => __( 'Add New Databse Subject', 'bonestheme' ), /* add new title for taxonomy */
                'new_item_name' => __( 'New Database Subject Name', 'bonestheme' ) /* name title for taxonomy */
            ),
            'show_ui' => true,
            'query_var' => true,
            'capabilities' => array(
                'manage_terms' => 'admin',
                'edit_terms' => 'admin',
                'delete_terms' => 'admin',
                'assign_terms' => 'admin'
            ),
        )
    );   

    register_taxonomy( 'library-audience', 
        array('spotlight_databases', 'spotlight_events', 'spotlight_reviews', 'spotlight_items', 'post'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
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
            'show_ui' => true,
            'query_var' => true,
            'capabilities' => array(
                'manage_terms' => 'admin',
                'edit_terms' => 'admin',
                'delete_terms' => 'admin',
                'assign_terms' => 'admin'
            ),
        )
    ); 

    register_taxonomy( 'event_type', 
        array('spotlight_events'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
        array('hierarchical' => true,     /* if this is true it acts like categories */             
            'labels' => array(
                'name' => __( 'Event Types', 'bonestheme' ), /* name of the custom taxonomy */
                'singular_name' => __( 'Event Type', 'bonestheme' ), /* single taxonomy name */
                'search_items' =>  __( 'Search Event Types', 'bonestheme' ), /* search title for taxomony */
                'all_items' => __( 'All Event Types', 'bonestheme' ), /* all title for taxonomies */
                'parent_item' => __( 'Parent Event Type', 'bonestheme' ), /* parent title for taxonomy */
                'parent_item_colon' => __( 'Parent Event Type:', 'bonestheme' ), /* parent taxonomy title */
                'edit_item' => __( 'Edit Event Type', 'bonestheme' ), /* edit custom taxonomy title */
                'update_item' => __( 'Update Event Type', 'bonestheme' ), /* update title for taxonomy */
                'add_new_item' => __( 'Add New Event Type', 'bonestheme' ), /* add new title for taxonomy */
                'new_item_name' => __( 'New Event Type Name', 'bonestheme' ) /* name title for taxonomy */
            ),
            'show_ui' => true,
            'query_var' => true,
            'capabilities' => array(
                'manage_terms' => 'admin',
                'edit_terms' => 'admin',
                'delete_terms' => 'admin',
                'assign_terms' => 'admin'
            ),
        )
    ); 

    register_taxonomy( 'location', 
        array('spotlight_events'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
        array('hierarchical' => true,     /* if this is true it acts like categories */             
            'labels' => array(
                'name' => __( 'Locations', 'bonestheme' ), /* name of the custom taxonomy */
                'singular_name' => __( 'Location', 'bonestheme' ), /* single taxonomy name */
                'search_items' =>  __( 'Search Locations', 'bonestheme' ), /* search title for taxomony */
                'all_items' => __( 'All Locations', 'bonestheme' ), /* all title for taxonomies */
                'parent_item' => __( 'Parent Location', 'bonestheme' ), /* parent title for taxonomy */
                'parent_item_colon' => __( 'Parent Location:', 'bonestheme' ), /* parent taxonomy title */
                'edit_item' => __( 'Edit Location', 'bonestheme' ), /* edit custom taxonomy title */
                'update_item' => __( 'Update Location', 'bonestheme' ), /* update title for taxonomy */
                'add_new_item' => __( 'Add New Location', 'bonestheme' ), /* add new title for taxonomy */
                'new_item_name' => __( 'New Location Name', 'bonestheme' ) /* name title for taxonomy */
            ),
            'show_ui' => true, // Accessible through Custom Fields Only
            'query_var' => true,
            'capabilities' => array(
                'manage_terms' => 'admin',
                'edit_terms' => 'admin',
                'delete_terms' => 'admin',
                'assign_terms' => 'admin'
            ),
        )
    ); 

    register_taxonomy( 'recurring_program', 
        array('spotlight_events'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
        array('hierarchical' => true,     /* if this is true it acts like categories */             
            'labels' => array(
                'name' => __( 'Recurring Programs', 'bonestheme' ), /* name of the custom taxonomy */
                'singular_name' => __( 'Recurring Program', 'bonestheme' ), /* single taxonomy name */
                'search_items' =>  __( 'Search Recurring Programs', 'bonestheme' ), /* search title for taxomony */
                'all_items' => __( 'All Recurring Programs', 'bonestheme' ), /* all title for taxonomies */
                'parent_item' => __( 'Parent Program', 'bonestheme' ), /* parent title for taxonomy */
                'parent_item_colon' => __( 'Parent Program:', 'bonestheme' ), /* parent taxonomy title */
                'edit_item' => __( 'Edit Recurring Program', 'bonestheme' ), /* edit custom taxonomy title */
                'update_item' => __( 'Update Recurring Program', 'bonestheme' ), /* update title for taxonomy */
                'add_new_item' => __( 'Add New Recurring Program', 'bonestheme' ), /* add new title for taxonomy */
                'new_item_name' => __( 'New Recurring Program Name', 'bonestheme' ) /* name title for taxonomy */
            ),
            'show_ui' => true,
            'query_var' => true,
            'capabilities' => array(
                'manage_terms' => 'admin',
                'edit_terms' => 'admin',
                'delete_terms' => 'admin',
                'assign_terms' => 'admin'
            ),
        )
    ); 

    register_taxonomy( 'genre', 
        array('spotlight_items'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
        array('hierarchical' => true,     /* if this is true it acts like categories */             
            'labels' => array(
                'name' => __( 'Genre', 'bonestheme' ), /* name of the custom taxonomy */
                'singular_name' => __( 'Genre', 'bonestheme' ), /* single taxonomy name */
                'search_items' =>  __( 'Search Genres', 'bonestheme' ), /* search title for taxomony */
                'all_items' => __( 'All Genre', 'bonestheme' ), /* all title for taxonomies */
                'parent_item' => __( 'Parent Genre', 'bonestheme' ), /* parent title for taxonomy */
                'parent_item_colon' => __( 'Parent Genre:', 'bonestheme' ), /* parent taxonomy title */
                'edit_item' => __( 'Edit Genre', 'bonestheme' ), /* edit custom taxonomy title */
                'update_item' => __( 'Update Genre', 'bonestheme' ), /* update title for taxonomy */
                'add_new_item' => __( 'Add New Genre', 'bonestheme' ), /* add new title for taxonomy */
                'new_item_name' => __( 'New Event Genre', 'bonestheme' ) /* name title for taxonomy */
            ),
            'show_ui' => true,
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