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

    <style>
        .parallax-container {
            position: relative;
            width: 100%;
            overflow: hidden;
        }

        .parallax-layer {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }
    </style>




    <!--
    

        data-0="background-position-y: 50%;"
        data-top="background-position-y: 35%;"

    -->


    <header class="hero large parallax-container">
        <div class="parallax-layer" style="<?php echo $hero_background_img; ?>;"></div>
        <div class="container">
            <div class="text-wrapper">
                <h1 class="hero-title"><?php echo getField('hero_title'); ?></h1>
                <?php edit_post_link(); ?>
                <p class="hero-intro"><?php echo getField('hero_subtitle'); ?></p>
                <footer class="hero-footer">
                    <a href="#section-services" class="btn btn-primary btn-icon btn-arrow-down">CTA Discover</a>
                </footer>
            </div>
        </div>
    </header>




<main class="main-content-wrapper" role="main">
    <div class="section-spacer">
        <?php
            displayUpcomingEventSection();
        ?>
    </div>

  
    <section class="section-brand-highlight section-spacer container">
        <?php echo getFieldImage('highlight_image', '', 'medium'); ?>

        <article>
            <h2>
                <?php
                    echo getField('highlight_title');
                ?>
            </h2>
            <p>
                <?php
                    echo getField('highlight_subtitle');
                ?>
            </p>

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
            <div class="lists">
                <?php
                    // List 1 ...
                    if (!empty($list_1_title)) {
                        ?>
                            <ul>
                                <h3><?php echo $list_1_title; ?></h3>
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
                        <?php
                    }
                ?>
                <?php
                    // List 2 ...
                    if (!empty($list_2_title)) {
                        ?>
                            <ul>
                                <h3><?php echo $list_2_title; ?></h3>
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
                        <?php
                    }
                ?>
            </div>

            <footer class="cta-block">
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
                            <a class="btn btn-primary" href="<?php echo $cta_2_link; ?>">
                                <?php echo $cta2; ?>
                            </a>
                        <?php
                    }
                ?>
            </footer>
        </article>
    </section>


    <section class="section-spacer container">
        <h2 class="h-underlined text-center">Lorem ipsum dolor sit amet consectetur.</h2>
        <div class="grid grid-11233">
            <?php
                fetchBrandFeatures();
            ?>
        </div>
    </section>


    <section class="section-spacer container">
        <h2 class="h-underlined text-center">Don’t take our word for it...</h2>
        <div>
            <?php displayTestimonial('grid grid-11233 testimonial-list', 3, true); ?>
        </div>
    </section>


    <section id="section-partners" class="container">
            <h2 class="section-title text-center">Partners</h2>
            <?php
                displayClientLogos();
            ?>
        </section>

</main>


<?php get_footer(); ?>