
<?php
    // Inject helpers (needed all over the application)
    include '_fct-helpers.php';
?>



<?php
add_action( 'after_setup_theme', 'generic_setup' );
function generic_setup() {
load_theme_textdomain( 'generic', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'custom-logo' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'responsive-embeds' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'html5', array( 'search-form', 'navigation-widgets' ) );
add_theme_support( 'woocommerce' );
global $content_width;
if ( !isset( $content_width ) ) { $content_width = 1920; }
    register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'generic' ) ) );
}
add_action( 'wp_enqueue_scripts', 'generic_enqueue' );


// Footer Menus ...
// Essential Menu ...
function register_footer_menu1() {
    register_nav_menu('footer-essential-nav', 'Footer Essential Menu');
}
add_action('after_setup_theme', 'register_footer_menu1');


// Footer Menus ...
function register_footer_menu2() {
    register_nav_menu('footer-membership-nav', 'Footer Membership Menu');
}
add_action('after_setup_theme', 'register_footer_menu2');


// Register menu walker ...
require_once get_template_directory() . '/_walker-bootstrap-nav-menu.php';

function register_custom_navwalker(){
    register_nav_menu('bootstrap-menu', __('Bootstrap Menu'));
}
add_action('after_setup_theme', 'register_custom_navwalker');




function enqueue_bootstrap_js() {
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array(), '5.3.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_bootstrap_js');



function generic_enqueue() {
    wp_enqueue_style( 'generic-style', get_stylesheet_uri() );

    /* Font families */
    // wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600&family=Maitree:wght@400;600;700&family=Merriweather:wght@400;700&family=Oswald&display=swap', array(), null );
    wp_enqueue_style( 'header-font', 'https://fonts.googleapis.com/css2?family=Cormorant+Upright:wght@500;600;700&display=swapp', array(), null );
    wp_enqueue_style( 'body-font', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400;1,500&display=swap', array(), null );
    wp_enqueue_style( 'bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css', array(), null );
    
    wp_enqueue_style( 'stilettos-hammers-styles', get_template_directory_uri() . '/styles-dist/stilettos-hammers-styles.min.css', array(), '1.8' );


    wp_enqueue_style( 'generic-icons', get_template_directory_uri() . '/icons/icons.css' );
    wp_enqueue_script( 'jquery' );
    wp_register_script( 'generic-videos', get_template_directory_uri() . '/js/videos.js' );
    wp_enqueue_script( 'generic-videos' );
    wp_add_inline_script( 'generic-videos', 'jQuery(document).ready(function($){$("#wrapper").vids();});' );
}
add_action( 'wp_footer', 'generic_footer' );
function generic_footer() {
?>
<script>
jQuery(document).ready(function($) {
$(".before").on("focus", function() {
$(".last").focus();
});
$(".after").on("focus", function() {
$(".first").focus();
});
$(".menu-toggle").on("keypress click", function(e) {
if (e.which == 13 || e.type === "click") {
e.preventDefault();
$("#menu").toggleClass("toggled");
$(".looper").toggle();
}
});
$(document).keyup(function(e) {
if (e.keyCode == 27) {
if ($("#menu").hasClass("toggled")) {
$("#menu").toggleClass("toggled");
}
}
});
$("img.no-logo").each(function() {
var alt = $(this).attr("alt");
$(this).replaceWith(alt);
});
});
</script>
<?php
}
add_filter( 'document_title_separator', 'generic_document_title_separator' );
function generic_document_title_separator( $sep ) {
$sep = esc_html( '|' );
return $sep;
}
add_filter( 'the_title', 'generic_title' );
function generic_title( $title ) {
if ( $title == '' ) {
return esc_html( '...' );
} else {
return wp_kses_post( $title );
}
}
function generic_schema_type() {
$schema = 'https://schema.org/';
if ( is_single() ) {
$type = "Article";
} elseif ( is_author() ) {
$type = 'ProfilePage';
} elseif ( is_search() ) {
$type = 'SearchResultsPage';
} else {
$type = 'WebPage';
}
echo 'itemscope itemtype="' . esc_url( $schema ) . esc_attr( $type ) . '"';
}
add_filter( 'nav_menu_link_attributes', 'generic_schema_url', 10 );
function generic_schema_url( $atts ) {
$atts['itemprop'] = 'url';
return $atts;
}
if ( !function_exists( 'generic_wp_body_open' ) ) {
function generic_wp_body_open() {
do_action( 'wp_body_open' );
}
}
add_action( 'wp_body_open', 'generic_skip_link', 5 );
function generic_skip_link() {
echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__( 'Skip to the content', 'generic' ) . '</a>';
}
add_filter( 'the_content_more_link', 'generic_read_more_link' );
function generic_read_more_link() {
if ( !is_admin() ) {
return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">' . sprintf( __( '...%s', 'generic' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
}
}
add_filter( 'excerpt_more', 'generic_excerpt_read_more_link' );
function generic_excerpt_read_more_link( $more ) {
if ( !is_admin() ) {
global $post;
return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">' . sprintf( __( '...%s', 'generic' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
}
}
add_filter( 'big_image_size_threshold', '__return_false' );
add_filter( 'intermediate_image_sizes_advanced', 'generic_image_insert_override' );
function generic_image_insert_override( $sizes ) {
unset( $sizes['medium_large'] );
unset( $sizes['1536x1536'] );
unset( $sizes['2048x2048'] );
return $sizes;
}
add_action( 'widgets_init', 'generic_widgets_init' );

function generic_widgets_init() {
    register_sidebar( array(
        'name'          => 'Additional contact information',
        'id'            => 'sidebar-additional-contact-info',
        'description'   => '...',
        // Add more sidebar options if needed
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">ccc',
        'after_title' => '</h3>',
    ) );

    // Social Media
    register_sidebar( array(
        'name'          => 'Social Media',
        'id'            => 'sidebar-social-media',
        'description'   => 'For social media link',
        // Add more sidebar options if needed
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => 'Archives',
        'id'            => 'sidebar-archives',
        'description'   => 'For blog archives',
        // Add more sidebar options if needed
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

    // Quick contact
    register_sidebar( array(
        'name'          => 'Contact',
        'id'            => 'sidebar-quick-contact',
        'description'   => 'For phone, emails, address, ...',
        // Add more sidebar options if needed
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}


add_action( 'wp_head', 'generic_pingback_header' );
function generic_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}

add_action( 'comment_form_before', 'generic_enqueue_comment_reply_script' );
function generic_enqueue_comment_reply_script() {
    if ( get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}


// function enqueue_custom_script() {
//     // Register jQuery as a dependency
//     wp_enqueue_script('jquery');

//     // Enqueue custom script
//     wp_enqueue_script('site-employees.js', get_template_directory_uri() . '/js/site-employees.js', array('jquery'), '1.0', true);

//     // wp_enqueue_script('site-form-email-subscription.js', get_template_directory_uri() . '/js/site-form-email-subscription.js', array('jquery'), '1.0', true);
// }
// add_action('wp_enqueue_scripts', 'enqueue_custom_script');



/**
 * Parallax plugin inclusion
 * ----
 * NOTE: I'VE NOTICED SOME ISSUES WITH THIS PLUGIN (Scrolling issues, background image scrolling issues)
 */
// function enqueue_parallax_script() {
//     // Enqueue jQuery
//     wp_enqueue_script('jquery');

//     // Enqueue skrollr.min.js (depends on jquery)
//     wp_enqueue_script('skrollrjs', 'https://cdn.jsdelivr.net/npm/skrollr@0.6.26/dist/skrollr.min.js', array('jquery'), null, true);

//     // Enqueue site-parallax-scroll.js (depends on skrollr.min.js)
//     wp_enqueue_script('site-parallax-scroll', get_template_directory_uri() . '/js/site-parallax-scroll.js', array('skrollrjs'), '1.0', true);
// }
// add_action('wp_enqueue_scripts', 'enqueue_parallax_script');




function enqueue_custom_script() {
    wp_enqueue_script('jquery');

    // Employees
    wp_enqueue_script('site-employees.js', get_template_directory_uri() . '/js/site-employees.js', array('jquery'), '1.0', true);

    // Infinite scroll
    wp_enqueue_script('site-infinite-scroll.js', get_template_directory_uri() . '/js/site-infinite-scroll.js', array('jquery'), '1.0', true);

    // Localize the ajaxurl variable
    wp_localize_script('site-infinite-scroll.js', 'my_ajax_obj', array(
        'ajax_url' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_script');




function enqueue_img_gallery_script() {
    // wp_enqueue_script('jquery');

    wp_enqueue_script('photoswipe', get_template_directory_uri() . '/js/libs/photoswipe.umd.min.js', array(), '1.0', true);
    wp_enqueue_script('photoswipe-lightbox', get_template_directory_uri() . '/js/libs/photoswipe-lightbox.umd.min.js', array(), '1.0', true);
    wp_enqueue_style( 'photoswipe-css', 'https://cdn.jsdelivr.net/npm/photoswipe@5.3.8/dist/photoswipe.min.css', array(), null );
    wp_enqueue_script('site-image-gallery.js', get_template_directory_uri() . '/js/site-image-gallery.js', array('photoswipe', 'photoswipe-lightbox'), '1.0', true);

}
add_action('wp_enqueue_scripts', 'enqueue_img_gallery_script');


/**
 * function that will handle the AJAX request and load more posts
 * --------------
 */
function load_more_posts() {
    $page = $_POST['page'];
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 5,
        'paged' => $page,
    );

    $query = new WP_Query($args);
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            // xxx();
            displayPost();
            // Display your post content here
            // For example: the_title(); the_excerpt();
        }
    }
    wp_reset_postdata();

    die();
}
add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');






/**
 * To create a search box that specifically queries only "tribe_events" (events created using The Events Calendar plugin) in WordPress.
 * This hook allows you to modify the main query before it is executed
 */

function modify_event_search_query($query) {
    if (is_search() && !is_admin() && $query->is_main_query()) {
        if (is_page_template('template-events.php')) {
            $query->set('post_type', 'tribe_events');
        }
    }
}
add_action('pre_get_posts', 'modify_event_search_query');







function generic_custom_pings( $comment ) {
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo esc_url( comment_author_link() ); ?></li>
<?php
}
add_filter( 'get_comments_number', 'generic_comment_count', 0 );
function generic_comment_count( $count ) {
if ( !is_admin() ) {
global $id;
$get_comments = get_comments( 'status=approve&post_id=' . $id );
$comments_by_type = separate_comments( $get_comments );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}