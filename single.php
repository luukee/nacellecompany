<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>
<?php
if (get_post_type() == 'news') {
    echo '<meta name="robots" content="noindex, nofollow">';
} else {
}
?>
<?php get_template_part('template-parts/featured-image'); ?>
<main class="main-container">
	<div class="main-grid">
		<div class="main-content">
			<?php while (have_posts()) : the_post(); ?>
				<?php get_template_part('template-parts/content', ''); ?>
				<?php the_post_navigation(); ?>
				<?php comments_template(); ?>
			<?php endwhile; ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</main>
<?php get_footer();
