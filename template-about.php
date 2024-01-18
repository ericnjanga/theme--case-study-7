<?php
    /*
    Template Name: About Template
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
       <?php echo get_field('description'); ?>
      </p>

      <img
        src="<?php echo get_field('image'); ?>"
        class="banner-image" alt="<?php echo get_field('heading'); ?>" />
    </div>
  </header>
    

  <section class="gap-bottom-margin">
    <div class="container">
      <div class="link-color-hover1 link-underlined col-md-12 col-lg-8 col-xl-8">
        <h2 class="gap-bottom-margin-5th"><?php echo get_field('heading2'); ?></h2>
       <?php echo get_field('content'); ?>


        <footer class="gap-top-margin-5th">
          <a class="btn btn-secondary has-icon icon-after icon-suitcase" href="<?php echo get_field('link')['url']; ?>">
            See My Latest Work
          </a>
        </footer>

      </div>
    </div>
  </section>
 
    
    <section class="gap-top-padding gap-bottom-padding dark-section">
    <div class="container">
      <div class="row gap-bottom-margin-4th">
        <div class="col-md-12 col-lg-8 col-xl-8">
          <h2 class="gap-bottom-margin-5th"><?php echo get_field('heading3'); ?></h2>
          <p>
            <?php echo get_field('content3'); ?>
          </p>
        </div>
      </div>

      <div class="row gap-bottom-margin">
        <div class="link-color-hover2 link-underlined col-md-12">
        
        <?php if( have_rows('list') ): ?>
   <table class="table table-style1">
            <thead>
 <tr>
 <th scope="col">Degree</th>
                <th scope="col">Qty</th>
                <th class="display-tabCell-hidden-12" scope="col">Type</th>
                <th scope="col">Institution</th>

 </tr>
 </thead>
  <tbody class="table-group-divider">
    <?php while( have_rows('list') ): the_row(); 
       echo ' 
       <tr>
 <td scope="col">'.get_sub_field('degree').'</td>
 <td scope="col">'.get_sub_field('qty').'</td>
  <td  class="display-tabCell-hidden-12" scope="col">'.get_sub_field('type_of_degree').'</td>

 <td scope="col">'.get_sub_field('institution').'</td>


 </tr>';
       
       endwhile; ?>
   </tbody>
          </table>
<?php endif; ?>
 
           
            

        </div>
      </div>

      <div class="row">
        <div class="col-md-9 col-lg-6">
          <div class="">
            <h2 class="gap-top-margin-4th gap-cancel-pos1234 gap-bottom-margin-5th"> <?php echo get_field('heading4'); ?></h2>
            <p>
              <?php echo get_field('content4'); ?>
            </p>
          </div>
        </div>
        <div class="col-md-12 col-lg-5 offset-lg-1">
          <img src="<?php echo get_field('image4'); ?>" class="img-fluid" alt="<?php echo get_the_title(); ?>" />
        </div>
      </div>

    </div>
  </section>
    
  
<?php get_footer(); ?>

