<?php

/* ==================
 * Nasty Hobbitses
 * ================== */
/* ==================
 * For use for a little bit of icky, user-agent templating,
 * mostly to handle responsive images for features.
 * We can't figure out how to get Detector to work inside a
 * WordPress, yet; until then we will use the UAParser directly,
 * with the intention to fully implement Detector when possible. */
//require_once('library/Detector/lib/ua-parser-php/UAParser.php'); $ua = UA::parse(); 


/* ==================
 * Needed Files
 * ================== */
/*
1. library/bones.php
    - head cleanup (remove rsd, uri links, junk css, ect)
    - enqeueing scripts & styles
    - theme support functions
    - custom menu output & fallbacks
    - related post function
    - page-navi function
    - removing <p> from around images
    - customizing the post excerpt
    - custom google+ integration
    - adding custom fields to user profiles
*/ require_once('library/bones.php'); // if you remove this, bones will break

/*
2. library/custom-post-type.php
    - an example custom post type
    - example custom taxonomy (like categories)
    - example custom taxonomy (like tags)
*/ require_once('library/academy-video-type.php'); // you can disable this if you like

/*
3. library/admin.php
    - removing some default WordPress dashboard widgets
    - an example custom dashboard widget
    - adding custom login css
    - changing text in footer of admin
    - prevent users from disabling core plugins
*/  require_once('library/admin.php'); // this comes turned off by default
    require_once('library/custom-fields.php');

/*
4. library/translation/translation.php
    - adding support for other languages
*/ // require_once('library/translation/translation.php'); // this comes turned off by default
/*


/* ==================
 * Thumbnails
 * ================== */
set_post_thumbnail_size(125, 70, true);   // Default Thumbnail
add_image_size( 'media-small', 350, 193, true );
add_image_size( 'media-medium', 570, 321, true );
add_image_size( 'media-large', 720, 405, true );
add_image_size( 'media-jumbo', 1140, 641, true );

/* ==================
 * Theme Support
 * ================== */    
add_theme_support('post-thumbnails');   
add_theme_support( 'custom-background',
    array( 
    'default-image' => '',  // background image default
    'default-color' => '', // background color default (dont add the #)
    'wp-head-callback' => '_custom_background_cb',
    'admin-head-callback' => '',
    'admin-preview-callback' => ''
    )
);      
add_theme_support('automatic-feed-links'); 
add_theme_support( 'post-formats',  
    array( 
        'aside',             // title less blurb
        'gallery',           // gallery of images
        'link',              // quick link to other site
        'image',             // an image
        'quote',             // a quick quote
        'status',            // a Facebook like status update
        'video',             // video 
        'audio',             // audio
        'chat'               // chat transcript 
    )
);  
add_theme_support( 'menus' );  

/* ==================
 * Built-In Menus */
register_nav_menus(                      
    array( 
        'mobile-menu' => __( 'Mobile Menu', 'bonestheme' ),
        'secondary-menu' => __( 'Secondary Menu', 'bonestheme' )
    )
);

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'video-small', 350, 193, true );
add_image_size( 'video-medium', 570, 321, true );
add_image_size( 'video-large', 720, 405, true );
add_image_size( 'video-jumbo', 1140, 641, true );
/* 
to add more sizes, simply copy a line from above 
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image, 
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/* ==================
 * $MENU Functions
 * ================== */
/* ==================
 * Note: there is most certainly a better way to generate
 * this menu dynamically using wp_nav_menu(), but based 
 * on the deadline at the time of this excuse I figured I'd
 * hard code it. Sorry!!! - Michael Schofield
 */ require_once('library/menu.php');

/* ==================
 * $SIDEBARS
 * ================== */
// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
    register_sidebar(array(
    	'id' => 'home',
    	'name' => 'Front Page Sidebar (sans Container)',
    	'description' => 'This sidebar appears specifically on the front page. Use wisely. This sidebar has no container.',
    	'before_widget' => '<div id="%1$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h3 class="section-title hide-text">',
    	'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'id' => 'video',
        'name' => 'Single Video Sidebar (sans Container)',
        'description' => 'This sidebar appears specifically on the individual videos. Use wisely. This sidebar has no container.',
        'before_widget' => '<div id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="section-title hide-text">',
        'after_title' => '</h3>',
    ));
} // don't remove this bracket!

/* ==================
 * Helper Functions
 * ================== */

/* ==================
 * Allow Captions to be Uploadable */
function add_upload_mime_types( $mimes ) {
    //if ( function_exists( 'current_user_can' ) ) {
    //    $unfiltered = $user ? user_can( $user, 'unfiltered_html' ) : current_user_can( 'unfiltered_html' );
    //}

    //if ( !empty( $unfiltered) ) {
        $mimes['srt'] = 'text/plain';
        $mimes['vtt'] = 'text/vtt';
    //}

    return $mimes;

} add_filter( 'upload_mimes', 'add_upload_mime_types' );

/* ==================
 * is_tree() function that tests if a page has a certain parent */
function is_tree($pid) {
  global $post;

  $ancestors = get_post_ancestors($post->$pid);
  $root = count($ancestors) - 1;
  $parent = $ancestors[$root];

  if(is_page() && (is_page($pid) || $post->post_parent == $pid || in_array($pid, $ancestors)))
  {
    return true;
  }
  else
  {
    return false;
  }
};

/* ==================
 * $DESCENDANT CATEGORY */
/**
 * Tests if any of a post's assigned categories are descendants of target categories
 *
 * @param int|array $cats The target categories. Integer ID or array of integer IDs
 * @param int|object $_post The post. Omit to test the current post in the Loop or main query
 * @return bool True if at least 1 of the post's categories is a descendant of any of the target categories
 * @see get_term_by() You can get a category by name or slug, then pass ID to this function
 * @uses get_term_children() Passes $cats
 * @uses in_category() Passes $_post (can be empty)
 * @version 2.7
 * @link http://codex.wordpress.org/Function_Reference/in_category#Testing_if_a_post_is_in_a_descendant_category
 */
if ( ! function_exists( 'post_is_in_descendant_category' ) ) {
    function post_is_in_descendant_category( $cats, $_post = null ) {
        foreach ( (array) $cats as $cat ) {
            // get_term_children() accepts integer ID only
            $descendants = get_term_children( (int) $cat, 'category' );
            if ( $descendants && in_category( $descendants, $_post ) )
                return true;
        }
        return false;
    }
}

/* ==================
 * $POST-TYPES in RESULTS
 */ // Let's not discriminate ...
function namespace_add_custom_types( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'post', 'academy_video', 'nav_menu_item'
        ));
      return $query;
    }
}
add_filter( 'pre_get_posts', 'namespace_add_custom_types' );

/* ==================
 * $POST-VIEWS
 */
// function to display number of posts.
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count;
}

// function to count views.
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}



// Add it to a column in WP-Admin
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('Views');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
    if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}

/************* COMMENT LAYOUT *********************/
		
// Comment Layout
function bones_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
			    <?php /*
			        this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
			        echo get_avatar($comment,$size='32',$default='<path_to_url>' );
			    */ ?>
			    <!-- custom gravatar call -->
			    <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5($bgauthemail); ?>&s=32" class="load-gravatar avatar avatar-48 photo" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
			    <!-- end custom gravatar call -->
				<?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
				<!--<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time('F jS, Y'); ?> </a></time>-->
				
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
       			<div class="alert info">
          			<p><?php _e('Your comment is awaiting moderation.', 'bonestheme') ?></p>
          		</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
            <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            <?php edit_comment_link(__('Edit', 'bonestheme'),'  ','') ?>
		</article>
    <!-- </li> is added by wordpress automatically -->
<?php
} // don't remove this bracket!

/* ==================
 * Search
 * ================== */
// Search Form
function sherman_wpsearch() {
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '">
        <ul>
        <li class="append field">
            <input class="xwide email input" type="search" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('Search for a video ...','bonestheme').'" x-webkit-speech speech />
            <input class="icon search-button" type="submit" id="searchsubmit" value="'. esc_attr__('X') .'" />
            </li></ul>
    </form>';
    return $form;
} // don't remove this bracket!
