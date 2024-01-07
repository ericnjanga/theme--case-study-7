<?php 
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


      <h1 class="gap-bottom-margin-4th"> <?php the_archive_title(); ?></h1>
 

     
    </div>


  <div class="container">

      

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                       
      
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
            <p class="case-study__category" style="text-align: left"><?php echo $cat; ?></p>
            <h3 class="case-study__title" style="text-align: left">
             <?php echo get_the_title(); ?>
            </h3>
          </div>
        </a>
      </div>
      
        <?php endwhile; endif;
            
                wp_pagenavi();
?>



</div>
 

<?php get_footer(); ?>