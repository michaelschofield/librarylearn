<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="clearfix">
				
				    <div id="main" class="wrap clearfix" role="main">
						
						<header>
							<h1 class="archive-title hide-accessible"> Search Results: "<?php echo esc_attr(get_search_query()); ?>"</h1>
							<p class="no-margin">Videos matching: <strong><?php echo esc_attr( get_search_query() ); ?></strong></p>
						</header>

					     <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix portlet'); ?> role="article">
							
							<div class="twocol first media">
	    						
								<a class="thumbnail" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
									<?php echo ( has_post_thumbnail() ? the_post_thumbnail( 'media-small' ) : '<img src=http://placehold.it/640x360>' ); ?>
								</a>

								<p class="small-text">
									<span class="icon-mobile" aria-hidden="true"></span> <?php echo getPostViews(get_the_ID()); ?> Views
								</p>

							</div>

							<div class="tencol last">
								<header>
							    	<h2 class="delta no-margin"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						    	</header>

							    <section class="post-content clearfix">						
									   <p><?php echo get_the_excerpt(); ?></p>
							    </section> <!-- end article section -->

							    <footer class="small-text">
							    	<?php the_tags( 'Tags: ' ); ?>
							    </footer>
							    </div>
					
						    </article> <!-- end article -->
					
					    <?php endwhile; ?>	
					
					        <?php if (function_exists('bones_page_navi')) { // if experimental feature is active ?>
						
						        <?php bones_page_navi(); // use the page navi function ?>

					        <?php } else { // if it is disabled, display regular wp prev & next links ?>
						        <nav class="wp-prev-next">
							        <ul class="clearfix">
								        <li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "bonestheme")) ?></li>
								        <li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "bonestheme")) ?></li>
							        </ul>
					    	    </nav>
					        <?php } ?>
					
					    <?php else : ?>

    					    <article id="post-not-found" class="hentry clearfix">
    						    <header class="article-header">
    							    <h2 class="hide-accessible"><?php _e("No Search Results!", "bonestheme"); ?></h2>
    					    	</header>
    					    	<p class="delta">
    					    		Oops. Your search for <q><strong><?php echo esc_attr(get_search_query()); ?></strong></q>
    					    		didn't work out. 
    					    	</p>

    				    	</article>
					
					    <?php endif; ?>
			
    				</div> <!-- end #main -->
                
                </div> <!-- end #inner-content -->
                
			</div> <!-- end #content -->

<?php get_footer(); ?>