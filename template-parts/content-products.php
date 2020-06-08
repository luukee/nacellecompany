<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package Nacelle
 * @since Nacelle 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
	<?php
        if (is_single()) {
            the_title('<h1 class="entry-title">', '</h1>');
        } else {
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        }
    ?>
		<?php Nacelle_entry_meta(); ?>
	</header>
	<div class="entry-content">

        <div class="grid-x">
            <div class="cell medium-12 nacelle-products">
                <div class="embed-container" data-open="productsModal">
                    <?php the_field('featured_video'); ?>
                    <div class="overlay">
                        <h1><?php the_field('featured_video_title'); ?></h1>
                    </div>
                </div>
				<?php get_template_part( 'template-parts/content-catalog_archives', 'page' ); ?>
            </div>

            <!-- get CD column back: uncomment below & add "large-8" to "nacelle-products" above -->
            <!-- <div class="cell medium-12 large-4 comedy-dynamics">
                <iframe id="comedy-dynamics"
                    title="Comedy Dynamics"
                    frameborder="0"
                    src="<?php //the_field('comedy_dynamics'); ?>?controls=0">
                </iframe>
            </div> -->
            
        </div>

		<?php the_content(); ?>

		<?php edit_post_link(__('(Edit)', 'nacelle'), '<span class="edit-link">', '</span>');?>
	</div>
	<footer>
		<?php
            wp_link_pages(
                array(
                    'before' => '<nav id="page-nav"><p>' . __('Pages:', 'nacelle'),
                    'after'  => '</p></nav>',
                )
            );
        ?>
		<?php $tag = get_the_tags(); if ($tag) {
            ?><p><?php the_tags(); ?></p><?php
        } ?>
	</footer>
</article>
