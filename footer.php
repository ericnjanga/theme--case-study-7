
                <?php get_sidebar('sidebar-contact'); ?>
            </div><!-- site-global-container -->
            
            <footer id="footer" role="contentinfo">
                <div class="container bx-container">

                    <div class="block1">
                        <img src="<?php echo get_template_directory_uri() .'/images/Stilettos & Hammers Logo.png' ?>" 
                            alt="<?php echo esc_html( get_bloginfo( 'name' ) ) ?>" 
                            class="logo"
                        >
                    </div>


                    <div class="block2">
                        <div class="pages" role="contentinfo">
                            <h3>Pages</h3>
                            <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'footer-menu',
                                    'container' => 'nav',
                                    'container_class' => 'footer-menu',
                                ));
                            ?>
                        </div>

                        <div class="social-media" role="contentinfo">
                            <h3>Social Media</h3>
                            <?php dynamic_sidebar('sidebar-social-media'); ?>
                        </div>

                        <div class="articles" role="contentinfo">
                            <h3>Events</h3>
                            <?php latestPostTitles('', '', 3); ?> 
                        </div>

                        <div class="articles" role="contentinfo">
                            <h3>Vlog</h3>
                            <?php latestPostTitles('', '', 3); ?> 
                        </div>

                        <div class="articles" role="contentinfo">
                            <h3>Membership</h3>
                        </div>
                    </div>


                    <div class="block3 text-center" role="contentinfo">
                        <a href="#">Terms and Conditions</a> | <a href="#">Privacy Policy</a> | <span>&copy; <?php echo esc_html( date_i18n( __( 'Y', 'generic' ) ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?></span>
                    </div>
                    
                
                
                
                    <div class="main-footer">

                        <!-- <hr class="sep-1">

                        <div class="appointment" role="contentinfo">
                            <h3>Appointment Scheduling</h3>
                            <?php //dynamic_sidebar('sidebar-appointments'); ?>
                        </div>

                        <hr class="sep-2"> -->
                    </div>
                </div>
            </footer>
        </div><!-- site-global-wrapper -->

        <?php
            // Place modals here for global access
            // getAppointmentModal();
        ?>

        <?php wp_footer(); ?>
    </body>
</html>


