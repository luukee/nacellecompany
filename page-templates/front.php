<?php
/*
Template Name: Front
*/
get_header();

?>

<?php do_action('Nacelle_before_content'); ?>


<div class="grid-x front-page-template">
	<div class="cell">


		<?php
		$image = get_field('gif');
		$seconds = get_field('seconds');
		$secondsHide = $seconds + 1;
		$video_mp4 =  get_field('splash');
		$iframe =  get_field('embed_video');
		$count = 0;
		?>

		<?php // if ($image) : 
		?>

		<!-- <div class="splash">
				<img src="<?php // echo $image['url']; 
							?>" alt="<?php // echo $image['alt']; 
																?>" />
			</div> -->

		<?php // if ($video_mp4) : 
		?>

		<!-- <div class="splash fade-in"> -->
		<?php

		// https://speckyboy.com/html5-video-wordpress-custom-fields/
		// Get the Video Fields

		// Build the  Shortcode
		// $attr =  array(
		// 	'mp4'      => $video_mp4,
		// 	'preload'  => 'auto',
		// 	'autoplay' => 'on'
		// );

		// // Display the Shortcode
		// echo wp_video_shortcode($attr);


		?>
		<!-- </div> -->
		<?php if ($iframe) : ?>

			<div class="splash fade-in">

				<div class="embed-container">
					<?php echo $iframe; ?>	
				<!-- <iframe src="https://player.vimeo.com/video/365579426?autoplay=1" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe> -->
					<?php

					// use preg_match to find iframe src
					// preg_match('/src="(.+?)"/', $iframe, $matches);
					// $src = $matches[1];


					// // add extra params to iframe src
					// $params = array(
					// 	'loop' => 0,
					// 	'autoplay' => 1,
					// 	'title' => 0,
					// 	'byline' => 0,
					// 	'portrait' => 0,
					// 	'gesture' => 'media',
					// 	'muted' => 1

					// );

					// $new_src = add_query_arg($params, $src);

					// $iframe = str_replace($src, $new_src, $iframe);

					// // add extra attributes to iframe html
					// // $attributes = 'allowfullscreen muted allow="autoplay"';

					// $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);


					// // echo $iframe
					// echo $iframe;

					?>
				</div>
				<script src="https://player.vimeo.com/api/player.js"></script>
			</div>

		<?php else : ?>

		<?php endif; ?>

		<script>
			let splash = document.querySelector(".splash");
			window.addEventListener("load", function() {
				setTimeout(function() {
					splash.classList.add("slideLeft");

				}, <?php echo $seconds; ?>000);

			});

			window.addEventListener("load", function() {
				setTimeout(function() {
					splash.classList.add("hidden");

				}, <?php echo $secondsHide; ?>000);

			});
		</script>

		<?php while (have_posts('')) : the_post(); ?>
			<?php get_template_part('template-parts/clean-hero-slider'); ?>

			<div class="circle-slider orbit mb-4" role="region" aria-label="Nacelle News Slider" data-orbit data-auto-play="false" data-use-m-u-i="false">

				<ul class="orbit-container" id="circle-posts">

					<div class="grid-x background-slide-container orbit-group">
						<div class="small-12 medium-4 large-4 press-title-background columns">
							<!-- <img src="<?php //bloginfo('template_directory'); 
											?>/dist/assets/images/news-slider-title-bkgnd.png" alt="press title background" /> -->

						</div>
					</div>

					<?php get_template_part('template-parts/circle-slider'); ?>

				</ul>

			</div>
		<?php endwhile; ?>
		<!-- END LOOP -->

		<?php get_template_part('template-parts/front-partners'); ?>

	</div>
</div>

<?php get_footer(); ?>