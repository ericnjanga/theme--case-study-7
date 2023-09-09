<?php
    /*
    Template Name: Home Template
    */ 
    get_header();
?>
    <?php
        // Fetching hero's background image.
        $hero_background_img = getHeroBgImage();
    ?>

    <!--
        Prallax features
        data-0="background-position-y: 50%;"
        data-top="background-position-y: 35%;"
    -->
    <header class="hero large bottom-section-spacer" role="region" style="<?php echo $hero_background_img; ?>;">
        <!-- <div class="parallax-layer" style="<?php echo $hero_background_img; ?>;"></div> -->
        <div class="container">
            <div class="text-wrapper">
                <h1 class="hero-title"><?php echo getField('optional_title'); ?></h1>
                <?php edit_post_link(); ?>
                <p class="hero-intro"><?php echo getField('optional_subtitle'); ?></p>
                <footer class="hero-footer">
                    <a href="#section-what-we-do" class="btn btn-primary btn-icon btn-arrow-down">Discover what we do</a>
                </footer>
            </div>
        </div>
    </header>




<main class="main-content-wrapper" role="main">
    <div class="bottom-section-spacer">
        <?php
            displayUpcomingEventSection();
        ?>
    </div>

  
    <section class="slogan1 bottom-section-spacer container">
        <?php
            // List 1 ...
            $list_1_title = getField('list_1_title');
            $list_1_text1 = getField('list_1_text1');
            $list_1_text2 = getField('list_1_text2');
            $list_1_text3 = getField('list_1_text3');
            $list_1_text4 = getField('list_1_text4');

            // List 2 ...
            $list_2_title = getField('list_2_title');
            $list_2_text1 = getField('list_2_text1');
            $list_2_text2 = getField('list_2_text2');
            $list_2_text3 = getField('list_2_text3');
            $list_2_text4 = getField('list_2_text4');

            // CTA 1 ...
            $cta1 = getField('cta_1');
            $cta_1_link = getField('cta_1_link');

            // CTA 2 ...
            $cta2 = getField('cta_2');
            $cta_2_link = getField('cta_2_link');
        ?>

        <div class="slogan1__img-frame">
            <div class="slogan1__img-frame-wrapper">
                <?php
                    $slogan_imp1 = getImage_byName('slogan imp 1', 'slogan-img1 img-fluid');
                    $slogan_imp2 = getImage_byName('slogan imp 2', 'slogan-img2 img-fluid');
                    $slogan_imp3 = getImage_byName('slogan imp 3', 'slogan-img3 img-fluid');
                    $slogan_imp4 = getImage_byName('slogan imp 4', 'slogan-img4 img-fluid');
                
                    // slogan imp 1
                    echo $slogan_imp1;
                    echo $slogan_imp2;
                    echo $slogan_imp3;
                    echo $slogan_imp4;
                ?>
            </div>
        </div>

        <article class="slogan1__content">
            <h2 class="slogan1__content-title">
                <?php
                    echo getField('highlight_title');
                ?>
            </h2>
            <p>
                <?php
                    echo getField('highlight_subtitle');
                ?>
            </p>

            <div class="slogan1__content-lists">
                <?php
                    // List 1 ...
                    if (!empty($list_1_title)) {
                        ?>
                            <div>
                                <h4><?php echo $list_1_title; ?></h4>
                                <ul class="list-chevron-right">
                                    <?php if (!empty($list_1_text1)) { ?>
                                        <li><?php echo $list_1_text1; ?></li>
                                    <?php } ?>
                                    <?php if (!empty($list_1_text2)) { ?>
                                        <li><?php echo $list_1_text2; ?></li>
                                    <?php } ?>
                                    <?php if (!empty($list_1_text3)) { ?>
                                        <li><?php echo $list_1_text3; ?></li>
                                    <?php } ?>
                                    <?php if (!empty($list_1_text4)) { ?>
                                        <li><?php echo $list_1_text4; ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php
                    }
                ?>
                <?php
                    // List 2 ...
                    if (!empty($list_2_title)) {
                        ?>
                            <div>
                                <h4><?php echo $list_2_title; ?></h4>
                                <ul class="list-chevron-right">
                                    <?php if (!empty($list_2_text1)) { ?>
                                        <li><?php echo $list_2_text1; ?></li>
                                    <?php } ?>
                                    <?php if (!empty($list_2_text2)) { ?>
                                        <li><?php echo $list_2_text2; ?></li>
                                    <?php } ?>
                                    <?php if (!empty($list_2_text3)) { ?>
                                        <li><?php echo $list_2_text3; ?></li>
                                    <?php } ?>
                                    <?php if (!empty($list_2_text4)) { ?>
                                        <li><?php echo $list_2_text4; ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php
                    }
                ?>
            </div>
        </article>

        <footer class="slogan1__cta-block">
            <?php
                if (!empty($cta1)) {
                    ?>
                        <a class="btn btn-secondary" href="<?php echo $cta_1_link; ?>">
                            <?php echo $cta1; ?>
                        </a>
                    <?php
                }

                if (!empty($cta2)) {
                    ?>
                        <a class="btn btn-primary triggers-subscriber-popup" href="<?php echo $cta_2_link; ?>">
                            <?php echo $cta2; ?>
                        </a>
                    <?php
                }
            ?>
        </footer>
    </section>


    <section class="section-what-we-do bottom-section-spacer container">
        <span id="section-what-we-do"></span>
        <h2 class="section-title title-spacer text-center">What we do best</h2>
        <div class="grid grid-11233">
            <?php
                fetchBrandFeatures();
            ?>
        </div>
    </section>


    <section class="bottom-section-spacer container">
        <h2 class="section-title title-spacer text-center">Don’t take our word for it...</h2>
        <div>
            <?php displayTestimonial('grid grid-11233 testimonial-list', 3, true); ?>
        </div>
    </section>


    <section id="section-partners" class="section-partners container bottom-section-spacer">
        <h2 class="section-title title-spacer text-center">As featured in ...</h2>
        <?php
            displayClientLogos();
        ?>
    </section>


    <section class="section-cta-big-block container">
        <div class="section-cta-big__content-wrapper">
            <div class="section-cta-big__text-wrapper">
                <h2 class="section-cta-big-block__title">Welcome to your tribe</h2>
                <p class="section-cta-big-block__text">
                Join our community of ambitious women building lasting wealth through strategic real estate investing.
                </p>
                <ul class="section-cta-big-block__list list-material-icons">
                    <li class="star">Access to our trusted partners</li>
                    <li class="star">Access to our trusted partners</li>
                    <li class="star">Access to our trusted partners</li>
                </ul>
                <footer class="section-cta-big-block__footer">
                    <button class="btn btn-primary triggers-subscriber-popup pum-trigger">Reserve your spot</button>
                </footer>
            </div>
        </div>
    </section>

</main>


<?php get_footer(); ?>

