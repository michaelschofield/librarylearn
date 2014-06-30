<?php
/*
This file handles the admin area and functions.
You can use this file to make changes to the
dashboard. Updates to this page are coming soon.
It's turned off by default, but you can call it
via the functions file.
*/ //http://speckyboy.com/2011/04/27/20-snippets-and-hacks-to-make-wordpress-user-friendly-for-your-clients/

/* ==================
 * Custom Welcome Panel
 */ // This is a custom welcome panel, sort of. The 
// correct way of updating the welcome panel content
// is still only visible to users that can edit_theme_options.
// This takes the welcome-panel styles and adds it as an admin_notice.
function sherman_welcome_panel() {

	$screen = get_current_screen();
	if ( $screen->base == 'dashboard' ) {
	echo
		'<div class="wrap">'.
			'<h2></h2>'.
			'<div id="welcome-panel" class="welcome-panel">'.
				'<section class="welcome-panel-content">' .
					'<h3>Sherman Library Wordpress Network</h3>' .
					'<p class="about-description">Hey there! Welcome to <strong>LibraryLearn</strong>.</p>'.
					'<p>This is the repo and workspace for video-making. Watch your step! There are film canisters everywhere.</p>' .

					'<div class="welcome-column-container">'.
						'<div class="welcome-panel-column">'.
							'<a class="button button-primary button-hero" href="http://sherman.library.nova.edu/sites/learn/wp-admin/admin.php?page=cleverness-to-do-list" target="new">To-Do List</a>'.							
						'</div>'.
						'<div class="welcome-panel-column">'.
							'<a class="button button-hero" href="//sherman.library.nova.edu/sites/labs/knowledgebase/making-instructional-videos-for-the-nsu-libraries/" target="new">Tutorial</a>'.
							//'<p>This is an in-depth guide to making instructional videos for the NSU Libraries. It covers raw specs, walkthroughs, and content strategy.</p>'.
						'</div>'.						
						'<div class="welcome-panel-column">'.
							'<a class="button button-hero" href="//sherman.library.nova.edu/sites/labs/knowledgebase-category/library_learn/" target="new">Knowledgebase</a>'.
							'<p>"LibraryLearn" entries in the <strong>knowledgebase</strong> including best practices, various FAQs, and known issues.</p>'.
						'</div>'.
					'</div>' .
			'</section>'.
			'</div>'.
		'</div>';
	}
}
remove_action( 'welcome_panel', 'wp_welcome_panel');
add_action( 'admin_notices', 'sherman_welcome_panel' );


/* ==================
 * Core Plugins
 */ // This disables the admin deactivation of certain core-to-the-experience plugins
// from http://sltaylor.co.uk/blog/disabling-wordpress-plugin-deactivation-theme-changing/
function lock_plugins( $actions, $plugin_file, $plugin_data, $context ) {
    
    // Remove edit link for all
    if ( array_key_exists( 'edit', $actions ) )
        unset( $actions['edit'] );
    // Remove deactivate link for crucial plugins
    if ( array_key_exists( 'deactivate', $actions ) && in_array( $plugin_file, array(
        'advanced-custom-fields/acf.php'
    )))
        unset( $actions['deactivate'] );
    return $actions;
} 

add_filter( 'plugin_action_links', 'lock_plugins', 10, 4 );

/* ==================
 * Disable Top-Level Admin Panel Menus
 */ // This removes admin panel options
function remove_menus() {
global $menu;
    $restricted = array(
    	__('Posts'), 
    	__('Pages'), 
    	__('Users'), 
    	__('Settings'), 
    	__('Comments'), 
    	__('Plugins'), 
    	__('Tools')
    	);
    end ($menu);
    while (prev($menu)){
        $value = explode(' ',$menu[key($menu)][0]);
        if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
    }
}
//add_action('admin_menu', 'remove_menus');

/* ==================
 * The Dashboard
 */ // Controls appearance of dashboard widgets, refer to http://codex.wordpress.org/Dashboard_Widgets_API
function disable_default_dashboard_widgets() {
	//remove_meta_box('dashboard_right_now', 'dashboard', 'core');    // Right Now Widget
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core'); // Comments Widget
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');  // Incoming Links Widget
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');         // Plugins Widget
	remove_meta_box('dashboard_quick_press', 'dashboard', 'core');  // Quick Press Widget
	//remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');   // Recent Drafts Widget
	remove_meta_box('dashboard_primary', 'dashboard', 'core');         //
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');       //

	// removing plugin dashboard boxes
	//remove_meta_box('yoast_db_widget', 'dashboard', 'normal');         // Yoast's SEO Plugin Widget

	/*
	have more plugin widgets you'd like to remove?
	share them with us so we can get a list of
	the most commonly used. :D
	https://github.com/eddiemachado/bones/issues
	*/
}

/*
Now let's talk about adding your own custom Dashboard widget.
Sometimes you want to show clients feeds relative to their
site's content. For example, the NBA.com feed for a sports
site. Here is an example Dashboard Widget that displays recent
entries from an RSS Feed.

For more information on creating Dashboard Widgets, view:
http://digwp.com/2010/10/customize-wordpress-dashboard/
*/

// RSS Dashboard Widget
function changeblog_dashboard_widget() {
	
	echo '<div>';
	wp_widget_rss_output(
		array(
			'url' => 'http://sherman.library.nova.edu/sites/labs/feed/',
			'title' => 'Changeblog',
			'items' => '3',
			'show_summary' => 1,
			'show_author' => 0,
			'show_date' => 1
			));
	echo "</div>";

}

// calling all custom dashboard widgets
function bones_custom_dashboard_widgets() {
	//wp_add_dashboard_widget('bones_rss_dashboard_widget', 'Changeblog', 'bones_rss_dashboard_widget');
	add_meta_box( 'changeblog_dashboard_widget', 'Changeblog', 'changeblog_dashboard_widget', 'dashboard', 'normal', 'high' );
	/*
	Be sure to drop any other created Dashboard Widgets
	in this function and they will all load.
	*/
}


// removing the dashboard widgets
add_action('admin_menu', 'disable_default_dashboard_widgets');
// adding any custom widgets
add_action('wp_dashboard_setup', 'bones_custom_dashboard_widgets');



/************* CUSTOM LOGIN PAGE *****************/

// calling your own login css so you can style it
function bones_login_css() {
	/* i couldn't get wp_enqueue_style to work :( */
	echo '<link rel="stylesheet" href="' . get_stylesheet_directory_uri() . '/library/css/login.css">';
}

// changing the logo link from wordpress.org to your site
function bones_login_url() {  return home_url(); }

// changing the alt text on the logo to show your site name
function bones_login_title() { return get_option('blogname'); }

// calling it only on the login page
add_action('login_head', 'bones_login_css');
add_filter('login_headerurl', 'bones_login_url');
add_filter('login_headertitle', 'bones_login_title');


/************* CUSTOMIZE ADMIN *******************/

/*
I don't really reccomend editing the admin too much
as things may get funky if Wordpress updates. Here
are a few funtions which you can choose to use if
you like.
*/

// Custom Backend Footer
function bones_custom_admin_footer() {
	echo '<span id="footer-thankyou">Developed by <a href="http://sherman.library.nova.edu/" target="_blank">Alvin Sherman Library, Research, and Information Technology Center</a></span>.';
}

// adding it to the admin area
add_filter('admin_footer_text', 'bones_custom_admin_footer');

