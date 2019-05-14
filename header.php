<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Oxygen
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header>
		<div class="container">
			<!-- nav -->
			<nav class="py-md-4 py-3 d-lg-flex">
				<div id="logo">
					<?php if(vp_option('b_option.c_logo') != null) :?>
                        <a href="<?php echo home_url('/') ?>"><img src="<?php echo vp_option('b_option.c_logo')?>"></a>
                    <?php else: ?>
						<h1 class="mt-md-0 mt-2">
							<a href="<?php echo home_url('/')?>"><span class="fa fa-snowflake-o"></span> <?php bloginfo( 'name' ); ?> </a>
						</h1>
					<?php endif; ?>
				</div>
				<label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
				<input type="checkbox" id="drop" />
				<?php 
                	wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'container'		 => 'ul',
						'menu_class'	 => 'menu ml-auto mt-1'
					));
                ?>
			</nav>
			<!-- //nav -->
		</div>
	</header>
	<?php if(is_front_page()): ?>
	<section class="banner_w3lspvt" id="home">
		<div class="csslider infinity" id="slider1">
			<?php $counts = wp_count_posts('simple_slider');
			for($i = 0; $i < $counts->publish; $i++){
				echo '<input type="radio" name="slides" id="slides_'.($i+1).'" />';
			}
			?>
			<ul>
				<?php 
				$sliders = new WP_Query(array('post_type'   => 'simple_slider')); 
				while($sliders->have_posts()) : $sliders->the_post(); ?>
					<li>
						<div class="banner-top" style="background: url(<?php echo vp_metabox('s_mb.slider')?>) no-repeat center; background-size: cover">
							<div class="overlay">
								<div class="container">
									<div class="w3layouts-banner-info">
										<h3 class="text-wh"><?php echo vp_metabox('s_mb.title_s')?></h3>
										<h4 class="text-wh"><?php echo vp_metabox('s_mb.sub_s')?></h4>
										<div class="buttons mt-4">
											<a href="<?php echo home_url('/contact/')?>" class="btn mr-2">Contact Us</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</li>
				<?php endwhile;?>
			</ul>
			<div class="arrows">
				<?php $counts = wp_count_posts('simple_slider');
				for($i = 0; $i < $counts->publish; $i++){
					echo '<label for="slides_'.($i+1).'"></label>';
				}
				?>
			</div>
		</div>
	</section>
	<?php else :?>
	<section class="banner_inner" id="home" style="background: url(<?php echo vp_option('b_option.banner')?>) no-repeat center; background-size: cover">
		<div class="banner_inner_overlay"></div>
	</section>
	<?php endif; ?>
	<script type="text/javascript">
		(function(){
			document.getElementById("slides_1").checked = true;
		})()
	</script>

	<div id="content" class="site-content container">
