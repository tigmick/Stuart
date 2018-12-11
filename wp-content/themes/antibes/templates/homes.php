<?php
/**
 * Template Name: Homes Page
 *
 * Displays all Hand Picked Riviera Homes on the site
 *
 * @package _mbbasetheme
 */

get_header(); ?>

	<main id="main" class="site-main parent-page" role="main">

		<div id="map_wrapper">

			<header>
				<div class="section-title">
					<h1>Hand&mdash;Picked Homes</h1>
				</div>

				<!-- <nav>
					<?php get_template_part( 'modules/region-nav', 'page' ); ?>
				</nav> -->
			</header>

	    <div id="map_canvas" class="mapping map_div"></div>

		</div>

		<section class="list_wrapper">

			<section class="parent-homes clearfix">

			<?php
				if ( have_posts() ) {
					while ( have_posts() ) : the_post();
						
						$children = new WP_Query( array (
							'post_type' => 'page', 
							'post_parent' => get_the_ID() ,
							'order' => 'ASC'
						));

						if ( $children->have_posts() ) { 

							while ( $children->have_posts() ) : $children->the_post(); ?>

								<article class="post-children" id="child<?=get_the_ID()?>">

									<?php 
										$featurePhoto = get_field('slideshow_gallery', get_the_ID()); 
										$sleeps = get_field('number_sleeps');
										$low = get_field('low_price');
										$low_price = '€' . number_format($low, 0, '.', ',');
									?>

									<a class="img-container" href="<?php the_permalink(); ?>" target="_blank" title="<?php the_title(); ?>"><img src="<?php print_r($featurePhoto[0]['url']); ?>" alt="<?php print_r($featurePhoto[0]['title']); ?>"></a>

									<div class="details">
										<h3><a href="<?php the_permalink(); ?>" target="_blank" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>

										<ul>
											<li>Sleeps <?php print($sleeps); ?></li>
											<li><strong>From <?php print($low_price); ?> p/w</strong></li>
										</ul>

									</div>
								</article>

							<?php endwhile ?>
						</ul>

						<?php 
						}
					endwhile;
				}
			?>
			</section>
		</section>
	</main>

<?php get_template_part( 'modules/map', 'page' ); ?>

<?php get_footer(); ?>