
                <?php get_sidebar('sidebar-contact'); ?>
            </div><!-- site-global-container -->
            
            <footer id="footer" class="top-section-spacer bottom-section-spacer" role="contentinfo">
                <div class="container bx-container">

                    <div class="block1">
                        <img src="<?php echo get_template_directory_uri() .'/images/Stilettos & Hammers Logo.png' ?>" 
                            alt="<?php echo esc_html( get_bloginfo( 'name' ) ) ?>" 
                            class="logo"
                        >
                        <div class="footer__cta">
                            <span class="sup">Newsletter</span>
                            <h3 class="footer__title">Keep up with us by <a href="@">signing up!</a></h3>
                        </div>
                    </div>


                    <hr>


                    <div class="block2">
                        <div class="pages" role="contentinfo">
                            <h3 class="footer__title">Pages</h3>
                            <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'footer-menu',
                                    'container' => 'nav',
                                    'container_class' => 'footer-menu',
                                ));
                            ?>
                        </div>

                        <div class="social-media" role="contentinfo">
                            <h3 class="footer__title">Social Media</h3>
                            <?php dynamic_sidebar('sidebar-social-media'); ?>
                        </div>

                        <div class="articles" role="contentinfo">
                            <h3 class="footer__title">Events</h3>
                            <?php latestPostTitles('', '', 3); ?> 
                        </div>

                        <div class="articles" role="contentinfo">
                            <h3 class="footer__title">Vlog</h3>
                            <?php latestPostTitles('', '', 3); ?> 
                        </div>

                        <div class="articles" role="contentinfo">
                            <h3 class="footer__title">Membership</h3>
                        </div>
                    </div>

                    
                    <hr>


                    <div class="block3 text-center" role="contentinfo">
                        <a href="/terms-and-conditions/">Terms and Conditions</a>
                        <span class="separator">|</span>
                        <a href="/privacy-policy/">Privacy Policy</a>
                        <span class="separator">|</span>
                        <span>&copy; <?php echo esc_html( date_i18n( __( 'Y', 'generic' ) ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?></span>
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


