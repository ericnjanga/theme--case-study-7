<?php 
    get_header(); 
?>

<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div> 

<?php
    // Fetching hero's background image.
    $hero_background_img = getHeroBgImage();
?>
<header class="hero bottom-section-spacer" role="region" style="<?php echo $hero_background_img; ?>;">
    <div class="container">
        <div class="text-wrapper">
          <!---  <div><?php printf( esc_html__( 'Archives:', 'generic' )); ?></div> -->
            <h1 class="hero-title">
                <?php the_archive_title(); ?>
            </h1>
            
        </div>
    </div>
</header>


<section>
    <div class="container">
  <div class="row">
      

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                   <div class="card mb-3" style="max-width: 100%;">
          <div class="row g-0">
    <div class="col-md-4">
    <?php if(get_field('thumbnail_image')) {?>
    <a href="<?php echo get_permalink(); ?>">  <img src="<?php echo get_field('thumbnail_image'); ?>" class="img-fluid rounded-start" alt="<?php echo get_the_title(); ?>"></a>
    <?php } ?>
    </div>
    <div class="col-md-8">
      <div class="card-body">
      <?php /* echo  get_the_date( 'M dS,  Y') */ ?>
        <h4 class="card-title"><a href="<?php echo get_permalink(); ?>"> <?php echo get_the_title(); ?></a></h4>
   
      </div>
    </div>
  </div>
</div>
      
        <?php endwhile; endif;
            
                wp_pagenavi();
?>



</div>
</div>
</section>

<?php get_footer(); ?>