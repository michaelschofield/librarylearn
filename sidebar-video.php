	<?php if ( is_active_sidebar( 'video' ) ) : ?>

		<?php dynamic_sidebar( 'video' ); ?>

	<?php else : ?>

		<!-- This content shows up if there are no widgets defined in the backend. -->
		
	<?php endif; ?>