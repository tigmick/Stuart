<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package _mbbasetheme
 */

get_header(); ?>

	<?php 
	/**
	 * If child of 'discover' show discover-child template
	 * Else if is 'discover' archive show discover-parent template
	 */

	$idObj = get_category_by_slug('discover'); 
  $discId = $idObj->term_id;

	$catid = get_query_var('cat'); // current cat ID
	if ( cat_is_ancestor_of( $discId, $catid ) ) { // 9 is ID of the parent category ON LOCALHOST - CHANGE FOR PROD
	    get_template_part('templates/discover', 'child');
	} elseif ( is_category($discId) ) {
	    get_template_part('templates/discover', 'parent');
	}
	?>

<?php get_footer(); ?>