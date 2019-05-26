<?php
/*
 * Template Name: Booking
 */
ob_start();
get_header(); 
	 
	$post_id = get_query_var('id');
    $post_object = get_post($post_id);
    $post_meta = get_post_meta($post_id, 'p_mb');

	if($post_object->post_type != 'product') {
		wp_redirect( home_url( '/' ) );
        exit();
	}

	if($post_meta[0]['p_sale_price'] != null) {
		$price = $post_meta[0]['p_sale_price'];
	} else {
		$price = $post_meta[0]['p_reg_price'];
	}
    
	?>
	<section class="contact py-5">
		<div class="container py-lg-5 py-sm-4">
			<h2 class="heading text-capitalize text-center mb-lg-5 mb-4"><?php echo $post_object->post_title; ?></h2>
			<div class="contact-grids">
				<div class="row">
					<div class="col-lg-7 contact-left-form">
						<form action="#" method="post" class="row">
							<div class="col-sm-12 form-group contact-forms">
							  <input type="text" name="bookName" class="form-control" placeholder="Nama" required="" value="">
							</div>
							<div class="col-sm-12 form-group contact-forms">
							  <input type="email" name="bookEmail" class="form-control" placeholder="Email" required="" value="">
							</div>
							<div class="col-sm-12 form-group contact-forms">
							  <input type="text" name="bookPhone" class="form-control" placeholder="Telepon" required="" value=""> 
							</div>
							<div class="col-sm-12 form-group contact-forms">
							  <input type="text" name="bookObject" class="form-control" placeholder="Object" value="<?php echo $post_object->post_title; ?>" disabled> 
							</div>
							<div class="col-sm-12 form-group contact-forms" style="display: none">
							  <input type="text" name="bookPrice" class="form-control" placeholder="Price" value="Rp <?php echo number_format($price,0,'.','.'); ?>" disabled> 
							</div>
							<div class="col-md-12 form-group contact-forms">
							  <textarea class="form-control" name="bookAdd" placeholder="Alamat" rows="3" ></textarea>
							</div>
							<div class="col-md-12 booking-button">
								<input type="submit" class="btn btn-block sent-butnn" value="Book Now" name="bookSumbit"/>
							</div>
						</form>
					</div>
					<div class="col-lg-5 contact-right pl-lg-5">
					
						<div class="image-tour position-relative">
							<img src="<?php echo get_the_post_thumbnail_url($post_id, 'full') ?>" alt="" class="img-fluid" />
							<?php if($post_meta[0]['p_sale_price'] != null) : ?>
							<p><span class="fa fa-tags"></span> <span>Start from Rp <?php echo number_format($post_meta[0]['p_sale_price'],0,'.','.'); ?> <del>Rp <?php echo number_format($post_meta[0]['p_reg_price'],0,'.','.'); ?></del></span></p>
							<?php else :?>
							<p><span class="fa fa-tags"></span> <span>Start from Rp <?php echo number_format($post_meta[0]['p_reg_price'],0,'.','.'); ?></span></p>
						<?php endif;?>
						</div>
						
						<h4>Deskripsi</h4>
						<p class="mt-3"><?php echo $post_object->post_content; ?></p>
						
					</div>
				</div>
			</div>
		</div>
	</section>
<?php
if(isset($_POST['bookSumbit'])){
	$name = sanitize_text_field($_POST['bookName']);
	$email = sanitize_email( $_POST["bookEmail"] );
	$phone = sanitize_text_field($_POST['bookPhone']);
	$object = $post_object->post_title;
	$fprice =  'Rp ' . number_format($price,0,'.','.');
	$address = sanitize_text_field($_POST['bookAdd']);

	$data = array(
		'{name}' => $name,
		'{email}' => $email,
		'{phone}' => $phone,
		'{object}' => $object,
		'{price}' => $fprice,
		'{address}' => $address

	);

	$to = vp_option('b_option.to');
	//$headers[] = 'Content-Type: text/html; charset=UTF-8';
	$headers[] = "From: $name <$email>";
	$subject = strtr(vp_option('b_option.subject'), $data);
	$body = strtr(vp_option('b_option.body'), $data);
	$btky = strtr(vp_option('b_option.body_thankyou'), $data);
	//$headers2[] = 'Content-Type: text/html; charset=UTF-8';
	$headers2[] = "From: Sales Team <$to>";

	if(wp_mail($to, $subject, $body, $headers)) {
		wp_mail($email, $subject, $btky, $headers2);
		echo '<div>';
		echo '<p>Thanks for booking, expect a response soon.</p>';
		echo '</div>';
	} else {
		echo 'An unexpected error occurred';
	}
}

get_footer();