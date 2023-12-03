<?php
    /*
    Template Name: About Template
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
<p><?php echo get_field('description'); ?></p>
    <img src="<?php echo get_field('image'); ?>" />
  </div>
</div>
</div>
</section>


<section>
    <div class="container">
  <div class="row">


      
          <div class="row g-0">
<h1><?php echo get_field('heading2'); ?></h1>
<?php echo get_field('content'); ?>
<a href="<?php echo get_field('link')['url']; ?>"><?php echo get_field('link')['title']; ?></a>  </div>
</div>
</div>
</section>
 
 
 <section>
    <div class="container">
  <div class="row">


      
          <div class="row g-0">
<h1><?php echo get_field('heading3'); ?></h1>
<p><?php echo get_field('content3'); ?></p>



<?php if( have_rows('list') ): ?>
 <table class="table">
 <tr>
 <th>Degree</th>
<th>Qty</th>
 <th>Type of degree</th>
 <th>Institution</th>

 </tr>
    <?php while( have_rows('list') ): the_row(); 
       echo ' 
       <tr>
 <td>'.get_sub_field('degree').'</td>
 <td>'.get_sub_field('qty').'</td>
  <td>'.get_sub_field('type_of_degree').'</td>

 <td>'.get_sub_field('institution').'</td>


 </tr>';
       
       endwhile; ?>
    </table>
<?php endif; ?>
</div>
</div>
</section>
    
    
    
<section>
    <div class="container">
  <div class="row">

      
      <div class="card mb-3" style="max-width: 100%;">
          <div class="row g-0">
   
    <div class="col-md-8">
      <div class="card-body">
        <h4 class="card-title"> <?php echo get_field('heading4'); ?></h4>
   <?php echo get_field('content4'); ?>
      </div>
    </div>
     <div class="col-md-4">
      <img src="<?php echo get_field('image4'); ?>" class="img-fluid rounded-start" alt="<?php echo get_the_title(); ?>">
    </div>
  </div>
</div>
      


</div>
</div>
</section>

<?php get_footer(); ?>

