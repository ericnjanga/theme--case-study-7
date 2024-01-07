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

      
      
     
    </div>
  </header> 
    <section>

  <div class="container">

    <section>
      <div class="row align-items-md-stretch">
        <div class="col-md-8 offset-md-2">
        
<?php the_post(); the_content(); ?>  </div>
</div>
</div>
</section>
</div>

<?php get_footer(); ?>



