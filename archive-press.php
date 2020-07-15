<?php

/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="main-container">

	<div class="main-grid grid-x">

		<main class="main-content">

			<header>
				<h1 class="entry-title"><?php _e('Press', 'nacelle'); ?></h1>
			</header>

			<?php
			// https://developer.wordpress.org/reference/functions/query_posts/

			$current_year = date('Y');

			$current_month = date('M');

			$posts = query_posts($query_string . "&post_status=future,publish&posts_per_page=60&order=DESC");

			if (have_posts()) : ?>

				<!--Start the Loop -->
				<?php while (have_posts()) : the_post();

					$link = get_field('link_to_article');
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
					$even_odd_class = $wp_query->current_post % 2 == 0 ? '' : 'article-row-reversed';

					?>

					<article class="article-row <?php echo $even_odd_class; ?>" id="post-<?php the_ID(); ?>">

						<div class="article-row-img">
							<a href="<?php echo esc_url($link_url); ?>" target="_blank">

								<?php the_post_thumbnail('rta_thumb_cropped_240x240'); ?>
							</a>

						</div>
						<svg class="news-image-hover-background" width="387" height="387" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
							<defs>
								<path d="M201.066667 0v47.2949357C273.241544 53.178696 330.187773 114.258997 330.187773 188.5s-56.946229 135.320656-129.121106 141.205712V377C299.076051 371.023577 377 288.768867 377 188.5 377 88.2317816 299.076051 5.97707108 201.066667 0" id="b" />
								<filter x="-4.5%" y="-1.9%" width="109.1%" height="104.2%" filterUnits="objectBoundingBox" id="a">
									<feOffset dy="2" in="SourceAlpha" result="shadowOffsetOuter1" />
									<feGaussianBlur stdDeviation="1" in="shadowOffsetOuter1" result="shadowBlurOuter1" />
									<feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.14 0" in="shadowBlurOuter1" result="shadowMatrixOuter1" />
									<feMorphology radius="1" in="SourceAlpha" result="shadowSpreadOuter2" />
									<feOffset dy="3" in="shadowSpreadOuter2" result="shadowOffsetOuter2" />
									<feGaussianBlur stdDeviation=".5" in="shadowOffsetOuter2" result="shadowBlurOuter2" />
									<feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.2 0" in="shadowBlurOuter2" result="shadowMatrixOuter2" />
									<feOffset dy="1" in="SourceAlpha" result="shadowOffsetOuter3" />
									<feGaussianBlur stdDeviation="2.5" in="shadowOffsetOuter3" result="shadowBlurOuter3" />
									<feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.12 0" in="shadowBlurOuter3" result="shadowMatrixOuter3" />
									<feMerge>
										<feMergeNode in="shadowMatrixOuter1" />
										<feMergeNode in="shadowMatrixOuter2" />
										<feMergeNode in="shadowMatrixOuter3" />
									</feMerge>
								</filter>
								<path d="M175.933333 377v-47.294288c-72.17514-5.884408-129.1215779-66.964709-129.1215779-141.205064 0-74.241651 56.9464379-135.321304 129.1215779-141.2057123V0C77.9242344 5.97707108 0 88.2317816 0 188.500648 0 288.768867 77.9242344 371.023577 175.933333 377" id="d" />
								<filter x="-4.5%" y="-1.9%" width="109.1%" height="104.2%" filterUnits="objectBoundingBox" id="c">
									<feOffset dy="2" in="SourceAlpha" result="shadowOffsetOuter1" />
									<feGaussianBlur stdDeviation="1" in="shadowOffsetOuter1" result="shadowBlurOuter1" />
									<feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.14 0" in="shadowBlurOuter1" result="shadowMatrixOuter1" />
									<feMorphology radius="1" in="SourceAlpha" result="shadowSpreadOuter2" />
									<feOffset dy="3" in="shadowSpreadOuter2" result="shadowOffsetOuter2" />
									<feGaussianBlur stdDeviation=".5" in="shadowOffsetOuter2" result="shadowBlurOuter2" />
									<feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.2 0" in="shadowBlurOuter2" result="shadowMatrixOuter2" />
									<feOffset dy="1" in="SourceAlpha" result="shadowOffsetOuter3" />
									<feGaussianBlur stdDeviation="2.5" in="shadowOffsetOuter3" result="shadowBlurOuter3" />
									<feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.12 0" in="shadowBlurOuter3" result="shadowMatrixOuter3" />
									<feMerge>
										<feMergeNode in="shadowMatrixOuter1" />
										<feMergeNode in="shadowMatrixOuter2" />
										<feMergeNode in="shadowMatrixOuter3" />
									</feMerge>
								</filter>
							</defs>
							<g fill="none" fill-rule="evenodd">
								<g transform="translate(5 4)">
									<use fill="#000" filter="url(#a)" xlink:href="#b" />
									<use fill="#2A2D2E" xlink:href="#b" />
								</g>
								<g transform="translate(5 4)">
									<use fill="#000" filter="url(#c)" xlink:href="#d" />
									<use fill="#2A2D2E" xlink:href="#d" />
								</g>
							</g>
						</svg>
						<div class="article-row-content">
							<h1 class="article-row-content-header">
								<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
									<svg width="31" height="20" xmlns="http://www.w3.org/2000/svg">
										<path class="newspaper-icon" d="M29.4871795 0H5.98290598c-1.1142094 0-2.06426282.69671875-2.41709401 1.66666667H1.28205128C.57398504 1.66666667 0 2.22630208 0 2.91666667V17.0833333C0 18.6941667 1.33931624 20 2.99145299 20H29.4871795c.7080662 0 1.2820513-.5596354 1.2820513-1.25V1.25c0-.69036458-.5739851-1.25-1.2820513-1.25zM2.56410256 17.0833333V4.16666667h.85470086V17.0833333c0 .2297396-.19172009.4166667-.42735043.4166667s-.42735043-.1869271-.42735043-.4166667zM28.2051282 17.5H5.95202991c.01997864-.1361458.03087607-.2751562.03087607-.4166667V2.5H28.2051282v15zM9.18803419 11.25h7.26495731c.3540064 0 .6410256-.2798437.6410256-.625v-5c0-.34515625-.2870192-.625-.6410256-.625H9.18803419c-.35400641 0-.64102564.27984375-.64102564.625v5c0 .3451563.28701923.625.64102564.625zm1.49572651-4.16666667h4.2735043v2.08333334h-4.2735043V7.08333333zM8.54700855 14.375v-1.25c0-.3451562.28701923-.625.64102564-.625h7.26495731c.3540064 0 .6410256.2798438.6410256.625v1.25c0 .3451563-.2870192.625-.6410256.625H9.18803419c-.35400641 0-.64102564-.2798437-.64102564-.625zm10.25641025 0v-1.25c0-.3451562.2870192-.625.6410256-.625H25c.3540064 0 .6410256.2798438.6410256.625v1.25c0 .3451563-.2870192.625-.6410256.625h-5.5555556c-.3540064 0-.6410256-.2798437-.6410256-.625zm0-7.5v-1.25c0-.34515625.2870192-.625.6410256-.625H25c.3540064 0 .6410256.27984375.6410256.625v1.25c0 .34515625-.2870192.625-.6410256.625h-5.5555556c-.3540064 0-.6410256-.27984375-.6410256-.625zm0 3.75v-1.25c0-.34515625.2870192-.625.6410256-.625H25c.3540064 0 .6410256.27984375.6410256.625v1.25c0 .3451563-.2870192.625-.6410256.625h-5.5555556c-.3540064 0-.6410256-.2798437-.6410256-.625z" fill-rule="nonzero" />
									</svg>

									<?php
									$theTitle = wp_strip_all_tags(get_field('title'));
									echo $theTitle; ?>
								</a>
							</h1>

							<p class="article-row-content-description">
								<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
									<?php
									$callout = wp_strip_all_tags(get_field('intro'));
									// echo $callout;
		echo substr($callout, 0, 150) ?>
								</a>
							</p>

							<p class="article-row-content-author">
								<?php
								$tag = get_the_tags();
								if ($tag) {
									?>
									<p><?php the_tags(); ?></p>
								<?php }
								?>
							</p>
							<time class="article-row-content-time" datetime="2008-02-14 20:00">
								<?php the_time('F j, Y'); ?>
							</time>

							<?php edit_post_link(__('(Edit)', 'nacelle'), '<span class="edit-link">', '</span>'); ?>

						</div>
					</article>

				<?php endwhile; ?>

			<?php endif; ?>
			<!-- End have_posts() check. -->

		</main>
		<?php wp_reset_query(); ?>
		<?php get_sidebar(); ?>

	</div>
</div>

<?php get_footer();
