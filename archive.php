<?php 
    get_header(); 
?>

<?php
    // Fetching hero's background image.
    $hero_background_img = getHeroBgImage();
?>
<header class="hero bottom-section-spacer" role="region" style="<?php echo $hero_background_img; ?>;">
    <div class="container">
        <div class="text-wrapper">
            <div><?php printf( esc_html__( 'Archives:', 'generic' )); ?></div>
            <h1 class="hero-title">
                <?php the_archive_title(); ?>
            </h1>
            <section class="breadcrumb">
                <?php displayBreadcrumbs(); ?>
            </section>
        <!-- <div class="archive-meta" itemprop="description"><?php if ( '' != the_archive_description() ) { echo esc_html( the_archive_description() ); } ?></div> -->
        </div>
    </div>
</header>


<main class="main-content-wrapper" role="main">
    <section class="container search-container">
        <?php get_search_form(); ?>
    </section>

    <div class="container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'entry' ); ?>
        <?php endwhile; endif; ?>

        <footer class="blog-footer">
            <?php get_template_part( 'nav', 'below' ); ?>
        </footer>
    </div>
</main>

<?php get_footer(); ?>