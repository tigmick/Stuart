<?php
/**
 * Template Name: About Us
 *
 * Displays content for the Hand Picked Riviera About Us Page
 *
 * @package _mbbasetheme
 */

get_header(); ?>

<?php

	if ( !empty(get_field('slideshow_gallery')) ) {

		$slideshow = get_field('slideshow_gallery');

		$ownerID = get_field('hand_picked_owner');
		$owner = $ownerID[0];
		$owner_image = wp_get_attachment_image_src( get_post_thumbnail_id($owner), 'large' );
		$owner_name = get_the_title( $owner );
		$owner_quote = get_field('hand_picked_quote');
		// Get signature from relationship page
		$signature = get_field('signature', $owner);

		$intro = get_field('introduction');
		$promises = get_field('promises');

		$owners_content = get_field('for_owners');
		$owners_photo = get_field('for_owners_photo');

	}
?>

	<main id="main" class="site-main" role="main">
		
		<section class="fold">

			<div class="about-tiles">

				<?php 
					foreach($slideshow as $slide => $item) {

						$slideURL = $slideshow[$slide]['sizes']['large'];
						$slideTitle = $slideshow[$slide]['title'];

						?>
						<div class="about-tile">
							<img src="<?php print($slideURL); ?>" src="<?php print($slideTitle); ?>">
						</div>
						<?php 
					}
				?>
			</div>

		</section>

		<section class="readWidth quote-container">
			<img class="avatar" src="<?php print($owner_image[0]); ?>" alt="<?php print($owner_name); ?>">
			<blockquote class="larger"><?php print($owner_quote); ?></blockquote>
			<h3><?php print($owner_name); ?></h3>
		
			<img class="signature" src="<?php print_r($signature['url']); ?>" alt="<?php print($owner_name); ?> Signature">
		</section>

		<section class="wrapper">

			<div class="intro readWidth">
				
				<hr class="zigzag sprite-global">

				<h1>The Hand-Picked Promise</h1>
				<p><?php print($intro); ?></p>

			</div>

			<article class="the-promise"> 

				<?php 
					foreach($promises as $promise) {
						?>
							<aside>
								<img src="<?php print($promise['promise_image']); ?>" alt="Hand Picked Promise">

								<h3><?php print($promise['promise_title']); ?></h3>
								<?php print($promise['promise_text']); ?>
							</aside>
						<?php 
					}
				?>

			</article>

			<section class="for-owners">

				<h2 class="section-title">For Owners</h2>

				<article class="twoCol">
					<div class="col">
						<?php print($owners_content); ?>

						<a href="#contact" class="button primary" title="Contact Hand-Picked Riviera">Contact Us</a>

					</div>

					<div class="col">
						
						<img src="<?php print($owners_photo); ?>">

					</div>

				</article>

			</section>

		</section>
	</main>

<?php get_footer(); ?>
