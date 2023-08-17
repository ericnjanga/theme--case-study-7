<?php
    /*
    Template Name: About > Testimonials
    */ 
    get_header();
?>

<header class="hero">
    <div class="text-wrapper">
        <h1 class="hero-title"><?php echo getField('optional_title'); ?></h1>
        <?php edit_post_link(); ?>
    </div>
</header>

<main class="main-content-wrapper" role="main">
    <section class="breadcrumb">
        <?php displayBreadcrumbs(); ?>
    </section>


    <?php displayTestimonial('grid grid-11222 pt-5 pb-5'); ?>
</main>

<?php get_footer(); ?>