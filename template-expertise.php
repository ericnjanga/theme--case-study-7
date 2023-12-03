<?php
    /*
    Template Name: Expertise Template
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



<?php $sdata= ''; if( have_rows('grid') ): $i = 1;  $sdata .= '<ul>';  while( have_rows('grid') ): the_row(); 
    
     $sdata .= '<li><a href="#sec'.$i.'">'.get_sub_field('main_heading').'</a></li>';
   $i++;  
    endwhile; 
    
     $sdata .= '</ul>';
    endif; 
?>




<?php if( have_rows('grid') ):  $i = 1;?>

    <?php while( have_rows('grid') ): the_row(); 
?>


<section id="sec<?php echo $i?>">
    <div class="container">
  <div class="row">

      
      <div class="card mb-3" style="max-width: 100%;">
          <div class="row g-0">
               <div class="col-md-3">
               <?php if($i == 1) echo $sdata; ?>
    </div>
   
    <div class="col-md-9">
      <div class="card-body">
        <h2 class="card-title"> <?php echo get_sub_field('main_heading'); ?></h2>
  <p> <?php echo get_sub_field('content'); ?></p>
   
   <div class="row">

      
      <div class="card mb-3" style="max-width: 100%;">
          <div class="row g-0">
               <div class="col-md-6">
               <?php echo get_sub_field('column_1'); ?>
    </div>
   
    <div class="col-md-6">
      <div class="card-body">
        <?php echo get_sub_field('column_2'); ?>
      </div>
    </div>

  </div>
</div>
      


</div>

<a href="<?php echo get_sub_field('button_1')['url']; ?>"><?php echo get_sub_field('button_1')['title']; ?></a>   <a href="<?php echo get_sub_field('button_2')['url']; ?>"><?php echo get_sub_field('button_2')['title']; ?></a>  
      </div>
    </div>

  </div>
</div>
      


</div>
</div>
</section>



<?php 

       
     $i++;  endwhile; ?>
<?php endif; ?>

    
    
    
<?php get_footer(); ?>

