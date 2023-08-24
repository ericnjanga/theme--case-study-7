<?php
    /*
    Template Name: Simple Page
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

<main class="main-content-wrapper" role="main"> 

</main>




<?php get_footer(); ?>