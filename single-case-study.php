<?php
    /**
     * Artile page
     * --------
     */
    get_header();
?>

  <header class="hero gap-top-margin gap-bottom-margin">
    <div class="container">
      <nav aria-label="breadcrumb" class="breadcrumb section-max-w1 mx-auto">
        <ol class="breadcrumb__list m-0 mx-auto">
          <?php if(function_exists('bcn_display'))
          {
              bcn_display();
          }?>
        </ol>
      </nav>

      <h1 class="gap-bottom-margin-4th"><?php echo get_the_title(); ?></h1>
      <p class="txt-large section-max-w2 section-h-centering gap-bottom-margin">
     <?php echo get_field('introduction'); ?>
      </p>
    </div>
  </header>





  <div class="container">
    <div class="fixed-sidebar-container">
      <div id="nav-expertise" class="fixed-sidebar is-sticky">
        <div class="list-group">

          <!--
            Note: Shabnam
            - Replace "... Case Study title ..." by the case study title (php)
          -->
          <a href="#the-problem" class="list-group-item list-group-item-action"
            onclick="trackButtonClick('<?php echo get_the_title(); ?>', 'The Problem')">The Problem</a>
          <a href="#image-gallery" class="list-group-item list-group-item-action"
            onclick="trackButtonClick('<?php echo get_the_title(); ?>', 'Image Gallery')">Image Gallery</a>
          <a href="#technical-process" class="list-group-item list-group-item-action"
            onclick="trackButtonClick('<?php echo get_the_title(); ?>', 'Technical Proces')">Technical Process</a>
          <a href="#conclusion-and-takeaway" class="list-group-item list-group-item-action"
            onclick="trackButtonClick('<?php echo get_the_title(); ?>', 'Takeaway')">Conclusion &amp;
            Takeaway</a>
        </div>
      </div>
    </div>
  </div>





  <section class="single-body">
    <!-- Problem -->
    <section class="pos-relative gap-bottom-padding">
      <span id="the-problem" class="page-anchor-dir half-up"></span>
      <div class="container">
        <div class="col-lg-8 offset-lg-4">
        <?php echo get_field('problem'); ?>
        </div>
      </div>
    </section>
    <!-- Problem -->


    <!-- Image Gallery -->
    <section class="pos-relative gap-top-padding gap-bottom-padding dark-section">
      <span id="image-gallery" class="page-anchor-dir half-up"></span>
      <div class="container">
        <div class="col-lg-8 offset-lg-4">
          <?php echo get_field('image_gallery'); ?>
        </div>
      </div>
    </section>
    <!-- Image Gallery -->


    <!-- Technical Process -->
    <section class="pos-relative gap-top-padding gap-bottom-padding">
      <span id="technical-process" class="page-anchor-dir half-up"></span>
      <div class="container">
        <div class="col-lg-8 offset-lg-4">
          <?php echo get_field('technical_process'); ?>
        </div>
      </div>
    </section>
    <!-- Technical Process -->


    <!-- Conclusion & Takeaway -->
    <section class="pos-relative">
      <span id="conclusion-and-takeaway" class="page-anchor-dir half-up"></span>
      <div class="container">
        <div class="col-lg-8 offset-lg-4">
          <?php echo get_field('conclusion_&_takeaway'); ?>
        </div>
      </div>
    </section>
    <!-- Conclusion & Takeaway -->
  </section>




<?php get_footer(); ?>