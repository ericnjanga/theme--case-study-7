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

    <section class="introduction bottom-section-spacer">
        <div class="introduction__img-wrapper">
            <!-- <p><?php //echo getField('introduction'); ?></p> -->
            <?php getFeaturedImage('img-fluid'); ?>
        </div>

        <div class="introduction__text-wrapper" itemprop="mainContentOfPage">
            <h2 class="introduction__text-wrapper_title">
                <?php echo getField('optional_subtitle'); ?>
            </h2>
            <div class="introduction__text-wrapper_content">
                <?php the_content(); ?>
            </div>
            <div class="introduction__text-wrapper_footer">
                <a class="btn btn-small btn-tertiary" href="#biography">Keep reading</a>

                <?php dynamic_sidebar('founder-sidebar-social-media'); ?>
            </div>
        </div>
    </section>


    <section class="biography grid grid-11122">
        <div id="biography" class="biography__anchor"></div>
        <div>
            <h3><?php echo getField('title_1'); ?></h3>
            <p><?php echo getField('text_1'); ?></p>
        </div>
        <div>
            <h3><?php echo getField('title_2'); ?></h3>
            <p><?php echo getField('text_2'); ?></p>
        </div>
        <div>
            <h3><?php echo getField('title_3'); ?></h3>
            <p><?php echo getField('text_3'); ?></p>
        </div>
        <div>
            <h3><?php echo getField('title_4'); ?></h3>
            <p><?php echo getField('text_4'); ?></p>
        </div>
        <div>
            <h3><?php echo getField('title_5'); ?></h3>
            <p><?php echo getField('text_5'); ?></p>
        </div>
    </section>


    <!-- <section>
        <h2>Recognition</h2>
        <div class="grid grid-11233">
            <?php
                // displayEmployee();
            ?>
        </div>
    </section> -->
   

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