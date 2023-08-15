<?php
    /*
    Template Name: Events Template
    */ 
    get_header();
?>

<header class="hero">
    <div class="text-wrapper">
        <?php
            // Get the ID of the current post or page
            $post_id = get_the_ID();

            // Get the page title using the post ID
            $page_title = get_the_title($post_id);

            // Output the page title
            echo '<h1 class="hero-title">' . esc_html($page_title) . '</h1>';
        ?>
        <!-- <h1 class="hero-title"><?php echo getField('title'); ?></h1> -->
    </div>
</header>

<main class="main-content-wrapper" role="main">
    <section class="breadcrumb">
        <?php displayBreadcrumbs(); ?>
    </section>
    <div class="content-listing-grid-1 grid">
        <?php
            displayEvents();
        ?>
    </div>
</main>

<?php get_footer(); ?>