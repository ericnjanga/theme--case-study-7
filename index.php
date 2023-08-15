<?php
    /**
     * Blog page 
     * --------
     */
    get_header();
?>

<header class="hero">
    <div class="text-wrapper">
        <h1 class="hero-title">Latest news</h1>
        <?php edit_post_link(); ?>
    </div>
</header>

<main class="main-content-wrapper section-spacer" role="main">
    <div class="content-listing-grid-1 grid">
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

        <?php get_template_part( 'nav', 'below' ); ?>
    </div>
</main>

<?php
    get_footer();