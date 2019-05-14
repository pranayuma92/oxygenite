<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Oxygen
 */

get_header();
?>

	<section class="py-5">
		<div class="container py-lg-5 py-sm-4">
			<?php while(have_posts()) : the_post();?>
				<h3 class="heading text-capitalize text-center"><?php echo vp_metabox('page_mb.m_title'); ?></h3>
				<p class="text mt-2 mb-5 text-center"><?php echo vp_metabox('page_mb.s_title'); ?></p>
				<div><?php the_content(); ?></div>
			<?php endwhile;?>
		</div>
	</section>

<?php
get_footer();
