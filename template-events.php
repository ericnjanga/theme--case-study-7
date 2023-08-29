<?php
    /*
    Template Name: Events Template
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
            <h1 class="hero-title"><?php echo getField('optional_title'); ?></h1>
            <section class="breadcrumb">
                <?php displayBreadcrumbs(); ?>
            </section>
            <?php edit_post_link(); ?>
        </div>
    </div>
</header>

<main class="main-content-wrapper container" role="main">
    <div class="grid-11122 grid">
        <?php
            displayEvents();
        ?>
    </div>
</main>

<?php get_footer(); ?>