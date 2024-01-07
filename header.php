<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php generic_schema_type(); ?>>
    <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="<?php if ( is_single() ) { echo esc_html( wp_strip_all_tags( get_the_excerpt(), true ) ); } else { bloginfo( 'description' ); } ?>" />
    <meta name="keywords" content="<?php echo esc_html( implode( ', ', wp_get_post_tags( get_the_ID(), array( 'fields' => 'names' ) ) ) ); ?>" />
    <meta property="og:image" content="<?php if ( is_single() && has_post_thumbnail() ) { the_post_thumbnail_url( 'full' ); } elseif ( has_site_icon() ) { echo esc_url( get_site_icon_url() ); } ?>" />
    <meta name="twitter:card" content="photo" />
    <meta name="twitter:site" content="<?php bloginfo( 'name' ); ?>" />
    <meta name="twitter:title" content="<?php if ( is_single() ) { the_title(); } else { bloginfo( 'name' ); } ?>" />
    <meta name="twitter:description" content="<?php if ( is_single() ) { echo esc_html( wp_strip_all_tags( get_the_excerpt(), true ) ); } else { bloginfo( 'description' ); } ?>" />
    <meta name="twitter:image" content="<?php if ( is_single() && has_post_thumbnail() ) { the_post_thumbnail_url( 'full' ); } elseif ( has_site_icon() ) { echo esc_url( get_site_icon_url() ); } ?>" />
    <meta name="twitter:url" content="<?php if ( is_single() ) { esc_url( the_permalink() ); } else { echo esc_url( home_url() ) . '/'; } ?>" />
    <meta name="twitter:widgets:theme" content="light" />
    <meta name="twitter:widgets:link-color" content="#007acc" />
    <meta name="twitter:widgets:border-color" content="#fff" />
    <link rel="canonical" href="<?php echo esc_url( 'https://' . $_SERVER["HTTP_HOST"] . parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ) ); ?>" />
    <script type="application/ld+json">
    {
    "@context": "https://www.schema.org/",
    "@type": "WebSite",
    "name": "<?php bloginfo( 'name' ); ?>",
    "url": "<?php echo esc_url( home_url() ); ?>/"
    }
    </script>
    <script type="application/ld+json">
    {
    "@context": "https://www.schema.org/",
    "@type": "Organization",
    "name": "<?php bloginfo( 'name' ); ?>",
    "url": "<?php echo esc_url( home_url() ); ?>/",
    "logo": "<?php if ( has_custom_logo() ) { $custom_logo_id = get_theme_mod( 'custom_logo' ); $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' ); echo esc_url( $logo[0] ); } ?>",
    "image": "<?php if ( has_site_icon() ) { echo esc_url( get_site_icon_url() ); } ?>",
    "description": "<?php bloginfo( 'description' ); ?>"
    }
    </script>
    
      <!-- Standard head styles -->
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/styles/framework/bootstrap.min.css" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600;700&family=Space+Grotesk:wght@400;500;700&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />

  <link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/dist/styles.css" />
  <!-- Standard head styles -->

  <!-- Google Analytics Events Script -->
  <script async src="<?php echo get_bloginfo('template_url'); ?>/js/google-analytics-events.js"></script>

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-TGXTXXR9G2"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'G-TGXTXXR9G2');
  </script>
  
  
    <?php wp_head(); ?>



    <!-- Google Analytics -->
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-1005349003"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'AW-1005349003');
    </script>
    <!-- Google Analytics -->

    <!-- Meta Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '635929138382588');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=635929138382588&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->
</head>
<body <?php body_class(); ?>>

<?php if(!is_page_template('template-designSystem.php')){ ?>
    
<nav class="tenverto-navbar navbar navbar-light navbar-expand-md bg-faded justify-content-center fixed-top">
    <div class="container">
      <?php
          include '_header-logo.php';
      ?>
     
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#tenverto-nav-collapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse w-100" id="tenverto-nav-collapse">
      
       <?php
                                    wp_nav_menu(array(
                                        'theme_location' => 'bootstrap-menu',
                                        'menu_class' => 'nav navbar-nav ml-auto w-100 justify-content-end',
                                        'container' => false,
                                        'depth' => 2,
                                        'walker' => new Bootstrap_Walker_Nav_Menu(),
                                    ));
                                ?>
         
      </div>

    </div>
  </nav>
    
<?php } ?>