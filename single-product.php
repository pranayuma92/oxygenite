<?php
if(vp_option('b_option.p_mode') == null) {
	wp_redirect( home_url( '/' ) );
    exit();
}

get_header(); ?>
	<section class="py-5">
		<div class="container py-lg-5 py-sm-4">
			<?php while(have_posts()) : the_post(); ?>
				<h3 class="heading text-capitalize text-center"><?php the_title();?></h3>
				<div class="row py-5">
					<div class="col-lg-6 contact-right pl-lg-5">
					
						<div class="image-tour position-relative">
							<img src="<?php echo get_the_post_thumbnail_url() ?>" alt="" class="img-fluid" />
						</div>
					</div>
					<div class="col-lg-6">
						<?php if(vp_metabox('p_mb.p_sale_price') != null) : ?>
						<h4><span>Rp <?php echo number_format(vp_metabox('p_mb.p_sale_price'),0,'.','.'); ?> <del>Rp <?php echo number_format(vp_metabox('p_mb.p_reg_price'),0,'.','.'); ?></del></span></h4>
						<?php else :?>
						<h4><span>Rp <?php echo number_format(vp_metabox('p_mb.p_reg_price'),0,'.','.'); ?></span></h4>
						<?php endif; ?>
						<p class="mt-3"><?php the_content(); ?></p><br>
						<div class="cta-button">
							<?php if(vp_option('b_option.p_wa') == 1) {?>
								<button class="btn sent-butnn btn-wa" onclick="orderWa()">Order via Whatsapp</button>
							<?php } ?>

							<?php if(vp_option('b_option.p_email') == 1) {?>
								<button class="btn sent-butnn btn-email" onclick="orderEmail()">Order via Email</button>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	</section>
	<script type="text/javascript">
		function orderWa(){
			window.location.href = 'https://api.whatsapp.com/send?phone=<?php echo str_replace('0', '62', vp_option('b_option.contact'))?>&text=Halo%2C%20saya%20mau%20order%20<?php echo get_the_title(); ?>';
		}

		function orderEmail(){
			window.location.href = 'mailto:<?php echo vp_option('b_option.email')?>';
		}
	</script>
<?php
get_footer();
