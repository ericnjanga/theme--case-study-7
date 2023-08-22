<?php
    /*
    Template Name: About > Testimonials
    */ 
    get_header();
?>

<header class="hero">
    <div class="container">
        <div class="text-wrapper">
            <h1 class="hero-title"><?php echo getField('optional_title'); ?></h1>
            <section class="breadcrumb">
                <?php displayBreadcrumbs(); ?>
            </section>
            <?php edit_post_link(); ?>
        </div>
    </div>
</header>

<main class="main-content-wrapper container" role="main">

    <header>
        <h2>
            <?php echo getField('optional_subtitle'); ?>
        </h2>
    </header>  

    <?php displayTestimonial('grid grid-11233 pt-5 pb-5'); ?>
</main>

<?php get_footer(); ?>