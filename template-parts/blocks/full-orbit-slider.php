<?php

$sliderSpeed = get_field('slider_speed');


?>
<?php //get_template_part('template-parts/content/content-instagram'); 
?>

<div class="orbit orbit-slider full" role="region" aria-label="Favorite Space Pictures" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out; timerDelay: <?php echo $sliderSpeed; ?>000">

    <div class="orbit-wrapper">
        <div class="orbit-controls">
            <button class="orbit-previous">
                <span class="show-for-sr">Previous Slide</span>
                <?php get_template_part('template-parts/svg/icon-chevronLeft'); ?>
            </button>
            <button class="orbit-next">
                <span class="show-for-sr">Next Slide</span>
                <?php get_template_part('template-parts/svg/icon-chevronRight'); ?>
            </button>
        </div>

        <ul class="orbit-container">

            <?php

            /*
            *  Loop through post objects (assuming this is a multi-select field) ( setup postdata )
            *  Using this method, you can use all the normal WP functions as the $post object is temporarily initialized within the loop
            *  Read more: http://codex.wordpress.org/Template_Tags/get_posts#Reset_after_Postlists_with_offset
            */

            $post_objects = get_field('home_feat_posts');

            if ($post_objects) : ?>
                <?php foreach ($post_objects as $post) : // variable must be called $post (IMPORTANT) 
                ?>
                    <?php setup_postdata($post); ?>

                    <li class="orbit-slide">
                        <figure class="orbit-figure">
                            <?php

                            $homeLinkChange = get_field('home_link_change');
                            $featWidth = get_field('feat_width');


                            // trunkate the synopsis or content
                            $synopsis = get_field('synopsis');
                            $content = get_the_content();

                            $synopsis = wp_strip_all_tags($synopsis);
                            $content = wp_strip_all_tags($content);

                            $synopsis = substr($synopsis, 0, 200);
                            $content = substr($content, 0, 200);

                            $synopsisResult = substr($synopsis, 0, strrpos($synopsis, ' '));
                            $contentResult = substr($content, 0, strrpos($content, ' '));

                            $img_size_lg = 'fp-large';
                            $img_size_md = 'fp-medium';
                            $img_size_sm = 'fp-small';

                            // $image = get_field('home_image');
                            $imageHorizontal = get_field('horizontal_image');
                            $imageSquare = get_field('square_image');
                            
                            if ($imageHorizontal) {
                                $image = get_field('horizontal_image');
                                $hero_image_alt = $imageHorizontal['alt']; /* Get image object alt */
                            } elseif ($imageSquare) {
                                $image = get_field('square_image');
                                $hero_image_alt = $imageSquare['alt']; /* Get image object alt */
                            } else {
                            }

                            /* Get custom sizes of our image sub_field */
                            $hero_lg = $image['sizes'][$img_size_lg];
                            $hero_md = $image['sizes'][$img_size_md];
                            $hero_sm = $image['sizes'][$img_size_sm];
                            ?>

                            <?php // large background image 
                            ?>
                            <img class="orbit-image" data-interchange="[<?php echo $hero_lg; ?>, default], [<?php echo $hero_sm; ?>, small], [<?php echo $hero_md; ?>, medium], [<?php echo $hero_lg; ?>, large]" alt="<?php echo $hero_image_alt; ?>" />
                            <noscript><img src="<?php echo $hero_lg; ?>" alt="<?php echo $hero_image_alt; ?>" /></noscript>

                            <div class="orbit-cover"></div>

                            <figcaption class="orbit-caption grid-x align-bottom">

                                <div class="cell medium-6">

                                    <a href="<?php if ($homeLinkChange) { echo $homeLinkChange; } else the_permalink(); ?>">

                                        <img class="orbit-sm-image" style="max-width:<?php echo $featWidth; ?>%;" data-interchange="[<?php echo $hero_sm; ?>, default], [<?php echo $hero_sm; ?>, small], [<?php echo $hero_md; ?>, medium], [<?php echo $hero_lg; ?>, large]" alt="<?php echo $hero_image_alt; ?>" />
                                        <noscript>
                                            <img src="<?php echo $hero_sm; ?>" alt="<?php echo $hero_image_alt; ?>" />
                                        </noscript>

                                    </a>

                                    <a href="<?php the_permalink(); ?>">
                                        <h3><?php echo get_the_title(); ?></h3>
                                    </a>

                                    <?php if (!empty($synopsis)) : ?>
                                        <?php echo '<p>' . $synopsisResult . '. . .</p>'; ?>
                                    <?php elseif (get_the_excerpt()) : ?>
                                        <?php the_excerpt(); ?>
                                    <?php else : ?>
                                        <?php the_content(); ?>
                                    <?php endif; ?>

                                </div>

                            </figcaption>
                        </figure>
                    </li>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 
                ?>
            <?php endif; ?>
        </ul>
    </div>

</div>

<?php if (get_field('show_instagram_sidebar')) : ?>
    <div class="instagram-tab">
        <a class="instagram-title" href="<?php the_field('instagram_handle'); ?>" target="_blank">
            <svg aria-hidden="true" data-prefix="fab" data-icon="instagram" class="svg-inline--fa fa-instagram fa-w-14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="#fff" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6a74.8 74.8 0 1 1 .1-149.3 74.8 74.8 0 0 1-.1 149.3zm146.4-194.3a26.7 26.7 0 1 1-53.6 0 26.8 26.8 0 0 1 53.6 0zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388a75.6 75.6 0 0 1-42.6 42.6c-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9A75.6 75.6 0 0 1 49.4 388c-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1A75.6 75.6 0 0 1 92 81.2c29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9a75.6 75.6 0 0 1 42.6 42.6c11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
            </svg>
            <h3><?php echo get_bloginfo('name'); ?></h3>
        </a>
        <?php the_field('instagram_feed'); ?>
    </div>
<?php endif; ?>