<?php
/**
 * Template Name: Hand Picked Home
 *
 * Displays content for a Hand Picked Riviera Home
 *
 * @package _mbbasetheme
 */

get_header(); ?>

<?php

	if ( !empty(get_field('property_name')) ) {

		// Variable declarations
		$name = get_field('property_name');
		$highlight = get_field('property_highlight');

		$slideshow = get_field('slideshow_gallery');

		$sleeps = get_field('number_sleeps');
		$rooms = get_field('number_rooms');
		$bathrooms = get_field('number_bathrooms');
		$low = get_field('low_price');
		$mid = get_field('mid_price');
		$high = get_field('high_price');
		$peak = get_field('peak_price');
		// Pretty prices
		$low_price = '€' . number_format($low, 0, '.', ',');
		$mid_price = '€' . number_format($mid, 0, '.', ',');
		$high_price = '€' . number_format($high, 0, '.', ',');
		$peak_price = '€' . number_format($peak, 0, '.', ',');

		// Info section
		$intro_title = get_field('intro_title');
		$intro_paragraph = get_field('intro_paragraph');
		$mood_gallery = get_field('mood_gallery');
		$general_writeup = get_field('general_writeup');

		$hostID = get_field('host');
		$host = $hostID[0];
		$host_image = wp_get_attachment_image_src( get_post_thumbnail_id($host), 'thumbnail' );
		$host_name = get_the_title( $host );
		$host_quote = get_field('host_quote');
		$signature = get_field('signature', $host);

		$accomodationID = get_field('accomodation_id');
		$ownerID = get_field('owner_id');

		// Map info is now pulled from map module
		$location_info = get_field('location_information');

		$feature_1_image = get_field('feature_1_image');
		$feature_1_description = get_field('feature_1_description');
		$feature_2_image = get_field('feature_2_image');
		$feature_2_description = get_field('feature_2_description');
		$feature_3_image = get_field('feature_3_image');
		$feature_3_description = get_field('feature_3_description');

		$floorplan_check = get_field('floorplan_check');

		$criticID = get_field('critic');
		$critic = $criticID[0];
		$critic_image = wp_get_attachment_image_src( get_post_thumbnail_id($critic), 'thumbnail' );
		$critic_name = get_the_title( $critic );
		$critique = get_field('critique');


		$rates_image = get_field('rates_image');
		$included_with_rates = get_field('included_with_rates');

	}
?>

	<main id="main" class="site-main" role="main">

		<div class="top-details">
			<h1><?php print($name); ?>&nbsp;&mdash;&nbsp;<?php print($highlight) ?></h1>
			<ul>
				<li><strong><?php print($rooms); ?> Bedrooms</strong></li>
				<li><strong><?php print($bathrooms); ?> Bathrooms</strong></li>
				<li>From <strong><?php print($low_price); ?></strong> /Week</li>
			</ul>
		</div>
		
		<section id="propertyFold" class="fold">

			<div id="featureSlideshow" class="main-slider">

				<?php 
					foreach($slideshow as $slide => $item) {

						$slideURL = $slideshow[$slide]['sizes']['large'];
						$slideTitle = $slideshow[$slide]['title'];

						?>
							<img src="<?php print($slideURL); ?>" alt="<?php print($slideTitle); ?>">
						<?php 
					}
				?>
			</div>

		</section>

		<div id="navSpace">
			<nav id="bookingNav">
				
				<ul class="wrapper">
					<li><a href="#info" title="<?php print($name); ?> Information">Info</a></li>
					<li><a href="#truths" title="<?php print($name); ?> Review">Home Truths</a></li>
					<li><a></a></li>
					<li><a href="#rates" title="<?php print($name); ?> Rates">Rates</a></li>
					<li><a href="#calendar" title="<?php print($name); ?> Calendar">Calendar</a></li>
					<li><a href="#book" class="button primary" title="Book your time at <?php print($name); ?>">Request To Book</a></li>
				</ul>

			</nav>
		</div>

		<section class="wrapper">

			<div class="intro readWidth">
				
				<hr class="zigzag sprite-global">

				<h2><?php print($intro_title) ?></h2>
				<?php print($intro_paragraph); ?>
				
			</div>

			<div class="feature">

				<div class="mood-gallery">
					<?php 
						foreach($mood_gallery as $mood => $item) {

							$moodURL = $mood_gallery[$mood]['sizes']['large'];
							$moodTitle = $mood_gallery[$mood]['title'];

							?>
								<div class="mood-image"><img src="<?php print($moodURL); ?>" alt="<?php print($moodTitle); ?>"></div>
							<?php 
						}
					?>		
				</div>		


				<section class="twoCol">

					<article class="col">
						<div>
							<?php print($general_writeup) ?>
						</div>

					</article>

					<aside class="col">

						<div class="host">

							<img class="avatar" src="<?php print($host_image[0]); ?>" alt="<?php print($host_name); ?>">
							<h3><em>Introducing your host:</em> <?php print($host_name); ?></h3>
							
							<?php print($host_quote) ?>
							
							<img class="signature" src="<?php print($signature['url']); ?>" alt="<?php print($host_name); ?> Signature">

						</div>

					</aside>

				</section>

			</div>

			<a class="section-link" id="info"></a>
			<section class="info">

			<h2 class="section-title"><?php print($name); ?> property details</h2>

				<section class="twoCol">
					<div class="col">
						<span>
							<?php print($feature_1_description); ?>
						</span>
					</div>

					<div class="col">
						<?php
							$video = get_field('video');

							if ($video == true) {
								$video_link = get_field('video_link'); ?>

								<a href="#play-video" class="video-showcase sprite-global video-hide">Play the Video</a>

								<iframe width="100%" height="400" id="property-video" src="<?php print(get_field('video_link')) ?>?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

						<?php 		
							}
						?>

						<img class="crop video-hide" src="<?php print_r($feature_1_image['sizes']['large']); ?>" alt="<?php print_r($feature_1_image['title']); ?>">
					</div>

				</section>

				<section class="twoCol">

					<div class="col">
						<img class="crop" src="<?php print_r($feature_2_image['sizes']['large']); ?>" alt="<?php print_r($feature_2_image['title']); ?>">
					</div>

					<div class="col">

						<span>
							<?php print($feature_2_description); ?>
						</span>
					</div>

				</section>

				<section class="twoCol">

					<div class="col">
						<span>
							<?php print($feature_3_description); ?>
						</span>
					</div>

					<div class="col">
						<img class="crop" src="<?php print_r($feature_3_image['sizes']['large']); ?>" alt="<?php print_r($feature_3_image['title']); ?>">
					</div>

				</section>

				<article class="twoCol">
					
					<div class="col">

						<div id="map" class="map_div">
						</div>

					</div>

					<div class="col">
						<span>
							<?php print($location_info); ?>
						</span>
					</div>
				</article>

				<?php 
					if ($floorplan_check == true) {
						$floorplans = get_field('floorplan');
						$floorplan_description = get_field('floorplan_description');			
					?>

					<section class="twoCol">
						
						<div class="col">
							<span>
								<?php print($floorplan_description); ?>
							</span>
						</div>
						
						<div class="col" id="floorplanSlideshow">
							<?php 
								foreach($floorplans as $floorplan => $item) {

									$floorplanURL = $floorplans[$floorplan]['sizes']['large'];
									$floorplanTitle = $floorplans[$floorplan]['title'];

									?>
										<img src="<?php print($floorplanURL); ?>" alt="<?php print($floorplanTitle); ?>">
									<?php 
								}
							?>
						</div>

					</section>
				<?php 
					}
				?>

			</section>

			<a class="section-link" id="truths"></a>
			<aside class="truths">

				<h2 class="section-title"><?php print($name); ?> features</h2>

					<section class="twoCol">
						
						<div class="col">
							<div class="facilities">
								<ul>
									<li><i class="sprite-global"></i>Sleeps <?php print($sleeps);?></li>
									<li><i class="sprite-global"></i><?php print($rooms);?> Bedrooms</li>
									<li><i class="sprite-global"></i><?php print($bathrooms);?> Bathrooms</li>

									<?php	// check if the repeater field has rows of data
										if( have_rows('facilities') ) {
											while ( have_rows('facilities') ) : the_row(); ?>
												<li><i class="sprite-global"></i><?php the_sub_field('facility');?></li>
											<?php endwhile;
										} 
									?>
								</ul>
								<div class="promise">
										
									<h4>Every Stay Includes</h4>

									<aside class="promises">
										<figure>
											<span class="sprite-welcome sprite-global"></span>
											<figcaption>Welcome</figcaption>
										</figure>

										<figure>
											<span class="sprite-cleaning sprite-global"></span>
											<figcaption>Cleaning</figcaption>
										</figure>

										<figure>
											<span class="sprite-toiletries sprite-global"></span>
											<figcaption>Toiletries</figcaption>
										</figure>

										<figure>
											<span class="sprite-sheets sprite-global"></span>
											<figcaption>Sheets &amp; Towells</figcaption>
										</figure>

										<figure>
											<span class="sprite-support sprite-global"></span>
											<figcaption>24/7 Support</figcaption>
										</figure>
									</aside>

								</div>
							</div>

						</div>

						<div class="col">
							<div class="critic">
								<img class="avatar" src="<?php print($critic_image[0]); ?>" alt="<?php print($critic_name); ?>">
								<h3><em>Insights by our critic:</em> <?php print($critic_name); ?></h3>
								<?php print($critique); ?>
							</div>
						</div>

					</section>

			</aside>

			<a class="section-link" id="rates"></a>
			<section class="rates">

				<h2 class="section-title"><?php print($name); ?> rates &amp; availability</h2>

				<img src="<?php print_r($rates_image['sizes']['large']); ?>" alt="<?php print_r($rates_image['title']); ?>">
				
				<aside>	

					<a href="#rates-info" class="more-info sprite-global">Info</a>

					<div>
						<p>Low season rate:</p>
						<h3><?php print($low_price); ?> /Week</h3>
					</div>

					<div>
						<p>Mid season rate:</p>
						<h3><?php print($mid_price); ?> /Week</h3>
					</div>

					<div>
						<p>High season rate:</p>
						<h3><?php print($high_price); ?> /Week</h3>
					</div>

					<div>
						<p>Peak season rate:</p>
						<h3><?php print($peak_price); ?> /Week</h3>
					</div>
				</aside>

				<div id="rates-info">
					<hr class="zigzag sprite-global">
					<h2>Not just the home&hellip;</h2>
					<?php print($included_with_rates); ?>
				</div>

			</section>

			<a class="section-link" id="book"></a>

			<section class="book">

			<?php 
				if ($post->post_parent) {
				    $parent = get_page($post->post_parent); ?>

				<h2 class="section-title">Explore <?php echo apply_filters('the_title', $parent->post_title); ?></h2>

				<div class="twoCol gutter">
				
					<div class="col">
						<div class="region-details">

							<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->post_parent) ); ?>">

							<span>
								<?php echo apply_filters('the_content', $parent->post_content); ?>

								<a class="button secondary" href="/category/discover/<?php echo apply_filters('the_title', $parent->post_title); ?>" target="_blank" title="Discover <?php echo apply_filters('the_title', $parent->post_title); ?>">Discover <?php echo apply_filters('the_title', $parent->post_title); ?></a>

							</span>
						</div>
					</div>

				<?php } ?>

					<div class="col">

						<div id="book" class="booking-form">

							<?php echo do_shortcode( '[sitepoint_contact_form propertyId="'.$name.'" ownerid="'.$ownerID.'" accom_id="'.$accomodationID.'"]' ); ?>

							<aside>
								<p>Any problems? <a href="#contact" title="Contact Us">Contact Us</a>.</p>
							</aside>

						</div>
					</div>
				</div>
			</section>
		</section>
	</main>

<!-- Pull map code to display custom map -->
<?php get_template_part( 'modules/map', 'page' ); ?>

<?php get_footer(); ?>
