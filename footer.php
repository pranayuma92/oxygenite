<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Oxygen
 */

?>

	</div><!-- #content -->

	<footer>
		<!-- copyright -->
		<div class="copyright py-3 text-center">
			<ul class="social_section_1info">
				<li class="mb-2 facebook"><a href="<?php echo vp_option('b_option.facebook')?>"><span class="fa fa-facebook"></span></a></li>
				<li class="mb-2 twitter"><a href="<?php echo vp_option('b_option.twitter')?>"><span class="fa fa-twitter"></span></a></li>
				<li class="google"><a href="<?php echo vp_option('b_option.instagram')?>"><span class="fa fa-instagram"></span></a></li>
				<li class="linkedin"><a href="mailto:<?php echo vp_option('b_option.email')?>"><span class="fa fa-envelope-open-o"></span></a></li>
			</ul>
			<p>© <?php echo date('Y') ?> - <?php echo bloginfo('name')?> . | by <a href="http://ukmgood.com/" target="=_blank"> ukmgood.com </a></p>

		</div>
		<!-- //copyright -->

		<!-- move top -->
		<div class="move-top text-right">
			<a href="#home" class="move-top"> 
				<span class="fa fa-angle-up  mb-3" aria-hidden="true"></span>
			</a>
		</div>
	</footer>
	<!-- //footer -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
