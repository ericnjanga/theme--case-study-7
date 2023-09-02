<?php
    /**
     * Author page 
     * --------
     */
    get_header();
?>
    
<?php
    // HERO -----
    // Fetching hero's background image.
        $hero_background_img = getHeroBgImage();
    ?>
    <header class="hero bottom-section-spacer" role="region" style="<?php echo $hero_background_img; ?>;">
    <div class="text-wrapper">
        <span class="fs-7">Author page</span>
        <h1 class="hero-title"><?php echo get_the_author(); ?></h1>
        <div class="archive-meta" itemprop="description"><?php if ( '' != get_the_author_meta( 'user_description' ) ) { echo esc_html( get_the_author_meta( 'user_description' ) ); } ?></div>
    </div>
</header>

<main class="main-content-wrapper" role="main">
    <?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'entry' ); ?>
    <?php endwhile; ?>
    <?php get_template_part( 'nav', 'below' ); ?>
</main>

<?php get_footer(); ?>