<?php
    /**
     * "Tribe Events plugin has been modified under "Template_Bootstrap.php" file to use this file
     * each time a single event is being navigated on.
     */
?>

<?php get_header(); ?>

<header class="hero">
    <div class="container">
        <div class="text-wrapper">
            <h1 class="hero-title"><?php echo getField('optional_title'); ?></h1>
            <section class="breadcrumb">
                <?php displayBreadcrumbs(); ?>
            </section>
            <?php edit_post_link(); ?>
        </div>
    </div>
</header>

<!-- <div id="primary" class="content-area"> -->

    <main class="main-content-wrapper section-spacer container" role="main">
        <div>
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </header>

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>

        <?php get_sidebar('sidebar-contact'); ?>
    </main>
<!-- </div> -->

<?php get_footer(); ?>
