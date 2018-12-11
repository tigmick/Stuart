<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package _mbbasetheme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon-32x32.png">
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.ico">	

	<?php wp_head(); ?>

	<!-- Facebook Pixel Code -->
	<script>
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}(window,document,'script',
	'https://connect.facebook.net/en_US/fbevents.js');
	 fbq('init', '300035220524203'); 
	fbq('track', 'PageView');
	</script>
	<noscript>
	 <img height="1" width="1" 
	src="https://www.facebook.com/tr?id=300035220524203&ev=PageView
	&noscript=1"/>
	</noscript>
	<!-- End Facebook Pixel Code -->

</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">
	<!--[if lt IE 9]>
	    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', '_mbbasetheme' ); ?></a>

	<header id="masthead" class="site-header wrapper" role="banner">

		<h1 class="site-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="sprite-global">
				<?php bloginfo( 'name' ); ?>
			</a>
		</h1>

		<nav id="site-navigation" role="navigation">
			<ul>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => 'false','items_wrap' => '%3$s' ) ); ?>

				<li class="facebook">
					<a class="sprite-global" target="_blank" title="Find us on Facebook" rel="me" href="https://www.facebook.com/Hand-picked-riviera-136376777073003/">Facebook</a>
				</li>
				<li class="instagram">
					<a class="sprite-global" target="_blank" title="Find us on Instagram" rel="me" href="https://www.instagram.com/handpickedriviera/">Instagram</a>
				</li>
		
				<li class="mobile-menu">
					<a href="#" class="menu-toggle sprite-global" title="Open / Close Navigation"></a>
				</li>
			</ul>
		</nav>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
