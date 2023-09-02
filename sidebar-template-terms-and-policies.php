
<section class="sidebar-component sidebar-component-color2">
    <h3 class="footer__title">Read about our policies</h3>
    <?php
        wp_nav_menu(array(
            'theme_location' => 'footer-membership-nav',
            'menu_class'     => 'list-chevron-right', // CSS class for the menu ul element
            'container'      => 'nav',        // HTML element to wrap the menu
            'container_class'=> 'menu-container', // CSS class for the container element
        ));
    ?>
</section>
