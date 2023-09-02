<?php 
    get_header(); 
?>

<?php
        // HERO -----
        // Fetching hero's background image.
        $hero_background_img = getHeroBgImage();
    ?>
    <header class="hero bottom-section-spacer" role="region" style="<?php echo $hero_background_img; ?>;">
    <div class="text-wrapper">
        <!-- <h1 class="hero-title"><?php echo getField('optional_title'); ?></h1> -->
        <h1 class="hero-title entry-title" itemprop="name">
            <div style="font-size: 1.4rem;">
                <?php printf( esc_html__( 'Search Results for:', 'generic' )); ?>
            </div>
            "<?php printf( esc_html__( '%s', 'generic' ), get_search_query() ); ?>"
        </h1>
        <?php edit_post_link(); ?>
    </div>
</header>

<main class="main-content-wrapper" role="main">

    <?php if ( have_posts() ) : ?>
    <header class="header">
    <!-- <h1 class="entry-title" itemprop="name"><?php //printf( esc_html__( 'Search Results for: %s', 'generic' ), get_search_query() ); ?></h1> -->
    </header>
    <?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'entry' ); ?>
    <?php endwhile; ?>
    <?php get_template_part( 'nav', 'below' ); ?>
    <?php else : ?>
    <article id="post-0" class="post no-results not-found">
    <header class="header">
    <h1 class="entry-title" itemprop="name"><?php esc_html_e( 'Nothing Found', 'generic' ); ?></h1>
    </header>
    <div class="entry-content" itemprop="mainContentOfPage">
    <p><?php esc_html_e( 'Sorry, nothing matched your search. Please try again.', 'generic' ); ?></p>
    <?php get_search_form(); ?>
    </div>
    </article>
    <?php endif; ?>
</main>


<?php get_footer(); ?>