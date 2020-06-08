<?php

/**
 * The template used to display archive content
 * https://www.smashingmagazine.com/2015/04/building-custom-wordpress-archive-page/
 */
?>

<article class="productions">

    <header>

        <div class="grid-x grid-padding-x">

            <div class="cell medium-12 section-title">

                <h2><?php the_field("nacelle_catalog_title"); ?></h2>

            </div>

            <!-- <div class="cell auto sorting">

                <h4><?php // _e('Sort by', 'nacelle'); 
                    ?></h4>

                <?php // echo do_shortcode('[searchandfilter slug="production-filters"]'); 
                ?>

            </div> -->

        </div>

    </header><!-- .entry-header -->

    <div class="entry-content" id="entry-content">

        <div class="grid-x grid-padding-x grid-padding-y medium-up-2 macro-cat-cards">

            <?php
            $how_many_last_posts = intval(get_post_meta($post->ID, 'archived-posts-no', true));
            // Here, we're making sure that the number fetched is reasonable. In case it's higher than 200 or lower than 2, we're just resetting it to the default value of 4.
            if ($how_many_last_posts > 200 || $how_many_last_posts < 2) $how_many_last_posts = 4;

            $my_query = new WP_Query('post_type=catalog&nopaging=1');

            if ($my_query->have_posts()) {

                $counter = 1;

                while ($my_query->have_posts()) {
                    $my_query->the_post();

                    // // set variables
                    // get date
                    $date = get_field('release_date', false, false);
                    $synopsis = get_field('synopsis');
                    // make date object
                    $date = new DateTime($date);

                    $img_size_lg = 'fp-large';
                    $img_size_md = 'fp-medium';
                    $img_size_sm = 'fp-small';

                    $imageSquare = get_field('square_image');                        // Catalog Image
                    // $imageHorizontalYES = get_field('custom_square_image_yes');   // QUESTION Custom Image?
                    $imageHorizontal = get_field('horizontal_image');          // Custom Image

                    $imageSquareAlt = $imageSquare['alt']; /* Get image object alt */
                    $imageHorizontalAlt = $imageHorizontal['alt'];

                    /* Get custom sizes of our image sub_field */
                    $imageSquareLG = $imageSquare['sizes'][$img_size_lg];
                    $imageSquareMD = $imageSquare['sizes'][$img_size_md];
                    $imageSquareSM = $imageSquare['sizes'][$img_size_sm];

                    // custom featured image
                    $imageHorizontalLG = $imageHorizontal['sizes'][$img_size_lg];
                    $imageHorizontalMD = $imageHorizontal['sizes'][$img_size_md];
                    $imageHorizontalSM = $imageHorizontal['sizes'][$img_size_sm];

                    ?>

                    <div class="cell">

                        <div class="callout callout-hover-reveal" data-callout-hover-reveal>

                            <div class="callout-body">

                                <!-- IMAGE -->


                                <div class="img-container">


                                    <?php if ($imageHorizontal) : ?>

                                        <a href="<?php the_permalink() ?>" class="catalog-title" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">

                                            <img class="feat-pg horizontal" data-interchange="[<?php echo $imageHorizontalSM; ?>, default], [<?php echo $imageHorizontalSM; ?>, small], [<?php echo $imageHorizontalMD; ?>, medium], [<?php echo $imageHorizontalLG; ?>, large]" alt="<?php echo $imageHorizontalAlt; ?>" />
                                            <noscript>
                                                <img src="<?php echo $imageHorizontalSM; ?>" alt="<?php echo $imageHorizontalAlt; ?>" />
                                            </noscript>
                                        </a>

                                    <?php else : ?>

                                        <a href="<?php the_permalink() ?>" class="catalog-title" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">

                                            <img class="feat-pg" data-interchange="[<?php echo $imageSquareSM; ?>, small], [<?php echo $imageSquareMD; ?>, medium], [<?php echo $imageSquareLG; ?>, large]" alt="<?php echo $imageSquareAlt; ?>" />
                                            <noscript>
                                                <img src="<?php echo $imageSquareSM; ?>" alt="<?php echo $imageSquareAlt; ?>" />
                                            </noscript>
                                        </a>

                                    <?php endif; ?>

                                </div>



                            </div>

                            <div class="callout-footer">
                                <!-- DATE -->
                                <h4><?php echo $date->format('Y'); ?></h4>

                                <!-- TITLE -->
                                <a href="<?php the_permalink() ?>" class="catalog-title" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
                                    <h3><?php the_title(); ?></h3>
                                </a>
                                <div class="callout-content">
                                    <?php the_content(); ?>
                                </div>
                            </div>

                        </div>


                    </div>

            <?php $counter++;
                }
                wp_reset_postdata();
            } ?>

        </div>

    </div><!-- .entry-content -->

</article><!-- #post-## -->