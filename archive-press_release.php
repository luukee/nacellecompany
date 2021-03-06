<?php

/**
 * The template for displaying press_release archive pages
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

<header class="primary featured-hero">
    <div class="grid-x">
        <div class="cell">
            <h1 class="text-center">Press Releases</h1>
        </div>
    </div>
</header>

<main class="main-container">

    <div class="main-grid">

        <div class="main-content">

            <?php if (have_posts()) : ?>

                <?php //Start the Loop 
                ?>
                <?php while (have_posts()) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" class="cell pt-3">

                        <div class="grid-x feed-container">

                            <?php // If a featured image is set, insert into layout and use Interchange
                            // to select the optimal image size per named media query. 
                            ?>
                            <?php if (has_post_thumbnail($post->ID)) : ?>

                                <div class="cell medium-12 archive-title">

                                    <!-- <div > -->

                                    <?php echo '<a href="' . get_permalink() . '" class="media-object stack-for-small">'; ?>
                                    <div class="media-object-section flex-container align-top">
                                        <img class="mic" src="<?php bloginfo('template_directory'); ?>/dist/assets/images/comedy-dynamics-mic.png" alt="stand up comedy microphone" />
                                        <h4>
                                            <?php
                                            $theTitle = get_field('title', false, false);
                                            echo $theTitle; ?>
                                        </h4>
                                    </div>
                                    <div class="media-object-section">
                                        <div class="thumbnail">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail('thumbnail', array('align' => 'left')); ?>
                                            <?php endif; ?>
                                        </div>

                                    </div>
                                    <?php echo '</a>'; ?>
                                    <!-- </div> -->

                                    <?php // date and read more 
                                    ?>
                                    <footer class="grid-x">

                                        <?php // admin edit link 
                                        ?>
                                        <div class="cell small-2 medium-1">

                                            <?php edit_post_link(__('(Edit)', 'nacelle'), '<span class="edit-link">', '</span>'); ?>
                                            <?php $tag = get_the_tags();
                                            if ($tag) {
                                            ?>
                                                <p><?php the_tags(); ?></p>
                                            <?php
                                            } ?>

                                        </div>

                                        <?php // date and read more 
                                        ?>
                                        <div class="cell small-10 medium-11">

                                            <div class="grid-x small-up-2">

                                                <div class="cell">
                                                    <p><?php the_time('m.j.y'); ?></p>
                                                </div>
                                                <div class="cell text-right">
                                                    <a class="clear button success medium" href="<?php echo get_permalink(); ?>">More on this article. . .</a>
                                                </div>

                                            </div>

                                        </div>

                                    </footer>

                                </div>

                            <?php else : ?>

                                <?php //  
                                ?>
                                <?php //  
                                ?>
                                <?php // old title 
                                ?>
                                <?php //  
                                ?>
                                <?php //  
                                ?>

                                <div class="cell medium-12 archive-title">

                                    <div class="grid-x">

                                        <?php // microphone 
                                        ?>
                                        <div class="cell small-2 medium-1">
                                            <img class="mic" src="<?php bloginfo('template_directory'); ?>/dist/assets/images/comedy-dynamics-mic.png" alt="comedy microphone" />
                                        </div>

                                        <?php // article title 
                                        ?>
                                        <div class="cell small-10 medium-11">
                                            <?php // oldschool title
                                            if (is_single()) {
                                                the_title('<h3 class="entry-title">', '</h3>');
                                            } else {
                                                the_title('<h4 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h4>');
                                            }
                                            ?>
                                        </div>

                                    </div>

                                    <footer class="grid-x">

                                        <?php // admin edit link 
                                        ?>
                                        <div class="cell small-2 medium-1">

                                            <?php edit_post_link(__('(Edit)', 'nacelle'), '<span class="edit-link">', '</span>'); ?>
                                            <?php $tag = get_the_tags();
                                            if ($tag) {
                                            ?>
                                                <p><?php the_tags(); ?></p>
                                            <?php
                                            } ?>

                                        </div>

                                        <?php // date and read more 
                                        ?>
                                        <div class="cell small-10 medium-11">

                                            <div class="grid-x small-up-2">

                                                <div class="cell">
                                                    <p><?php the_time('m.j.y'); ?></p>
                                                </div>
                                                <div class="cell text-right">
                                                    <a class="clear button success medium" href="<?php echo get_permalink(); ?>">More on this article. . .</a>
                                                </div>

                                            </div>

                                        </div>

                                    </footer>

                                </div>

                            <?php endif; ?>

                        </div>
                    </article>

                <?php endwhile; ?>

            <?php else : ?>
                <?php get_template_part('template-parts/content', 'none'); ?>

            <?php endif; // End have_posts() check.
            ?>

        </div>
        <?php wp_reset_query(); ?>
        <?php get_sidebar(); ?>

    </div>
</main>

<?php get_footer();
