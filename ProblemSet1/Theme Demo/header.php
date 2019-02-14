<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo("charset"); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?php bloginfo("name"); ?></title>
	<meta name="keywords" content="">
	<meta name="description" content="<?php bloginfo("description"); ?>">
    <meta name="author" content="templatemo">
	
	<!-- Google Fonts -->
	<link href="http://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700itali" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Raleway:400,900,800,700,500,200,100,600" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/bootstrap/bootstrap.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/misc.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/red-scheme.css">

	<!-- JavaScripts -->
	<script src="<?php bloginfo('template_url'); ?>/js/jquery-1.10.2.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/jquery-migrate-1.2.1.min.js"></script>

	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" type="image/x-icon" />

</head>

<body>
	<div class="responsive_menu">
        <ul class="main_menu">
								<?php
									wp_nav_menu( array(
										'menu'              => 'primary',
										'theme_location'    => 'primary',
										'depth'             => 2,
										'container'         => 'false',
										'menu_class'        => 'nav nav-list',
										'fallback_cb'       => 'wp_bootstrap_navlist_walker::fallback',
										'walker'			=> new wp_bootstrap_navlist_walker())
									);
								?>
        </ul> <!-- /.main_menu -->
    </div> <!-- /.responsive_menu -->

	<header class="site-header clearfix">
		<div class="container">

			<div class="row">

				<div class="col-md-12">

					<div class="pull-left logo">
						<a href="index.html">
							<img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="Medigo by templatemo">
						</a>
					</div>	<!-- /.logo -->

					<div class="main-navigation pull-right">

						<nav class="main-nav visible-md visible-lg">
								<?php
									wp_nav_menu( array(
										'menu'              => 'primary',
										'theme_location'    => 'primary',
										'depth'             => 2,
										'container'         => 'false',
										'menu_class'        => 'nav nav-list',
										'fallback_cb'       => 'wp_bootstrap_navlist_walker::fallback',
										'walker'			=> new wp_bootstrap_navlist_walker())
									);
								?>
						</nav> <!-- /.main-nav -->

						<!-- This one in here is responsive menu for tablet and mobiles -->
					    <div class="responsive-navigation visible-sm visible-xs">
					        <a href="#nogo" class="menu-toggle-btn">
					            <i class="fa fa-bars"></i>
					        </a>
					    </div> <!-- /responsive_navigation -->

					</div> <!-- /.main-navigation -->

				</div> <!-- /.col-md-12 -->

			</div> <!-- /.row -->

		</div> <!-- /.container -->
	<?php wp_head(); ?>
	</header> <!-- /.site-header -->
