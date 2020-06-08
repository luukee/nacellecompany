<div class="main-container front-partners">
    <div class="grid-x">
        <div class="cell medium-4 large-4 tabs-container">
            <ul class="vertical tabs" data-tabs id="partners-tabs">
                <li class="tabs-title two" style="background-image: url('<?php bloginfo('template_directory'); ?>/dist/assets/images/thinOval.svg'">
                    <a class="partner-link" href="#panel2v">
                        <div class="partner">
                            <div class="region-top">
                                <h5 class="text-center">| <?php the_field('right_icon'); ?></h5>
                            </div>
                            <h3><?php the_field('right_title'); ?></h3>
                            <div class="region">
                                <h5 class="text-center">| <?php the_field('right_icon'); ?></h5>
                            </div>
                        </div>
                        <img class="placeholder-tab" src="<?php bloginfo('template_directory'); ?>/dist/assets/images/thinOval.svg" alt="">
                    </a>
                </li>
                <li class="tabs-title one is-active" style="background-image: url('<?php bloginfo('template_directory'); ?>/dist/assets/images/Oval.svg'">
                    <a class="partner-link" href="#panel1v" aria-selected="true">
                        <div class="partner">
                            <div class="region-top">
                                <h5 class="text-center">| <?php the_field('left_icon'); ?></h5>
                            </div>
                            <h3><?php the_field('left_title'); ?></h3>
                            <div class="region">
                                <h5 class="text-center">| <?php the_field('left_icon'); ?></h5>
                            </div>
                        </div>
                        <img class="placeholder-tab" src="<?php bloginfo('template_directory'); ?>/dist/assets/images/Oval.svg" alt="">
                    </a>
                </li>
            </ul>

        </div>
        <div class="cell medium-8 large-8">

            <div class="grid-x tabs-content" data-tabs-content="partners-tabs">

                <!-- domestic -->
                <div class="grid-y tabs-panel is-active " id="panel1v">

                    <div class="cell large-12 logo-outer-container">
                        <!-- domestic -->

                        <?php if (have_rows('logo_repeater')) : ?>

                            <div class="grid-x align-center logo-container">

                                <div class="cell medium-12 large-7">

                                    <div class="grid-x small-up-2 medium-up-3 large-up-4 align-center align-middle grid-padding-x">

                                        <?php while (have_rows('logo_repeater')) : the_row();

                                            // vars
                                            $image = get_sub_field('logo');
                                            $link = get_sub_field('logo_link');

                                            // $link_url = $link['url'];

                                            ?>

                                            <div class="cell text-center">

                                                <?php if ($link) : ?>
                                                    <a href="<?php echo $link['url']; ?>" target="_blank">
                                                    <?php endif; ?>

                                                    <img class="thumbnail" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />

                                                    <?php if ($link) : ?>
                                                    </a>
                                                <?php endif; ?>

                                            </div>

                                        <?php endwhile; ?>

                                    </div>

                                </div>

                            </div>

                        <?php endif; ?>

                    </div>

                </div>

                <!-- international -->
                <div class="grid-y tabs-panel" id="panel2v">

                    <div class="cell large-12 logo-outer-container">

                        <?php if (have_rows('logo_repeater02')) : ?>

                            <div class="grid-x logo-container align-center">

                                <div class="cell medium-12 large-7">

                                    <div class="grid-x small-up-2 medium-up-3 large-up-3 align-center align-middle pt-medium-3 pb-medium-1 grid-padding-x">

                                        <?php while (have_rows('logo_repeater02')) : the_row();

                                            // vars
                                            $image02 = get_sub_field('logo02');
                                            $link02 = get_sub_field('logo_link02');

                                            ?>

                                            <div class="cell text-center">

                                                <?php if ($link02) : ?>
                                                    <a href="<?php echo $link02['url']; ?>">
                                                    <?php endif; ?>

                                                    <img class="thumbnail" src="<?php echo $image02['url']; ?>" alt="<?php echo $image02['alt'] ?>" />

                                                    <?php if ($link02) : ?>
                                                    </a>
                                                <?php endif; ?>

                                            </div>

                                        <?php endwhile; ?>

                                    </div>

                                </div>

                            </div>

                        <?php endif; ?>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>