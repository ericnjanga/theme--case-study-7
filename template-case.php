<?php
    /*
    Template Name: Case Study Template
    */ 
    get_header();
?>

<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>
    
   
<section>
    <div class="container">
  <div class="row">


      
          <div class="row g-0">
<h1><?php echo get_field('heading'); ?></h1>
<p><?php echo get_field('content'); ?></p>
  </div>
</div>
</div>
</section>


<section>
    <div class="container">
  <div class="row">

<?php 
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;


    query_posts(array( 
        'post_type' => 'case-study',
        'posts_per_page' => 10,
        'paged' => $paged,
    ) );  
?>
<?php while (have_posts()) : the_post(); ?>
      
      <div class="card mb-3" style="max-width: 100%;">
          <div class="row g-0">
    <div class="col-md-4">
    <a href="<?php echo get_permalink(); ?>">  <img src="<?php echo get_field('thumbnail_image'); ?>" class="img-fluid rounded-start" alt="<?php echo get_the_title(); ?>"></a>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h4 class="card-title"><a href="<?php echo get_permalink(); ?>"> <?php echo get_the_title(); ?></a></h4>
   
      </div>
    </div>
  </div>
</div>
      
<?php endwhile; 
    
    wp_pagenavi();
    wp_reset_query();?>


</div>
</div>
</section>

    
    
<?php get_footer(); ?>

