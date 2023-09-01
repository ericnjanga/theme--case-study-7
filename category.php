<?php
    /**
     * Category page 
     * --------
     */
    get_header();
?>
    
<?php
    // HERO -----
    // Fetching hero's background image.
        $hero_background_img = getHeroBgImage();
    ?>
    <header class="hero" role="region" style="<?php echo $hero_background_img; ?>;">
    <div class="text-wrapper">
        <span class="fs-7">Category page</span>
        <h1 class="hero-title"><?php single_term_title(); ?></h1>
        <div class="archive-meta" itemprop="description"><?php if ( '' != the_archive_description() ) { echo esc_html( the_archive_description() ); } ?></div>
    </div>
</header>

<main class="main-content-wrapper" role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'entry' ); ?>
    <?php endwhile; endif; ?>
    

    <footer class="blog-footer">
        <?php get_template_part( 'nav', 'below' ); ?>
    </footer>
</main>

<?php get_footer(); ?>

