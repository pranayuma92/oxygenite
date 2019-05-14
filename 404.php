<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Oxygen
 */

get_header();
?>

	<section class="py-5">
		<div class="container py-lg-5 py-sm-4 text-center">
			<h3 class="heading text-capitalize text-center">Oops! Terjadi Kesalahan</h3>
			<p class="text mt-2 mb-5 text-center">Sepertinya halaman yang anda cari tidak ditemukan</p>
			<button class="btn sent-butnn text-center" onclick="window.location.href='<?php echo home_url('/')?>'">Homepage</button>
		</div>
	</section>

<?php
get_footer();
