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

    <div class="entry-content mb-4">

        <div class="pb-4">

            <?php the_field('instagram_feed'); ?>

            <?php edit_post_link(__('(Edit)', 'nacelle'), '<span class="edit-link">', '</span>'); ?>

        </div>
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
        <?php $tag = get_the_tags();
        if ($tag) {
            ?><p><?php the_tags(); ?></p><?php
                                        } ?>
    </footer>
</article>