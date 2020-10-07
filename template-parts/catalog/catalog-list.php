<?php
$term = get_queried_object();
$artistName = $term->slug;

// START the main qurey args
$special_args = array(
    'post_type'         => 'catalog',
    'category_name'     => 'special-production, special',
    'posts_per_page'    => -1,
    'orderby'           => 'DSC',
    'tax_query' => array(
        'relation' => 'AND',
        array(
            'taxonomy' => 'main_talent',
            'field'    => 'slug',
            'terms'    => $artistName,
        ),
    ),
);
$album_args = array(
    'post_type'         => 'catalog',
    'category_name'     => 'album',
    'posts_per_page'    => -1,
    'order'             => 'DSC',
    'tax_query' => array(
        'relation' => 'AND',
        array(
            'taxonomy' => 'main_talent',
            'field'    => 'slug',
            'terms'    => $artistName,
        ),
    ),
);
?>


<?
    // The Production Specials Query
    // $query1 = new WP_Query($special_args);
    // echo '<div class="grid-x"><div class="cell"><h2>' . $term->name . ' Specials</h2></div></div>';
    // // echo '<div class="grid-x small-2 medium-4 large-6 align-center-middle" id="results">';
    // echo '<div class="grid-layout">';
    // // The Loop
    // while ( $query1->have_posts() ) {
    //     $query1->the_post();
    //     get_template_part( 'template-parts/catalog/catalog-thumb' );
            
    // }
    // echo '</div>';
    // wp_reset_postdata();
    ?>
<div class="grid-layout">
    <?php global $post; // required
    $custom_posts = get_posts($special_args);
    $count = 0;

    foreach ($custom_posts as $post) : setup_postdata($post);
        $count++;?>

        <div class="grid-item grid-item-<?php echo $count; if (in_category(array('production', 'album'))) { echo 'span-2'; } elseif(in_category( 'distributon')) {echo 'span-3'; } ?>">

            <div class="dark-container">

                <a href="<?php the_permalink(); ?>">

                    <div class="callout callout-hover-reveal" data-callout-hover-reveal>

                        <div class="callout-body">

                            <?php
                            $image = get_field('square_image');

                            if (!empty($image)) : ?>

                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />

                            <?php endif; ?>

                        </div>

                        <div class="callout-footer">

                            <p>

                                <?php $summary = get_field('synopsis', $post->ID);
                                echo $summary; ?>

                            </p>

                        </div>

                    </div>

                </a>

            </div>

        </div>
    <?php
    endforeach;
    ?>
</div>





<h2>Albums</h2>
<div class="grid-x small-2 medium-4 large-6 align-center-middle" id="results">

    <?php
    /* The Distribution Specials Query (without global var) */
    $query2 = new WP_Query($album_args);

    // The 2nd Loop
    while ($query2->have_posts()) {
        $query2->the_post();
        get_template_part('template-parts/catalog/catalog-thumb');
    }

    // Restore original Post Data
    wp_reset_postdata();
    ?>

</div>





<?php
// END the main qurey args
$query = new WP_Query($production_special_args);

if ($query->have_posts()) :

    while ($query->have_posts()) : $query->the_post();
?>
        <?php
        // foreach ((get_the_category()) as $category) {
        //     echo $category->cat_name . ' ';
        // } 
        ?>



<?php endwhile;

else :

endif;

wp_reset_postdata(); ?>

</div>


<div class="grid-x small-2 medium-4 large-6 align-center-middle" id="results">

    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

            <?php if (get_field('square_image', $term)) : ?>

                <div class="media-container cell medium-2 mb-4 mb-medium-5 mb-medium-4 mb-large-5 mb-xlarge-3">

                    <a href="<?php the_permalink(); ?>">

                        <div class="callout callout-hover-reveal" data-callout-hover-reveal>

                            <div class="callout-body">

                                <?php

                                $image = get_field('square_image');

                                if (!empty($image)) : ?>

                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

                                <?php endif; ?>

                            </div>

                            <div class="callout-footer">

                                <p>

                                    <?php $summary = get_field('synopsis', $post->ID);
                                    echo $summary; ?>

                                </p>

                            </div>

                        </div>

                    </a>

                </div>

            <?php endif; ?>

        <?php endwhile; ?>

    <?php else : ?>

        <div class="cell text-center">

            <h3>Sorry no results for " <?php echo esc_html(get_search_query(false)); ?> "</h3>

            <a class="button" data-toggle="searchSeriesOffCanvas"><?php _e('Try another search!', 'comedy-dynamics'); ?></a>

        </div>

    <?php endif; ?>

</div>