<?php
/**
 * The template for displaying the front page.
 *
 * This is the template that displays on the front page only.
 *
 * @package _mbbasetheme
 */

get_header(); ?>

<?php 

	if ( !empty(get_field('title')) ) {

		// Variable declarations
		$title = get_field('title');
		$subtitle = get_field('subtitle');
		$video = get_field('video');
		$fallback = get_field('fallback_image');
	}
?>

	<main id="main" class="site-main" role="main">


		<div id="homeVideo" class="video">`

				<video loop muted autoplay poster="<?php print($fallback); ?>">
					<!-- Eventually we need the 3 core types of video inc. webm etc. -->
        	<source src="<?php print($video); ?>" type="video/mp4">
    		</video>

		</div>

		<article>
			<h1><?php print($title); ?></h1>
			<h2><?php print($subtitle); ?></h2>

			<a class="primary button" href="/homes/" title="Hand-Picked Riviera Homes">Hand-Picked Homes</a>
		</article>

	</main>

<?php get_footer(); ?>
