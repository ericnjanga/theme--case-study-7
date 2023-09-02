<?php
    /*
    Template Name: About > Meet The Founder
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
            <h1 class="hero-title"><?php echo getField('optional_title'); ?></h1>
            <section class="breadcrumb">
                <?php displayBreadcrumbs(); ?>
            </section>
            <?php edit_post_link(); ?>
        </div>
    </div>
</header>

<main class="main-content-wrapper container" role="main">

    <section class="content-grid">
        <article>
            <div class="post">
                <p><?php echo getField('introduction'); ?></p>
            </div>

            <div class="entry-content" itemprop="mainContentOfPage">
                <?php the_content(); ?>
            </div>
        </article>
    </section>

    <section>
        <h2>Meet the founder</h2>
        <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    // Get the featured image HTML
                    $featured_image = get_the_post_thumbnail( get_the_ID(), 'thumbnail' ); // Change 'thumbnail' to your desired image size
                    // Output the featured image HTML
                    echo $featured_image;
                endwhile;
            endif;
        ?>


        <div>
            <p><?php echo getField('text_1'); ?></p>
            <p><?php echo getField('text_2'); ?></p>
            <p><?php echo getField('text_3'); ?></p>
            <p><?php echo getField('text_4'); ?></p>
            <p><?php echo getField('text_5'); ?></p>
        </div>
    </section>

    <section>
        <h2>Recognition</h2>
        <div class="grid grid-22444">
            <?php
                displayEmployee();
            ?>
        </div>
    </section>

    <section>
        <h2>Gallery</h2>

        <div>
            <p><?php echo getFieldImage('image_1', '', 'medium'); ?></p>
            <p><?php echo getFieldImage('image_2', '', 'medium'); ?></p>
            <p><?php echo getFieldImage('image_3', '', 'medium'); ?></p>
            <p><?php echo getFieldImage('image_4', '', 'medium'); ?></p>
            <p><?php echo getFieldImage('image_5', '', 'medium'); ?></p>
            <p><?php echo getFieldImage('image_6', '', 'medium'); ?></p>
            <p><?php echo getFieldImage('image_7', '', 'medium'); ?></p>
            <p><?php echo getFieldImage('image_8', '', 'medium'); ?></p>
            <p><?php echo getFieldImage('image_9', '', 'medium'); ?></p>
        </div>
    </section>
   

    <dialog id="employeeModal">
        <div class="dialog-header">
            <button id="closeDialog">Close</button>
        </div>
        <div class="dialog-content">
            <p>This is the dialog content.</p>
        </div>
    </dialog>


</main>




<?php get_footer(); ?>