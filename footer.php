
                <?php get_sidebar('sidebar-contact'); ?>
            </div><!-- site-global-container -->
            
            <footer id="footer" class="footer top-section-spacer" role="contentinfo">
                <div class="container bx-container">

                    <div class="block1">
                        <?php
                            include '_header-logo.php';
                        ?>
                        <!-- <img src="<?php echo get_template_directory_uri() .'/images/Stilettos & Hammers Logo.png' ?>" 
                            alt="<?php echo esc_html( get_bloginfo( 'name' ) ) ?>" 
                            class="logo"
                        > -->
                        <div class="footer__cta">
                            <span class="sup">Newsletter</span>
                            <h4 class="footer__title">Keep up with us by <a class="triggers-subscriber-popup" href="#">signing up!</a></h4>
                        </div>
                    </div>


                    <hr>


                    <div class="block2">
                        <div class="pages" role="contentinfo">
                            <h4 class="footer__title">Pages</h4>
                            <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'footer-essential-nav',
                                    'menu_class'     => 'list-chevron-right', // CSS class for the menu ul element
                                    'container'      => 'nav',        // HTML element to wrap the menu
                                    'container_class'=> 'menu-container', // CSS class for the container element
                                ));
                            ?>
                        </div>

                        <div class="social-media" role="contentinfo">
                            <?php dynamic_sidebar('sidebar-social-media'); ?>
                        </div>

                        <div class="articles" role="contentinfo">
                            <h4 class="footer__title">Events</h4>
                            <?php latestPostTitles('list-social-media list-line-height1', 'tribe_events', '', 3); ?> 
                        </div>

                        <div class="articles" role="contentinfo">
                            <h4 class="footer__title">Vlog</h4>
                            <?php latestPostTitles('list-social-media list-line-height1', 'post', '', 3); ?> 
                        </div>

                        <div class="articles" role="contentinfo">
                            <h4 class="footer__title">Membership</h4>
                            <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'footer-membership-nav',
                                    'menu_class'     => 'list-chevron-right', // CSS class for the menu ul element
                                    'container'      => 'nav',        // HTML element to wrap the menu
                                    'container_class'=> 'menu-container', // CSS class for the container element
                                ));
                            ?>
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



        

        <?php
            displayEventFloatingCta();
        ?>
        <!-- <section class="section-cta-floating-block">
            <div class="section-cta-floating-block__content-wrapper container">
                <div class="section-cta-floating-block__message">
                    <b>Upcoming event: </b>
                    <a href="#">Lorem ipsum dolor la odio officiis repellendus!</a>
                </div>
                <button class="btn btn-primary triggers-subscriber-popup pum-trigger">Reserve your spot</button>
            </div>
        </section> -->




        <?php wp_footer(); ?>
    </body>
</html>


