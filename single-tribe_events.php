<?php
    /**
     * "Tribe Events plugin has been modified under "Template_Bootstrap.php" file to use this file
     * each time a single event is being navigated on.
     */
    get_header();
?>
    
<?php
// HERO -----
// Fetching hero's background image.
    $hero_background_img = getHeroBgImage();
?>
<header class="hero bottom-section-spacer" role="region" style="<?php echo $hero_background_img; ?>;">
    <div class="container">
        <div class="text-wrapper">
            <h1 class="hero-title"><?php the_title() ?></h1>
            <section class="breadcrumb">
                <?php displayBreadcrumbs(); ?>
            </section>
            <?php edit_post_link(); ?>
        </div>
    </div>
</header>

<!-- <div id="primary" class="content-area"> -->

    <main class="main-content-wrapper container" role="main">
        <div class="sidebar-opposite-content">
            <?php displaySingleEvent(); ?>

            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>

        <?php get_sidebar('sidebar-contact'); ?>
    </main>
<!-- </div> -->

<?php get_footer(); ?>
