<?php
$post_objects = get_field('press_posts');

if ($post_objects) : ?>

    <?php foreach ($post_objects as $post_object) : ?>

        <li class="orbit-slide orbit-group">
            <div class="grid-x circle-orbit-slider-container">

                <div class="small-11 medium-4 large-4 press-title-container columns">

                    <?php

                            $link = get_field('link_to_article', $post_object->ID);

                            if ($link) :
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
        
                                ?>

                    <?php endif; ?>

                    <div class="press-title-inner-container">
                        <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?>
                        <br><br>    
                        <?php echo get_field('title', $post_object->ID); ?>
                                <br>
                            <span class="press-category">| 
                                <?php 
                                    $categories = get_the_category($post_object->ID);

                                    if (!empty($categories)) {
                                        echo esc_html($categories[0]->name);
                                    }
                                ?>
                            </span>
                        </a>
                    </div>
                </div>


                <div class="small-12 medium-4 large-4 orbit-image-container columns">
                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?>
                        <img class="orbit-image" data-interchange="[<?php echo get_the_post_thumbnail_url($post_object->ID, 'fp-small'); ?>, small], [<?php echo get_the_post_thumbnail_url($post_object->ID, 'fp-medium'); ?>, medium], [<?php echo get_the_post_thumbnail_url($post_object->ID, 'fp-large'); ?>, large], [<?php echo get_the_post_thumbnail_url($post_object->ID, 'fp-xlarge'); ?>, xlarge]" />
                    </a>
                </div>

                <div class="small-12 medium-4 large-4 next-image-container columns">
                </div>

            </div>
        </li>

    <?php endforeach; ?>

<?php endif; ?>

<div class="orbit-controls orbit-group">
    <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
    <button class="orbit-next"><span class="show-for-sr">Next Slide</span> <span class="orbit-next-arrow">&#9654;&#xFE0E;</span></button>
</div>