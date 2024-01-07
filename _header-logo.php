<?php
    if ( has_custom_logo() ) {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        $nologo = '';
    } else {
        $logo = '';
        $nologo = 'no-logo';
    }

    // Anchor that wraps the logo ...
    echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name' ) ) . '" rel="home" itemprop="url" class="navbar-brand d-flex mr-auto"><img src="';
        if ( has_custom_logo() ) {
        echo esc_url( $logo[0] );
        } else {
        echo esc_url( $logo );
        }
        echo '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" id="logo" class="tenverto-logo logo ' . esc_attr( $nologo ) . '" itemprop="url" />';
    echo '</a>';
?>