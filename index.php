<?php
    /**
     * Blog page 
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


      <h1 class="gap-bottom-margin-4th"><?php echo get_field('blog_main_page_heading', 'option'); ?></h1>

      <p class="txt-large section-max-w2 section-h-centering gap-bottom-margin">
       <?php echo get_field('blog_main_page_content', 'option'); ?>
      </p>

     
    </div>
  </header> 


  <div class="container">


    <div class="grid-2col-max">

<?php 
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;


    query_posts(array( 
        'post_type' => 'post',
        'posts_per_page' => 10,
        'paged' => $paged,
    ) );  
?>
<?php while (have_posts()) : the_post(); ?>
 
 <article class="card card-article bx-container">
        <a href="<?php echo get_permalink(); ?>">
          <img
            src="<?php echo get_field('thumbnail_image'); ?>" 
            class="card-article-img img-fluid" alt="<?php echo get_the_title(); ?>" />
          <div class="card-body">
            <p class="card-text"> <?php echo  get_the_date( 'M d,  Y') ?></p>
            <h3 class="card-title m-0">
             <?php echo get_the_title(); ?>
            </h3>
          </div>
        </a>
      </article>
      
<?php endwhile; 
    
    wp_pagenavi();
    wp_reset_query();?>


</div>
</div>
 


<?php
    get_footer();