<?php if(!is_page_template('template-designSystem.php')){ ?>
<footer class="footer gap-top-margin gap-bottom-margin link-color-hover2 link-underlined">
    <div class="container footer-container d-flex flex-column">
      <header class="footer-header row">
        <div class="col-lg-6 offset-lg-3 text-center">
          <a href="" class="navbar-brand"><?php
		  
		   $custom_logo_id = get_theme_mod( 'custom_logo' );
          $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
		 
		  ?>
            <img class="tenverto-logo" src="<?php echo esc_url( $logo[0] ); ?>" alt="Tenverto by Eric Njanga">
          </a>
          <p class="m-0"> <?php echo get_field('sub_heading','option'); ?></p>
        </div>
      </header>

      <div class="row">
        <div class="col-lg-12">
          <ul class="footer-header-list list-inline justify-content-center list-no-style m-0 p-0">
            <li>
              <span class="text-icon icon-before icon-pin">	<?php echo get_field('location','option'); ?></span>
            </li>
            <li>
              <a target="_blank" href="<?php echo get_field('linkd','option'); ?>"
                class="link-icon icon-before icon-linkedIn">Reach out</a>
            </li>
          </ul>
        </div>
      </div>
	  
	 
					</p>
						 <p>
					 

      <div class="footer-body me-auto ms-auto">
        <div class="footer-body-cell-1">
          <h3 class="footer-body-title">Happiest Clients</h3>
          <ul class="footer-client-list list-no-style m-0 p-0">
		  
		  <?php 
if( have_rows('happiest_clients', 'option') ): 
    while( have_rows('happiest_clients','option') ) : the_row();
 ?>
               <li>
              <a target="_blank" href="<?php echo get_sub_field('linl'); ?>">
                <img class="client-logo img-fluid" src="<?php echo get_sub_field('image'); ?>" alt="<?php echo get_sub_field('name'); ?>">
              </a>
            </li>
      
<?php endwhile; endif;?>

           
		   
          </ul>
        </div>

        <div>
          <h3 class="footer-body-title">On this website</h3>
          <ul class="footer-body-cell-list-links list-no-style m-0 p-0">
		  
		  		  <?php 
if( have_rows('On this website', 'option') ): 
    while( have_rows('On this website','option') ) : the_row();
 ?>
               <li>
              <a class="link-icon icon-before icon-link" href="<?php echo get_sub_field('linl'); ?>">
                <?php echo get_sub_field('title'); ?>
              </a>
            </li>
      
<?php endwhile; endif;?>

             
          </ul>
        </div>

        <div>
          <h3 class="footer-body-title">Online Presence</h3>
          <ul class="footer-body-cell-list-links list-no-style m-0 p-0">
		  
		   <?php 
if( have_rows('Online Presence', 'option') ): 
    while( have_rows('Online Presence','option') ) : the_row();
 ?>
               <li>
			   <a class="link-icon icon-before<?php echo get_sub_field('additional_class'); ?>" target="_blank"
               href="<?php echo get_sub_field('linl'); ?>/">
                <?php echo get_sub_field('title'); ?>
              </a>
            </li>
      
<?php endwhile; endif;?>

          </ul>
        </div>
      </div>
    </div>
  </footer>



  <!-- Add the back-to-top button with arrow symbol -->
  <button class="btn-back-to-top">
    <div class="arrow-container"><i class="bi bi-arrow-up"></i></div>
  </button>

<?php } ?>


  <!-- Bootstrap v5 Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <!-- Tenverto Script Bundle -->
  <script async src="<?php echo get_bloginfo('template_url'); ?>/dist/scripts.tenverto-bundle.js"></script>
        <?php wp_footer(); ?>
    </body>
</html>