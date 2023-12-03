<?php
    /*
    Template Name: Home Template
    */ 
    get_header();
?>


<?php
$section1 = get_field('section_1');
if( $section1 ): ?>
<section>
<div class="container">
  <div class="row">
    <div class="col">
      Scroll <br /> Down
    </div>
    <div class="col">
      <h1><?php echo $section1['heading']; ?></h1>
      <img src="<?php echo $section1['image']; ?>" alt="<?php echo $section1['heading']; ?>" />
        <p><?php echo $section1['description']; ?></p>
    </div>
    <div class="col">
       <p><?php echo $section1['sub_heading']; ?></p>
    </div>
  </div>
</div>
    </section>
<?php endif; ?>


<section>
    <div class="container">
  <div class="row">
  <h1 style="text-align: center"><?php echo get_field('recent_work_heading'); ?></h1>

<?php 
    query_posts(array( 
        'post_type' => 'case-study',
        'showposts' => 1
    ) );  
?>
<?php while (have_posts()) : the_post(); ?>
      
      <div class="card mb-3" style="max-width: 100%;">
          <div class="row g-0">
    <div class="col-md-4">
      <img src="<?php echo get_field('thumbnail_image'); ?>" class="img-fluid rounded-start" alt="<?php echo get_the_title(); ?>">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h4 class="card-title"><?php echo get_the_title(); ?></h4>
   
      </div>
    </div>
  </div>
</div>
      
<?php endwhile; wp_reset_query();?>


</div>
</div>
</section>


<section>
    <div class="container">
  <div class="row">
  <h1 style="text-align: center"><?php echo get_field('heading_sec2'); ?></h1>

<?php 
if( have_rows('grid') ): 
    while( have_rows('grid') ) : the_row();
 ?>
      
      <div class="card mb-3" style="max-width: 50%;">
          <div class="row g-0">
    <div class="col-md-12">
<h4><?php echo get_sub_field('heading'); ?></h4>
<p><?php echo get_sub_field('description'); ?></p>
<a href="<?php echo get_sub_field('link')['url']; ?>"><?php echo get_sub_field('link')['title']; ?></a>
    
    </div>
    
  </div>
</div>
      
<?php endwhile; endif;?>


</div>
</div>
</section>





<section>
<div class="container">
  <div class="row">
  <h1 style="text-align: center"><?php echo get_field('heading3'); ?></h1>
  <p><a href="<?php echo get_field('link3')['url']; ?>"><?php echo get_field('link3')['title']; ?></a></p>
  <img src="<?php echo get_field('image3'); ?>" alt="<?php echo get_field('heading3'); ?>" />
  

      
     

</div>
</div>
</section>


<section>
<div class="container">
  <div class="row">
  <h1 style="text-align: center"><?php echo get_field('review_heading'); ?></h1>

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

