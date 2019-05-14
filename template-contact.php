<?php
/*
 * Template Name: Contact
 */

get_header(); ?>
	<section class="contact py-5">
		<div class="container py-lg-5 py-sm-3">
			<h2 class="heading text-capitalize text-center mb-sm-5 mb-4"> Kontak kami</h2>
			<ul class="list-unstyled row text-center mt-lg-5 mt-4 px-lg-5">
                <li class="col-md-4 col-sm-6 adress-w3pvt-info">
                    <div class=" adress-icon">
                        <span class="fa fa-map-marker"></span>
                    </div>

                    <h6>Alamat</h6>
                    <p><?php echo vp_option('b_option.address')?></p>
                </li>

                <li class="col-md-4 col-sm-6 adress-w3pvt-info mt-sm-0 mt-4">
                    <div class="adress-icon">
                        <span class="fa fa-envelope-open-o"></span>
                    </div>
                    <h6>Telepon & Email</h6>
                    <p><?php echo vp_option('b_option.contact')?></p>
                    <a href="mailto:<?php echo vp_option('b_option.contact')?>" class="mail"><?php echo vp_option('b_option.email')?></a>
                </li>
                <li class="col-md-4 col-sm-6 adress-w3pvt-info mt-md-0 mt-4">

                    <div class="adress-icon">
                        <span class="fa fa-comments-o"></span>
                    </div>

                    <h6>Sosial media</h6>
					<ul class="social_section_1info mt-2">
						<li class="mb-2 facebook"><a href="<?php echo vp_option('b_option.facebook')?>"><span class="fa fa-facebook"></span></a></li>
						<li class="mb-2 twitter"><a href="<?php echo vp_option('b_option.twitter')?>"><span class="fa fa-twitter"></span></a></li>
						<li class="google"><a href="<?php echo vp_option('b_option.instagram')?>"><span class="fa fa-instagram"></span></a></li>
					</ul>
                </li>
            </ul>
			
			<div class="contact-grids mt-5">
				<div class="row">
					<div class="col-md-8 contact-left-form offset-md-2">
						<form action="#" method="post">
							<div class=" form-group contact-forms">
							  <input type="text" class="form-control" placeholder="Nama *" required="">
							</div>
							<div class="form-group contact-forms">
							  <input type="email" class="form-control" placeholder="Email *" required="">
							</div>
							<div class="form-group contact-forms">
							  <input type="text" class="form-control" placeholder="Telepon *" required=""> 
							</div>
							<div class="form-group contact-forms">
							  <textarea class="form-control" placeholder="Pesan" rows="3"></textarea>
							</div>
							<button class="btn btn-block sent-butnn">Kirim</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="map p-2">
	<?php echo vp_option('b_option.map')?>
</div>
<?php
get_footer();