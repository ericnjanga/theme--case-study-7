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
            <!-- <div><?php printf( esc_html__( 'Category page:', 'generic' )); ?></div> -->
            <h1 class="hero-title">
                <?php esc_html_e( 'Page Not Found', 'generic' ); ?>
            </h1>
            <section class="breadcrumb">
                <?php displayBreadcrumbs(); ?>
            </section>
        <!-- <div class="archive-meta" itemprop="description"><?php if ( '' != the_archive_description() ) { echo esc_html( the_archive_description() ); } ?></div> -->
        </div>
    </div>
</header>


<main class="main-content-wrapper" role="main">
    <div class="container">
        <article id="post-0" class="post not-found">
            <div class="entry-content" itemprop="mainContentOfPage">
                <p><?php esc_html_e( 'Nothing found for the requested page. Try a search instead?', 'generic' ); ?></p>
                <?php get_search_form(); ?>
            </div>
        </article>
    </div>
</main>

<?php get_footer(); ?>