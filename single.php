<?php
    /**
     * Artile page
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
    <div class="container">
        <div class="text-wrapper">
            <span class="fs-7">Article page..</span>
            <h1 class="hero-title"><?php the_title(); ?></h1>
            <div class="hero-intro">
                <?php get_template_part( 'entry', 'meta' ); ?>
            </div>
            <?php edit_post_link(); ?>
        </div>
    </div>
</header>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <main class="main-content-wrapper container" role="main">
        <div class="sidebar-opposite-content">
            <?php get_template_part( 'entry' ); ?>
            <!-- <footer class="blog-footer">
                <?php //get_template_part( 'nav', 'below-single' ); ?>
            </footer> -->

            <footer class="additional-articles top-section-spacer">
                <?php
                    // Get the previous post based on the current post
                    $next_post = get_next_post();
                    $previous_post = get_previous_post();

                    // Display next articles
                    if ($next_post) {
                        echo '<div>';
                            echo '<div class="additional-articles__label next">Next</div>';
                            displayPost($next_post->ID);
                        echo '</div>';
                    }
                    if ( $previous_post ) {
                        echo '<div>';
                            echo '<div class="additional-articles__label prev">Previous</div>';
                            displayPost($previous_post->ID);
                        echo '</div>';
                    }
                ?>
            </footer>
        </div>
 
        <?php get_sidebar('sidebar-contact'); ?>
    </main>
<?php endwhile; endif; ?>



<?php get_footer(); ?>



