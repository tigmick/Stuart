<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package _mbbasetheme
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer wrapper" role="contentinfo">

		<ul>

			<p>Something in the footer</p>

		</ul>


		<?php if (!is_front_page()) { ?>

			  <p>&copy; Hand Picked Riviera <?php print(date('Y'))?>&nbsp;&nbsp;&nbsp;<a target="_blank" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/docs/tsandcs.pdf" title="Terms and Conditions">Terms &amp; Conditions</a></p>

		<?php } ?>

	</footer>

</div><!-- #page -->

<?php get_template_part( 'modules/contact', 'page' ); ?>
<?php get_template_part( 'modules/coming-soon', 'page' ); ?>

<nav id="mobile-nav">
	<hr class="zigzag sprite-global">
	<?php wp_nav_menu(array('menu' => 'Mobile')); ?>
</nav>

<?php wp_footer(); ?>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-113698508-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-113698508-1');
</script>

</body>
</html>
