<?php
    /*
    Template Name: About > Gallery
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
            <h1 class="hero-title"><?php echo getField('optional_title'); ?></h1>
            <section class="breadcrumb">
                <?php displayBreadcrumbs(); ?>
            </section>
            <?php edit_post_link(); ?>
        </div>
    </div>
</header>

<main class="main-content-wrapper container" role="main">

    <section class="content-grid"> <!--  section-spacer"> -->
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
        <header class="container"> 
            <h2>
                <?php echo getField('optional_subtitle'); ?>
            </h2>
        </header> 

        <div class="test-gallery">
      <a href="https://dummyimage.com/1200x600/000/fff" data-pswp-width="1200" data-pswp-height="600">
        <img src="https://dummyimage.com/120x60/000/fff" alt="" />
      </a>
      <a href="https://dummyimage.com/1200x1200/000/fff" data-pswp-width="1200" data-pswp-height="1200">
        <img src="https://dummyimage.com/60x60/000/fff" alt="" />
      </a>
      <a href="https://dummyimage.com/600x1200/000/fff" data-pswp-width="600" data-pswp-height="1200">
        <img src="https://dummyimage.com/30x60/000/fff" alt="" />
      </a>
    </div>

        <!-- <div id="image-gallery">
            <p><?php echo getFieldImage('image_1', '', 'medium'); ?></p>
            <p><?php echo getFieldImage('image_2', '', 'medium'); ?></p>
            <p><?php echo getFieldImage('image_3', '', 'medium'); ?></p>
            <p><?php echo getFieldImage('image_4', '', 'medium'); ?></p>
            <p><?php echo getFieldImage('image_5', '', 'medium'); ?></p>
            <p><?php echo getFieldImage('image_6', '', 'medium'); ?></p>
            <p><?php echo getFieldImage('image_7', '', 'medium'); ?></p>
            <p><?php echo getFieldImage('image_8', '', 'medium'); ?></p>
            <p><?php echo getFieldImage('image_9', '', 'medium'); ?></p>
        </div> -->
    </section>
   


</main>




<?php get_footer(); ?>