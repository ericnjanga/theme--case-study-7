<?php
    /*
    Template Name: Simple Page
    */ 
    get_header();
?>

<?php
    // HERO -----
    // Fetching hero's background image.
    $hero_background_img = getHeroBgImage();
?>
<header class="hero" role="region" style="<?php echo $hero_background_img; ?>;">
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
    <div class="sidebar-opposite-content">
        <h2 class="page-title"><?php echo getField('optional_subtitle'); ?></h2>
        <div class="page-content">
        <?php the_content(); ?>
        </div>
    </div>

    <?php get_sidebar('sidebar-contact'); ?>
</main>




<?php get_footer(); ?>