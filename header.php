<!doctype html>  

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> <!--Google Chrome Frame for IE-->

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><html dir="ltr" lang="en-US" class="no-js ie"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	
	<head>
	<!-- Metas
	======================
	--> <meta charset="utf-8">
		<title><?php wp_title(''); ?></title>
		
	
	<!-- Mobile Metas
	======================
	-->	<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		
	<!-- Favicon
	======================
	-->	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/nsu.ico">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	
	<!-- Wordpress Head Functions
	======================
	-->	<?php wp_head(); ?>
	
	</head>
	
	<body <?php body_class('librarylearn'); ?>>

		<div id="container">
			
		<?php get_template_part('template--global-menu'); ?>
			
		<!-- Header
		======================
		-->	<header class="header white" role="banner">
			
				<div id="inner-header" class="wrap clearfix">

					<div class="eightcol first">
						
						<div class="align-left fourcol first">
					
						<!-- Logo
						======================
						-->	<div id="logo" class="has-tagline">
								<a class="logo" href="<?php bloginfo('url');?>" title="<?php bloginfo('title'); ?>">
									<span class="main-accent">Library</span>Learn
								</a>

							<!-- Tagline
							======================
							--> <span class="tagline">
									beta
								</span>		
			
							</div><!--/#logo-->

						</div><!--/.sixcol-->

						<div class="align-left eightcol last">
							
							<div class="pill-menu">
							<!-- Major Category
							======================
							--> <ul>

									<li class="has-subnav primary">
										<label class="label" for="top-menu"><?php echo library_academy_menu('primary', 'label'); ?></label>
									</li>
							
							<!-- Empty Sub-Topic
							======================
							--> <li class="has-subnav secondary">									
									<label class="label" for="top-menu"><?php echo library_academy_menu('secondary', 'label'); ?></label>
								</li>

								</ul>
							</div>
							
							
						</div>
					</div>

					<div class="fourcol last">

						<div class="slide-panel">
							<input type="checkbox" class="checkbox-toggle" id="slide-panel">
							<label class="button tinsley label" for="slide-panel">
								Menu
							</label>

							<nav class="slide-panel-menu">

								<div class="search">
							
									<?php echo sherman_wpsearch(); ?>
								</div>
							
								<?php wp_nav_menu( array('menu' => 'Mobile Fly-Out' ) ); ?>

								<label class="label button green" for="slide-panel"> 
									Close Menu
								</label>


							</nav>

						</div>

					</div>

				</div><!--/.inner-header-->
			
			</header><!--/.header-->

			<input type="checkbox" id="top-menu" class="checkbox-toggle" />
			<nav class="top-menu" role="navigation">
				<div id="inner-menu" class="wrap clearfix">
					<?php wp_nav_menu( array('menu' => 'Top Menu' ) ); ?>
				</div>
			</nav>
