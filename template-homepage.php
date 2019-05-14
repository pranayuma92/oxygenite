<?php
/*
 * Template Name: Homepage
 */

get_header(); ?>
	<section class="py-5">
		<div class="container py-lg-5 py-sm-4">
			<?php while(have_posts()) : the_post();?>
				<h3 class="heading text-capitalize text-center"><?php echo vp_metabox('page_mb.m_title'); ?></h3>
				<p class="text mt-2 mb-5 text-center"><?php echo vp_metabox('page_mb.s_title'); ?></p>
			<?php endwhile;?>
			<div class="row">
				<?php echo do_shortcode('[product-overview-list]');?>
			</div>
		</div>
	</section>
<?php
get_footer();