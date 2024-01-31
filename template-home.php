<?php
    /*
    Template Name: Home Template
    */ 
    get_header();
?>


<?php
$section1 = get_field('section_1');
if( $section1 ): ?>



  <header class="hero gap-top-margin gap-bottom-margin">
    <div class="container">
      <h1><?php echo $section1['heading']; ?></h1>

      <div class="hero-imgwrapper">
        <a class="hero-control text-start link-color-hover1 link-underlined" href="#recent-work">
          Scroll <br />down
        </a>
        <img
          src="<?php echo $section1['image']; ?>"
          class="hero-img img-fluid" alt="<?php echo $section1['heading']; ?>" />
        <p class="hero-control text-end"><?php echo $section1['sub_heading']; ?></p>
      </div>

      <p class="hero-description mx-auto mb-0 txt-large section-max-w1">
      <?php echo $section1['description']; ?>
        
      </p>
    </div>
  </header>
  
<?php endif; ?>


  <section class="pos-relative gap-bottom-margin">
    <span id="recent-work" class="page-anchor-dir"></span>
    <div class="container">
      <h2 class="text-center gap-bottom-margin-5th section-max-w2 section-h-centering">
        <?php echo get_field('recent_work_heading'); ?>
      </h2>

<?php 
    query_posts(array( 
        'post_type' => 'case-study',
        'showposts' => 1
    ) );  
?>
<?php while (have_posts()) : the_post(); 
    
    $post_id = $post->ID;  
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
      
      <div class="case-study">
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
      
      <?php endwhile; wp_reset_query();?>

    </div>
  </section>



<section class="gap-bottom-margin">
    <div class="container">
      <h2 class="text-center gap-bottom-margin-5th section-max-w2 section-h-centering">
       <?php echo get_field('heading_sec2'); ?>
      </h2>
      <div class="row row-cols-1 row-cols-md-2 g-4">
  
        
        
<?php 
if( have_rows('grid') ): 
    while( have_rows('grid') ) : the_row();
 ?>
        <div class="col bx-container">
          <div class="card h-100 card-expertise">
            <a href="<?php echo get_sub_field('link')['url']; ?>" onclick="trackButtonClick('Expertise Card', 'UI Coding & Architecture')">
              <div class="card-body card-expertise__body">
                <h3 class="card-title"><?php echo get_sub_field('heading'); ?></h3>
                <p class="card-text">
                 <?php echo get_sub_field('description'); ?>
                </p>
              </div>
              <div class="card-footer card-expertise__footer">
                <small class="text-body-secondary"><?php echo get_sub_field('link')['title']; ?></small>
              </div>
            </a>
          </div>
        </div>
      
<?php endwhile; endif;?>

      </div>
    </div>
  </section>


<section class="gap-bottom-margin gap-top-padding gap-bottom-padding dark-section">
    <div class="container text-center">
      <div class="row align-items-md-stretch">
        <div class="col-md-12">
          <div class="gap-bottom-margin-4th section-max-w2 section-h-centering section-h-centering">
            <h2 class="gap-bottom-margin-5th">
              <?php echo get_field('heading3'); ?>
            </h2>
            <p class="gap-bottom-margin-5th"><?php echo get_field('contentlink3'); ?>
            </p>
          </div>

          <a class="poster" 
            href="<?php echo esc_url( get_permalink( get_page_by_title( 'About' ) ) ); ?>" 
            onclick="trackButtonClick('Home Page > Dark Section', 'Eric Image')">
            <img
              src="<?php echo get_field('image3'); ?>"
              class="banner-image" alt="<?php echo get_field('heading3'); ?>" />
          </a>
        </div>
      </div>
    </div>
  </section>


   
      <section>
    <div class="container">
      <h2 class="text-center gap-bottom-margin-5th section-max-w2 section-h-centering">
        <?php echo get_field('review_heading'); ?>
      </h2>



<?php 
    query_posts(array( 
        'post_type' => 'review',
        'showposts' => 10 
    ) ); 
    
    $modalsTest = '';
?>
<?php while (have_posts()) : the_post(); ?>
    <div class="card card-testimonial gap-bottom-margin-4th">
        <img class="card-testimonial__img"
          src="<?php echo get_field('picture'); ?>"
          class="img-fluid" alt="<?php echo get_the_title(); ?>" />
        <div class="card-testimonial__description">
          <div class="card-body">
            <h5 class="card-title"><?php echo get_the_title(); ?></h5>
            <h6 class="card-subtitle">
             <?php echo get_field('designation'); ?>
            </h6>
            <?php 
              $words = get_the_content();
              $wordse = explode(' ',get_the_content());
              
               if (count($wordse) > 50) {
        // Extract and join the first 100 words
        $limited_words = implode(' ', array_slice($wordse, 0, 50)) . '...';
        echo  ' <div class="card-text">
              <p>
               '.$limited_words.'
              </p>
            </div>
                        <footer class="card-footer">
              <button type="button" class="btn btn-primary has-icon icon-after icon-box-arrow-up-right"
                data-bs-toggle="modal" data-bs-target="#modal-testimonial-'.$post->ID.'" 
                onclick="trackButtonClick(\'Testimonial\', \'by .. '.get_the_title().'\')">
                See more
              </button>
            </footer>';
            
             $modalsTest .= '  <div class="modal fade" id="modal-testimonial-'.$post->ID.'" tabindex="-1" role="dialog"
    aria-labelledby="modal-testimonial-'.$post->ID.'Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <div>
            <h5 class="modal-title">'. get_the_title() .'</h5>
            <p class="modal-subtitle m-0">
              '.get_field('designation').'
            </p>
          </div>
          <button type="button" class="btn-close btn-bs-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         '.$words.'
        </div>
      </div>
    </div>
  </div>';
    } else {
         echo  ' <div class="card-text">
              <p>
               '.$words.'
              </p>
            </div>';
    }
    
    ?>
         

          </div>
        </div>
      </div>
<?php endwhile; wp_reset_query();?>









    </div>
  </section>


  <!-- Modal -->
  <?php echo  $modalsTest; ?>

<?php get_footer(); ?>

