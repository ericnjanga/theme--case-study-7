<?php 
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
            <div><?php printf( esc_html__( 'You searched for:', 'generic' )); ?></div>
            <h1 class="hero-title">
                "<?php printf( esc_html__( '%s', 'generic' ), get_search_query() ); ?>"
            </h1>
            <section class="breadcrumb">
                <?php displayBreadcrumbs(); ?>
            </section>
        </div>
    </div>
</header>



<main class="main-content-wrapper" role="main">
    <section class="container search-container">
        <?php get_search_form(); ?>
    </section>


    <?php if ( have_posts() ) : ?>
        <div class="container">
            <header class="header">
                <h3 class="entry-title" itemprop="name"><?php esc_html_e( 'Your results:', 'generic' ); ?></h3>
            </header>
            <div class="grid">
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'entry' ); ?>
                <?php endwhile; ?>
                <?php get_template_part( 'nav', 'below' ); ?>
            </div>
        </div>
    <?php else : ?>
        <div class="container">
            <article id="post-0" class="post no-results not-found">
                <header class="header">
                    <h3 class="entry-title" itemprop="name"><?php esc_html_e( 'Nothing Found', 'generic' ); ?></h3>
                </header>
                <div class="entry-content" itemprop="mainContentOfPage">
                    <p><?php esc_html_e( 'Sorry, nothing matched your search. Please try again.', 'generic' ); ?></p>
                </div>
            </article>
        </div>
    <?php endif; ?>
</main>


<?php get_footer(); ?>