<?php $prod_args = array(
  'post_type' => 'catalog',
  'posts_per_page' => '30',
  'order' => 'DESC',
  'orderby' => 'date',
  'tax_query' => array(
    'relation' => 'AND',
    array(
      'taxonomy' => 'category',
      'terms' => array(
        'production',
        ' distribution'
      ),
      'field' => 'slug'
    ),
    array(
      'taxonomy' => 'category',
      'terms' => 'podcast',
      'field' => 'slug',
      'operator' => 'NOT IN',
    ),
  ),
); ?>
<div class="grid-x" id="more">
  <div class="cell medium-4 large-4 xlarge-3" data-sticky-container>
    <div class="sticky pt-large-2" data-sticky data-margin-top="0" data-top-anchor="header:bottom">
      <ul data-responsive-accordion-tabs="tabs" class="vertical tabs-products tabs" id="product-tabs">
        <li class="cell is-active tabs-title" aria-selected="true">
          <a href="#productions" aria-selected="true">
            <h3>
              <?php the_field("left_title"); ?>
            </h3>
          </a>
        </li>
        <li class="cell tabs-title">
          <a href="#podcasts">
            <h3>
              <?php the_field("right_title"); ?>
            </h3>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="cell medium-8 large-8 xlarge-9">
    <div class="tabs-content vertical" data-tabs-content="product-tabs">
      <div class="tabs-panel is-active small-order-2 medium-order-1 productions" id="productions">
        <div class="grid-x grid-margin-x medium-up-1 large-up-2 xlarge-up-3 macro-cat-cards">
          <?php $production_query = new WP_Query($prod_args);
          if ($production_query->have_posts()) {
            while ($production_query->have_posts()) {
              $production_query->the_post();
              $date = get_field('release_date', false, false);
              $synopsis = get_field('synopsis');
              $date = new DateTime($date);
              $taxonomy = 'category';
              $post_terms = wp_get_object_terms($post->ID, $taxonomy, array(
                'fields' => 'ids'
              ));
              $separator = '/ ';
              if (!empty($post_terms) && !is_wp_error($post_terms)) {
                $term_ids = implode(',', $post_terms);
                $terms = wp_list_categories(array(
                  'title_li' => '',
                  'style' => 'none',
                  'echo' => false,
                  'taxonomy' => $taxonomy,
                  'include' => $term_ids
                ));
                $terms = rtrim(trim(str_replace('<br />', $separator, $terms)), $separator);
              }
              $img_size_lg = 'fp-large';
              $img_size_md = 'fp-medium';
              $img_size_sm = 'fp-small';
              $imageSquare = get_field('square_image');
              $imageHorizontal = get_field('horizontal_image');
              $imageSquareAlt = $imageSquare['alt'];
              $imageHorizontalAlt = $imageHorizontal['alt'];
              $imageSquareLG = $imageSquare['sizes'][$img_size_lg];
              $imageSquareMD = $imageSquare['sizes'][$img_size_md];
              $imageSquareSM = $imageSquare['sizes'][$img_size_sm];
              $imageHorizontalLG = $imageHorizontal['sizes'][$img_size_lg];
              $imageHorizontalMD = $imageHorizontal['sizes'][$img_size_md];
              $imageHorizontalSM = $imageHorizontal['sizes'][$img_size_sm]; ?>
              <div class="cell">
                <div class="callout" data-callout-hover-reveal>
                  <div class="callout-body">
                    <div class="img-container">
                      <?php if ($imageHorizontal) : ?>
                        <a href="<?php the_permalink() ?>" class="catalog-title" rel="bookmark" title="Permanent Link to<?php the_title_attribute(); ?>">
                          <img alt="<?php echo $imageHorizontalAlt; ?>" class="feat-pg horizontal" data-interchange="[<?php echo $imageHorizontalSM; ?>, default], [<?php echo $imageHorizontalSM; ?>, small], [<?php echo $imageHorizontalMD; ?>, medium], [<?php echo $imageHorizontalLG; ?>, large]">
                          <noscript>
                            <img alt="<?php echo $imageHorizontalAlt; ?>" src="<?php echo $imageHorizontalSM; ?>">
                          </noscript>
                        </a>
                      <?php else : ?>
                        <a href="<?php the_permalink() ?>" class="catalog-title" rel="bookmark" title="Permanent Link to<?php the_title_attribute(); ?>">
                          <img alt="<?php echo $imageSquareAlt; ?>" class="feat-pg" data-interchange="[<?php echo $imageSquareSM; ?>, small], [<?php echo $imageSquareMD; ?>, medium], [<?php echo $imageSquareLG; ?>, large]">
                          <noscript>
                            <img alt="<?php echo $imageSquareAlt; ?>" src="<?php echo $imageSquareSM; ?>">
                          </noscript>
                        </a>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="callout-footer">
                    <div class="callout-content">
                      <div class="flex-container align-justify">
                        <h5>
                          <?php echo $date->format('Y'); ?>
                        </h5>
                        <div class="text-right bk-txt-color">
                          <?php echo $terms; ?>
                        </div>
                      </div>
                      <a href="<?php the_permalink() ?>" class="catalog-title" rel="bookmark" title="Permanent Link to<?php the_title_attribute(); ?>">
                        <h4 class="h5">
                          <?php the_title(); ?>
                        </h4>
                      </a>
                      <div class="callout-synopsis">
                        <?php if (get_the_content()) {
                          the_content();
                        } else {
                          echo $synopsis;
                        } ?></div>
                    </div>
                  </div>
                </div>
              </div>
          <?php
            }
          } else {
          }
          wp_reset_postdata(); ?>
        </div>
      </div>
      <div class="tabs-panel small-order-1 medium-order-2 podcasts" id="podcasts">
        <div class="grid-x grid-margin-x medium-up-1 large-up-2 xlarge-up-3 macro-cat-cards">
          <?php
          $podcast_query = new WP_Query(array(
            'post_type' => 'catalog',
            'posts_per_page' => '30',
            'tax_query' => array(
              array(
                'taxonomy' => 'category',
                'terms' => 'podcast',
                'field' => 'slug'
              ),
            ),
          ));
          if ($podcast_query->have_posts()) {
            while ($podcast_query->have_posts()) {
              $podcast_query->the_post();
              $date = get_field('release_date', false, false);
              $synopsis = get_field('synopsis');
              $date = new DateTime($date);
              $taxonomy = 'category';
              $post_terms = wp_get_object_terms($post->ID, $taxonomy, array(
                'fields' => 'ids'
              ));
              $separator = '/ ';
              if (!empty($post_terms) && !is_wp_error($post_terms)) {
                $term_ids = implode(',', $post_terms);
                $terms = wp_list_categories(array(
                  'title_li' => '',
                  'style' => 'none',
                  'echo' => false,
                  'taxonomy' => $taxonomy,
                  'include' => $term_ids
                ));
                $terms = rtrim(trim(str_replace('<br />', $separator, $terms)), $separator);
              }
              $img_size_lg = 'fp-large';
              $img_size_md = 'fp-medium';
              $img_size_sm = 'fp-small';
              $imageSquare = get_field('square_image');
              $imageHorizontal = get_field('horizontal_image');
              $imageSquareAlt = $imageSquare['alt'];
              $imageHorizontalAlt = $imageHorizontal['alt'];
              $imageSquareLG = $imageSquare['sizes'][$img_size_lg];
              $imageSquareMD = $imageSquare['sizes'][$img_size_md];
              $imageSquareSM = $imageSquare['sizes'][$img_size_sm];
              $imageHorizontalLG = $imageHorizontal['sizes'][$img_size_lg];
              $imageHorizontalMD = $imageHorizontal['sizes'][$img_size_md];
              $imageHorizontalSM = $imageHorizontal['sizes'][$img_size_sm]; ?>
              <div class="cell">
                <div class="callout" data-callout-hover-reveal>
                  <div class="callout-body">
                    <div class="img-container">
                      <?php if ($imageHorizontal) : ?>
                        <a href="<?php the_permalink() ?>" class="catalog-title" rel="bookmark" title="Permanent Link to<?php the_title_attribute(); ?>">
                          <img alt="<?php echo $imageHorizontalAlt; ?>" class="feat-pg horizontal" data-interchange="[<?php echo $imageHorizontalSM; ?>, default], [<?php echo $imageHorizontalSM; ?>, small], [<?php echo $imageHorizontalMD; ?>, medium], [<?php echo $imageHorizontalLG; ?>, large]">
                          <noscript>
                            <img alt="<?php echo $imageHorizontalAlt; ?>" src="<?php echo $imageHorizontalSM; ?>">
                          </noscript>
                        </a>
                      <?php else : ?>
                        <a href="<?php the_permalink() ?>" class="catalog-title" rel="bookmark" title="Permanent Link to<?php the_title_attribute(); ?>">
                          <img alt="<?php echo $imageSquareAlt; ?>" class="feat-pg" data-interchange="[<?php echo $imageSquareSM; ?>, small], [<?php echo $imageSquareMD; ?>, medium], [<?php echo $imageSquareLG; ?>, large]"><noscript>
                            <img alt="<?php echo $imageSquareAlt; ?>" src="<?php echo $imageSquareSM; ?>">
                          </noscript>
                        </a>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="callout-footer">
                    <div class="callout-content">
                      <div class="flex-container align-justify">
                        <h5>
                          <?php echo $date->format('Y'); ?>
                        </h5>
                        <div class="text-right bk-txt-color">
                          <?php echo $terms; ?>
                        </div>
                      </div>
                      <a href="<?php the_permalink() ?>" class="catalog-title" rel="bookmark" title="Permanent Link to<?php the_title_attribute(); ?>">
                        <h4>
                          <?php the_title(); ?>
                        </h4>
                      </a>
                      <div class="callout-synopsis">
                        <?php if (get_the_content()) {
                          the_content();
                        } else {
                          echo $synopsis;
                        } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          <?php }
            wp_reset_postdata();
          } ?>
        </div>
      </div>
    </div>
  </div>
</div>