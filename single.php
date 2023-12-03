<?php
    /**
     * Artile page
     * --------
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
<h1><?php  the_title(); ?></h1>

<?php if(get_field('thumbnail_image')){ ?>
    
 <img src="<?php echo get_field('thumbnail_image'); ?>" class="img-fluid rounded-start" alt="<?php echo get_the_title(); ?>">
<?php } ?>
<?php the_post(); the_content(); ?>  </div>
</div>
</div>
</section>


<?php get_footer(); ?>



