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
        ...
    </div>

  

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


    <?php
        displayCtaBigBlock();
    ?>

</main>


<?php get_footer(); ?>

