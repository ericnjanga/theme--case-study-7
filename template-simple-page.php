<?php
    /*
    Template Name: Simple Page
    */ 
    get_header();
?>

<header class="hero">
    <div class="container">
        <div class="text-wrapper">
            <h1 class="hero-title"><?php the_title(); ?></h1>
            <section class="breadcrumb">
                <?php displayBreadcrumbs(); ?>
            </section>
            <?php edit_post_link(); ?>
        </div>
    </div>
</header>

<main class="main-content-wrapper container" role="main"> 
    <div>
        <h2><?php echo getField('optional_subtitle'); ?></h2>
        <?php the_content(); ?>
    </div>

    <?php get_sidebar('sidebar-contact'); ?>
</main>




<?php get_footer(); ?>