<?php
/*
 * Template Name: Product Overview
 */

get_header();
global $post; 
$meta   = get_post_meta((get_queried_object())->ID, 'page_mb', true); 
$title  = $meta['m_title'];
$stitle = $meta['s_title'];
$otitle = $meta['services'][0]['o_title'];
$oitem  = $meta['services'][0]['s_lists'];
$pitem  = $meta['o_promoitem'][0];


	if($meta['o_banner']) : ?>

	<section class="book py-5 alignfull">
		<div class="container py-lg-5 py-sm-3">
			<h2 class="heading text-capitalize text-center"><?php echo $otitle; ?></h2>
			<div class="row mt-5 text-center">
				<?php foreach(array_slice($oitem, 0, 3) as $item) : ?>
					<div class="col-lg-4 col-sm-6">
						<div class="grid-info">
							<div class="icon">
								<span class="fa <?php echo $item['i_logo']?>"></span>
							</div>
							<h4><?php echo $item['i_title']?></h4>
							<p class="mt-3"><?php echo $item['i_content']?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php endif; ?>

	<section class="py-5" id="product-overview">
		<div class="container py-lg-5 py-sm-4">
			<?php while(have_posts()) : the_post();?>
				<h3 class="heading text-capitalize text-center"><?php echo $title; ?></h3>
				<p class="text mt-2 mb-5 text-center"><?php echo $stitle ?></p>
			<?php endwhile;?>
			<div class="row">
				<?php echo do_shortcode('[product-overview-list]');?>
			</div>
		</div>
	</section>

	<?php if($meta['o_promo']) : ?>
	<section class="text-content alignfull" style="background: url(<?php echo $pitem['p_img']; ?>) no-repeat center; background-size: cover;">
		<div class="overlay-inner py-5">
			<div class="container py-md-3">
				<div class="test-info">
					<h4 class="tittle"><?php echo $pitem['p_title']; ?></h4>
					<p class="mt-3"><?php echo $pitem['p_content']; ?></p>
					<div class="text-left mt-4">
							<a href="#product-overview">Book Now</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>
<?php
// echo '<pre>';
// print_r($meta);
// echo '</pre>';
get_footer();