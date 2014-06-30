<?php

	$args = array(
				'posts_per_page'	=> 1,
				'post_type'			=> 'academy_video'
			);								
	$recent_videos = get_posts( $args );

	foreach ( $recent_videos as $post ) : setup_postdata( $post ); 

	$title = ( get_post_meta( get_the_ID(), 'overlay_title', true) ? get_post_meta( get_the_ID(), 'overlay_title', true ) : get_the_title() );
	$excerpt = preg_replace( '/\s+?(\S+)?$/', '', substr( get_the_excerpt(), 0, 275) );
?>

<section class="feature">

	<div class="feature-event video" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>);">
		<?php get_template_part( 'template-standard_video_format' ); ?>
		<article class="card" itemscope="" itemtype="http://schema.org/Event"><header>
			<a href="<?php the_permalink(); ?>" itemprop="url">
			<h3 class="beta title no-margin" itemprop="name"><?php echo $title; ?></h3>
		</a>
	</header>
	<div class="has-excerpt">
		<p class="excerpt" itemprop="description">
			<?php echo get_the_excerpt(); ?>
		</p></div>
<a class="button coral" href="<?php the_permalink(); ?>">Watch</a></article>
</div></section>


		<?php endforeach; wp_reset_postdata(); wp_reset_query();?>