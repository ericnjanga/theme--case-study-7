<?php
    /*
    Template Name: Home Template
    */ 
    get_header();
?>


<?php
$section1 = get_field('section_1');
if( $section1 ): ?>
<section class="section-bottom-margin hero">
  <div class="container">
    <h1><?php echo $section1['heading']; ?></h1>
    <img class="img-fluid" src="<?php echo $section1['image']; ?>" alt="<?php echo $section1['heading']; ?>" />
    <p><?php echo $section1['sub_heading']; ?></p>
    <p><?php echo $section1['description']; ?></p>
      <button type="button" class="btn btn-dark">Scroll down</button>
  </div>
</section>
<?php endif; ?>








<section class="section-bottom-margin">
  <div class="container">
    <div class="row">
      <h2 style="text-align: center"><?php echo get_field('recent_work_heading'); ?></h2>

      <?php 
          query_posts(array( 
              'post_type' => 'case-study',
              'showposts' => 1
          ) );  
      ?>
      <?php while (have_posts()) : the_post(); ?>
        <div class="case-study">
          <a href="#">
            <img
              class="card-img-top case-study__img"
              src="<?php echo get_field('thumbnail_image'); ?>"
              alt="<?php echo get_the_title(); ?>"
            />
            <div class="case-study__body">
              <h3>
                <?php echo get_the_title(); ?>
              </h3>
            </div>
          </a>
        </div>
      <?php endwhile; wp_reset_query();?>
    </div>
  </div>
</section>








<section class = "section-bottom-margin">
  <div class="container">
    <h2>***<?php echo get_field('heading_sec2'); ?></h2>

    <div class="row row-cols-1 row-cols-md-2 g-4">
      <?php 
        if( have_rows('grid') ): 
          while( have_rows('grid') ) : the_row();
      ?>
        <div class="col">
          <div class="card h-100 card-expertise">
            <a href="<?php echo get_sub_field('link')['url']; ?>">
              <div class="card-body card-expertise__body">
                <h5 class="card-title"><?php echo get_sub_field('heading'); ?></h5>
                <p class="card-text">
                  <?php echo get_sub_field('description'); ?>
                </p>
              </div>
              <div class="card-footer card-expertise__footer">
                <small class="text-body-secondary">Learn more</small>
              </div>
            </a>
          </div>
        </div>
      <?php endwhile; endif;?>
    </div>
  </div>
</section>






<section class="section-bottom-margin section-top-padding section-bottom-padding dark-section">
  <div class="container">
    <div class="row">
    <h2 style="text-align: center"><?php echo get_field('heading3'); ?></h2>
    <p><a href="<?php echo get_field('link3')['url']; ?>"><?php echo get_field('link3')['title']; ?></a></p>
    <img src="<?php echo get_field('image3'); ?>" alt="<?php echo get_field('heading3'); ?>" />
  </div>
  </div>
</section>


<section class="section-bottom-margin">
<div class="container">
  <div class="row">
  <h2 style="text-align: center"><?php echo get_field('review_heading'); ?></h2>

<?php 
    query_posts(array( 
        'post_type' => 'review',
        'showposts' => 10 
    ) );  
?>
<?php while (have_posts()) : the_post(); ?>
      
      <div class="card mb-3" style="max-width: 100%;">
          <div class="row g-0">
    <div class="col-md-4">
      <img src="<?php echo get_field('picture'); ?>" class="img-fluid rounded-start" alt="<?php echo get_the_title(); ?>">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo get_the_title(); ?></h5>
        <p class="card-text"><small class="text-muted"><?php echo get_field('designation'); ?></small></p>

        <p class="card-text"><?php echo get_the_content(); ?></p>
      </div>
    </div>
  </div>
</div>
      
<?php endwhile; wp_reset_query();?>


</div>
</div>
</section>
    

<?php get_footer(); ?>

