<?php get_header(); ?>


<div id="content" itemscope itemtype="http://schema.org/VideoObject">

	<section class="background-base has-background media" >

		<div class="clearfix hero wrap">

		<?php 
		if (have_posts()) : while (have_posts()) : the_post();
		$video = get_post_meta( get_the_ID(), 'academy_video_file', true); 
		?>

			<video class="shadow" poster="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" height="100%" width="100%" autoplay controls itemprop="video">
	   
				<source type='video/webm; codecs="vp8, vorbis"' src="//nova.edu/library/video/<?php echo $video; ?>.webm" />
				<source type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"' src="//nova.edu/library/video/<?php echo $video ?>.mp4" />
				<track kind="subtitles" src="<?php echo wp_get_attachment_url( get_post_meta( get_the_ID(), 'captions', true ) ); ?>" srclang="en" label="English">

				<p class="alert alert--danger">Sorry. Your browser doesn't support HTML5 video.</p>

			</video>

		</div>

	</section>

	<header class="hero eightcol center-grid clearfix">
		
		<h1 class="beta" itemprop="name"><?php the_title(); ?></h1>

	</header>		

	<main class="center-grid clearfix eightcol" role="main">

		<nav class="clearfix">
			<a href="#">Related Videos</a>
		<button class="button button--link last" onClick="window.print()">
			<svg class="icon-print" style="width: 16px; height: 16px;"><use xlink:href="#icon-print"></use></svg>
			Print Tutorial
		</button>
		</nav>

		<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemprop="transcript">
				
			<section class="post-content">

				<?php the_content(); ?>
				
			</section> <!-- end article section -->
			
		</article> <!-- end article -->

	</main>

	<aside class="media">
		<h4>Related Videos</h4>
		<?php library_related_videos(); ?>
	</aside>

</div> <!-- end #content -->

	<?php endwhile; ?>	
	<?php endif; ?>

<?php get_footer(); ?>