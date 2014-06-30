<div class="sidebar fourcol last clearfix" role="complementary">
	<div class="contrast-against-dark">

	<section class="stack-blocks" style="padding-bottom: 2em;" >

		<p>
			LibraryLearn is a repository of short videos designed to
			help you get the most out of your library. 
		</p>
		<a class="button zeta" href="<?php echo home_url(); ?>/about">Learn More</a>
	</section>

	<!--<section class="media">
		<ul>
			<li class="related_post thumbnail thumbnail--gallery">
				<a href="http://sherman.library.nova.edu/sites/demo/watch/title/" title="This is another great video!">
					<img src="http://www.nova.edu/library/video/getting_started--navigating-asl-homepage(08-2013).jpg">
					<span class="caption">Welcome to LibraryLearn</span>
				</a>
			</li>
		</ul>
	</section>	-->


	<?php if ( is_active_sidebar( 'home' ) ) : ?>

		<?php //dynamic_sidebar( 'home' ); ?>

	<?php else : ?>

		<!-- This content shows up if there are no widgets defined in the backend. -->
		
	<?php endif; ?>

	</div>

</div>