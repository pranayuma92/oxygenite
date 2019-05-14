<?php

class ExtendedFunction {

	public function init(){
		add_action( 'wp_enqueue_scripts', array($this, 'oxygen_enqueue_scripts'));
		add_action( 'after_setup_theme', array($this, 'product_metaboxes'));
		add_action( 'after_setup_theme', array($this, 'slider_metaboxes'));
		add_action( 'after_setup_theme', array($this, 'page_metaboxes'));
		add_action( 'after_setup_theme', array($this, 'init_options'));
		add_action( 'admin_menu', array($this, 'custom_menu_page'));
		add_filter( 'manage_product_posts_columns', array($this, 'manage_product_column'));
		add_action( 'manage_product_posts_custom_column' , array($this, 'custom_product_column'),10, 2);
		add_filter( 'excerpt_length', array($this, 'custom_excerpt_length'));
		add_filter( 'excerpt_more', array($this, 'new_excerpt_more'));
		add_shortcode('product-overview-list', array($this, 'overview_product_list'));
		add_filter( 'query_vars', array($this, 'custom_query_vars_filter'));
		add_action('init', array($this, 'custom_rewrite_rule'), 10, 0);
		add_filter( 'wp_mail_content_type', array($this, 'set_content_type') );
	}

	public function oxygen_enqueue_scripts(){
		wp_enqueue_style( 'oxygen-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css' );
		wp_enqueue_style( 'oxygen-custom', get_template_directory_uri() . '/assets/css/style.css' );
		wp_enqueue_style( 'oxygen-fa', get_template_directory_uri() . '/assets/css/font-awesome.min.css' );
		wp_enqueue_style( 'oxygen-slider-style', get_template_directory_uri() . '/assets/css/css_slider.css' );
		wp_enqueue_style( 'open-sans', '//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i' );
		wp_enqueue_style( 'raleway', '//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i' );
	}

	public function product_metaboxes() {
	    $mb_path  = get_template_directory() . '/inc/product-metabox.php';
	    $mb = new VP_Metabox(array(
	        'id'          => 'p_mb',
	        'types'       => array('product'),
	        'title'       => __('Product Option', 'oxygen'),
	        'priority'    => 'high',
	        'is_dev_mode' => false,
	        'template'    => $mb_path
	    ));
	}

	public function slider_metaboxes() {
	    $mb_path  = get_template_directory() . '/inc/slider-metabox.php';
	    $mb = new VP_Metabox(array(
	        'id'          => 's_mb',
	        'types'       => array('simple_slider'),
	        'title'       => __('Slider Option', 'oxygen'),
	        'priority'    => 'high',
	        'is_dev_mode' => false,
	        'template'    => $mb_path
	    ));
	}

	public function page_metaboxes() {
	    $mb_path  = get_template_directory() . '/inc/page-metabox.php';
	    $mb = new VP_Metabox(array(
	        'id'          => 'page_mb',
	        'types'       => array('page'),
	        'title'       => __('Page Option', 'oxygen'),
	        'priority'    => 'high',
	        'is_dev_mode' => false,
	        'template'    => $mb_path
	    ));
	}

	public function init_options() {
	    $tmpl_opt  = get_template_directory() . '/inc/theme-option.php';
	    $theme_options = new VP_Option(array(
	        'is_dev_mode'           => false,
	        'option_key'            => 'b_option',
	        'page_slug'             => 'b_option',
	        'template'              => $tmpl_opt,
	        'menu_page'             => 'b_option',
	        'use_auto_group_naming' => true,
	        'use_exim_menu'         => true,
	        'minimum_role'          => 'edit_theme_options',
	        'layout'                => 'fixed',
	        'page_title'            => __( 'Theme Settings', 'oxygen' ),
	        'menu_label'            => __( 'Theme Settings', 'oxygen' ),
	    ));
	}

	public function custom_menu_page() {
	   add_menu_page( 'Theme Settings', 'Theme Settings', 'manage_options', 'b_option', array($this, 'init_options'), 'dashicons-art'  );
	}

	public function manage_product_column($columns){
		$columns = array(
			'cb' => $columns['cb'],
	    	'image' => __( 'Image' ),
	    	'title' => __( 'Title' ),
	    	'category' => __( 'Category' ),
	    	'price' => __( 'Price' ),
	    	'sale' => __('Sale Price'),
	    	'sku' => __( 'SKU' ),
	    	'date' => __( 'Date')
		);
		return $columns;
	}

	public function custom_product_column($column, $post_id){
		if ( 'image' === $column ) {
			echo get_the_post_thumbnail( $post_id, array(80, 80) );
		}

		if( 'price' === $column ) {
			echo 'Rp '.number_format(vp_metabox('p_mb.p_reg_price'), 0,'.','.');
		}

		if( 'sale' === $column ) {
			if(vp_metabox('p_mb.p_sale_price') != null){
				echo 'Rp '.number_format(vp_metabox('p_mb.p_sale_price'), 0,'.','.');
			}else {
				echo '-';
			}
		}

		if( 'sku' === $column ) {
			echo vp_metabox('p_mb.p_code');
		}

		if( 'category' === $column ){
			$cat = get_the_terms($post->ID, 'product_category');
			if($cat){
				echo $cat[0]->name;
			} else {
				echo '-';
			}
		}

		if( 'date' === $column ){
			echo get_the_date( 'F j, Y');
		}
	}

	public function custom_excerpt_length() {
	    return 30;
	}

	function new_excerpt_more( $more ) {
		return '...';
	}

	public function overview_product_list(){
		if(vp_option('b_option.p_mode') == null) {
			$count = 1;
			$order = 'rand';
		} else {
			$count = vp_option('b_option.p_count');
			$order = 'date';
		}

		$args = array(
			'post_type' => 'product',
			'posts_per_page' => $count,
			'post_status' => 'publish',
			'orderby' => $order
 		);

 		$list = new WP_Query($args); 
 			while($list->have_posts()) : $list->the_post();
 				if(vp_option('b_option.p_mode') == null) : ?>
		 			<div class="col-lg-6 about-left">
						<h3 class="mt-lg-3"><?php the_title(); ?></h3>
						<p class="mt-4"><?php the_excerpt(); ?></p><br>
						<button class="btn sent-butnn" onclick="window.location.href='<?php echo home_url('/order/id/') . get_the_ID()?>'">Detail</button>
					</div>
					<div class="col-lg-6 about-right text-lg-right mt-lg-0 mt-5">
						<img src="<?php echo get_the_post_thumbnail_url()?>" alt="" class="img-fluid abt-image" />
					</div>
				<?php else: ?>
					<div class="col-lg-3 col-sm-6" onclick="window.location.href='<?php the_permalink()?>'">
						<div class="image-tour position-relative">
							<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="img-fluid" />
							<?php if(vp_metabox('p_mb.p_sale_price') != null) : ?>
							<p><span class="fa fa-tags"></span> <span>Rp <?php echo number_format(vp_metabox('p_mb.p_sale_price'),0,'.','.'); ?> <del>Rp <?php echo number_format(vp_metabox('p_mb.p_reg_price'),0,'.','.'); ?></del></span></p>
							<?php else :?>
							<p><span class="fa fa-tags"></span> <span>Rp <?php echo number_format(vp_metabox('p_mb.p_reg_price'),0,'.','.'); ?></span></p>
							<?php endif; ?>
						</div>
						<div class="package-info">
							<h5 class="my-2"><?php the_title(); ?></h5>
							<button class="btn btn-block sent-butnn">Detail</button>
						</div>
					</div>
 		<?php
 				endif;
 			endwhile;
	}

	public function custom_query_vars_filter($vars) {
	  	$vars[] .= 'id';
	  	return $vars;
	}

	public function custom_rewrite_rule() {
	    add_rewrite_rule('^order/id/([^/]*)$', 'index.php?pagename=order&id=$matches[1]', 'top');
	    flush_rewrite_rules();
	}

	public function set_content_type(){
	    return "text/html";
	}

}