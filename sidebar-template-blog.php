
<!--
    MailChimp subscription modal
    ------ (Hidden) ------
    <h4 class="content-title">Email Subscription</h4>
    <?php // displayMailChimpSubscriptionForm(); ?>


    <hr>    
-->


<h3 class="sidebar__title">Looking for something?</h3>
<?php get_search_form(); ?>







<?php
    /**
     * NOTE: THE FORM REDIRECTS TO THE HOME PAGE INSTEAD OF THE SEARCH PAGE
     * ----------------------------------
     */
    // // Replace 'your_custom_post_type' with your actual custom post type slug
    // $post_type = 'post_type';

    // // Replace 'your_custom_taxonomy' with your actual custom taxonomy slug
    // $taxonomy = 'category';

    // // Get the categories for the custom post type
    // $categories = get_terms(array(
    //     'taxonomy' => $taxonomy,
    //     'hide_empty' => false,
    // ));

    // if (!empty($categories)) {
    //     echo '<form class="categories-filter" action="' . esc_url(home_url('/')) . '" method="get">';
    //     echo '<fieldset>';
    //     echo '<legend>Filter by Category:</legend>';
    //     echo '<ul>';

    //     foreach ($categories as $category) {
    //         echo '<li>';
    //         echo '<label>';
    //         echo '<input type="checkbox" name="category_filter[]" value="' . esc_attr($category->term_id) . '"';
            
    //         // Check if the category is currently selected in the query
    //         if (isset($_GET['category_filter']) && in_array($category->term_id, $_GET['category_filter'])) {
    //             echo ' checked="checked"';
    //         }
            
    //         echo '>';
    //         echo esc_html($category->name);
    //         echo '</label>';
    //         echo '</li>';
    //     }

    //     echo '</ul>';
    //     echo '</fieldset>';
    //     echo '<input type="hidden" name="post_type" value="' . esc_attr($post_type) . '">';
    //     echo '<input type="submit" value="Apply Filters">';
    //     echo '</form>';
    // }
?>







<!-- <h4 class="content-title">Categories</h4>
<?php //displayPostCategoryTitles(); ?>

<hr>

<h4 class="content-title">Archives</h4>
<?php //dynamic_sidebar( 'sidebar-archives' ); ?> -->