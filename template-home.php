<?php
    /*
    Template Name: Home Template
    */ 
    get_header();
?>

<header class="hero" role="region">
    <div class="text-wrapper">
        <h1 class="hero-title"><?php echo getField('title'); ?></h1>
        <?php edit_post_link(); ?>
        <p class="hero-intro"><?php echo getField('introduction'); ?></p>
        <footer class="hero-footer">
            <a href="#section-services" class="btn btn-primary btn-icon btn-arrow-down">Our services</a>
        </footer>
    </div>
</header>

<?php
    displayBanner('section-spacer');
?>



<section id="section-partners" class="section-spacer">
    <?php
        displayClientLogos();
    ?>
</section>





<section id="section-events" class="section-spacer">
    <?php
        displayEvents(3);
    ?>
</section>




<main class="main-content-wrapper" role="main">

    <section id="section-services" class="section-spacer">
        <h2 class="h-underlined">Services we provide</h2>
        <div id="services">
            <?php
                displayServicesExcerpts('grid grid-11233');
            ?>
        </div>
    </section>

    <section class="section-spacer">
        <h2 class="h-underlined">Testimonials</h2>
        <div>
            <?php displayTestimonial('grid grid-11233 testimonial-list', 2, true); ?>
        </div>
    </section>

    <section class="section-spacer">
        <h2 class="h-underlined">News and resources</h2>
        <div>
            <?php latestPosts('grid grid-11233 posts-list', '', 2, true); ?>
        </div>
    </section>
</main>


<?php get_footer(); ?>