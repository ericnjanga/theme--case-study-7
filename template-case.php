<?php
    /*
    Template Name: Case Study Template
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


      <h1 class="gap-bottom-margin-4th"><?php echo get_field('heading'); ?></h1>

      <p class="txt-large section-max-w2 section-h-centering gap-bottom-margin">
       <?php echo get_field('content'); ?>
      </p>

     
    </div>
  </header> 


  <div class="container">


<?php 
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;


    query_posts(array( 
        'post_type' => 'case-study',
        'posts_per_page' => 10,
        'paged' => $paged,
    ) );  
?>
<?php while (have_posts()) : the_post(); ?>
      

      
      
   <?php     $post_id = $post->ID;  
$taxonomy = 'ctype'; 

$terms = wp_get_post_terms($post_id, $taxonomy);
$cat = '';
if (!empty($terms) && !is_wp_error($terms)) {
    $term_names = array();
    foreach ($terms as $term) {
        $term_names[] = $term->name;
    }
    
    $comma_separated_terms = implode(', ', $term_names);
    $cat =  $comma_separated_terms;
} 


?>
    
    
    <div class="case-study gap-bottom-margin-4th">
     <a href="<?php echo get_permalink(); ?>">
          <img class="card-img-top case-study__img"
            src="<?php echo get_field('thumbnail_image'); ?>"
            alt="<?php echo get_the_title(); ?>" />
    <div class="case-study__body">
            <p class="case-study__category"><?php echo $cat; ?></p>
            <h3 class="case-study__title">
             <?php echo get_the_title(); ?>
            </h3>
          </div>
        </a>
      </div>
<?php endwhile; 
    
    wp_pagenavi();
    wp_reset_query();?>


</div>
 

    
    
<?php get_footer(); ?>

