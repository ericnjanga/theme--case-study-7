<?php
    /*
    Template Name: Expertise Template
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
    <div class="fixed-sidebar-container">
      <div id="nav-expertise" class="fixed-sidebar is-sticky">
        <div class="list-group">
        <?php $sdata= ''; if( have_rows('grid') ): $i = 1; 
                while( have_rows('grid') ): the_row(); 
    
     $sdata .= '<a href="#expertise'.$i.'" 
                class="list-group-item list-group-item-action"  
                  onclick="trackButtonClick(\'Expertise sidebar nav\', \' '.get_sub_field('main_heading').' \')">
                    '.get_sub_field('main_heading').'
                    </a>
     ';
   $i++;  
    endwhile; 
    
     endif; 
     
     echo $sdata; 
?>
 
        </div>
      </div>
    </div>
  </div>



<?php if( have_rows('grid') ):  $i = 1;?>

    <?php while( have_rows('grid') ): the_row(); 
?>


<section class="<?php if($i % 2 != 0) { echo 'pos-relative gap-top-padding gap-bottom-padding';} else {echo 'pos-relative gap-top-padding gap-bottom-padding dark-section'; } ?>">
    <span id="expertise<?php echo $i?>" class="page-anchor-dir"></span>

    <div class="container">
      <div class="col-lg-8 offset-lg-4"> 
        <h2 class="gap-bottom-margin-5th"> <?php echo get_sub_field('main_heading'); ?></h2>
        <p class="gap-bottom-margin-5th">
          <?php echo get_sub_field('content'); ?>
        </p>

        <div class="row gap-bottom-margin-10th link-color-hover1 link-underlined">
        <?php echo get_sub_field('column_1'); ?>
        <?php echo get_sub_field('column_2'); ?>

        </div>


        <footer>
          <ul class="list-inline">
            <li>
              <a class="btn btn-secondary link-icon icon-after icon-suitcase" href="<?php echo get_sub_field('button_1')['url']; ?>" 
              onclick="trackButtonClick('Related Case Studies', '<?php echo  get_sub_field('main_heading'); ?>')"><?php echo get_sub_field('button_1')['title']; ?>
                </a>
            </li>
            <li>
              <a class="btn btn-secondary link-icon icon-after icon-text" href="<?php echo get_sub_field('button_2')['url']; ?>" 
              onclick="trackButtonClick('Related articles', '<?php echo  get_sub_field('main_heading'); ?>')"><?php echo get_sub_field('button_2')['title']; ?></a>
            </li>
          </ul>
          
          
        </footer>
      </div>
    </div>
  </section>

 


<?php 

       
     $i++;  endwhile; ?>
<?php endif; ?>

    
    
    
<?php get_footer(); ?>

