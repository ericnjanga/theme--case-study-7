<?php
    /**
     * Blog page 
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
    <div class="container">
        <div class="text-wrapper">
            <h1 class="hero-title">
                Latest news and tips
            </h1>
            <section class="breadcrumb">
                <?php displayBreadcrumbs(); ?>
            </section>
            <?php edit_post_link(); ?>
        </div>
    </div>
</header>

<main class="main-content-wrapper section-spacer container" role="main">
    <div class="grid grid-bbbbb js-loead-moreposts-container">
        <?php
            if ( have_posts() ) :
                $first_post = true; // Flag to track the first post
                while ( have_posts() ) : the_post();
                    if ( $first_post ) {
                        displayPost(20);
                        // echo '<div class="first-post" style="border:5px solid blue;">';

                            // get_template_part( 'entry' );
                        // echo '</div>'; // Close the div for the first post
                    } else {
                        displayPost(20);
                        // get_template_part( 'entry' );
                    }

                    // No need for comments
                    // comments_template();

                    if ( $first_post ) {
                        $first_post = false; // Set the flag to false after the first post
                    }
                endwhile;
            endif;
        ?>

        <?php //get_template_part( 'nav', 'below' ); ?>
    </div>


    <footer class="loadmore text-center">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-60q68 0 130.62-25.806Q673.239-191.613 721-240L480-480v-340q-142 0-241 98.812Q140-622.375 140-480t98.812 241.188Q337.625-140 480-140Z"/></svg>
        </div>

        <span class="loadmore__message badge rounded-pill text-bg-info">Loading more posts ...</span>
    </footer>
</main>

<?php
    get_footer();