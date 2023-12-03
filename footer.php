                <?php // get_sidebar('sidebar-contact'); ?>
            </div><!-- site-global-container -->
            
            <footer id="footer" class="footer top-section-spacer" role="contentinfo">
                <div class="container bx-container">

                    <h1>
						<?php echo get_field('heading','option'); ?>
					</h1>
					 <p>
						<?php echo get_field('sub_heading','option'); ?>
					</p>
						 <p>
						<?php echo get_field('location','option'); ?>
					</p>
						 <p>
					<a href="<?php echo get_field('linkd','option'); ?>" target="_blank">Linkedin Profile</a> | 
						<a href="<?php echo get_field('book_a_meeting','option'); ?>" target="_blank">Book a Meeting</a> 
					</p>

                  
					

                    
                </div>
            </footer>
        </div><!-- site-global-wrapper --> 

        <?php wp_footer(); ?>
    </body>
</html>