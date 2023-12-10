                <?php // get_sidebar('sidebar-contact'); ?>
            </div><!-- site-global-container -->
            
  			<footer id="footer" class="footer text-center" role="contentinfo">
                <div class="container">
      				<div class="footer-body">
						<h3>
							<?php echo get_field('heading','option'); ?>
						</h3>
						<p>
							<?php echo get_field('sub_heading','option'); ?>
						</p>
						<p>
							<i class="footer-icon bi bi-geo-alt-fill"></i><?php echo get_field('location','option'); ?>
						</p>
						<a href="<?php echo get_field('linkd','option'); ?>" target="_blank">
							<i class="footer-icon bi bi-linkedin"></i>LinkedIn Profile
						</a>
						<span class="element-to-hide">|</span>


						<a href="<?php echo get_field('book_a_meeting','option'); ?>" target="_blank">
							<i class="footer-icon bi bi-calendar-fill"></i>Book a meeting
						</a>
					</div>
                </div>
            </footer>
        </div><!-- site-global-wrapper --> 








    
		<!-- Add the back-to-top button with arrow symbol -->
		<button class="btn-back-to-top " onclick="scrollToTop()">
			<div class="arrow-container"> <i class="bi bi-arrow-up"></i></div> 
		</button>



        <?php wp_footer(); ?>
    </body>
</html>