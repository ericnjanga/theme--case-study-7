
<!--
    MailChimp subscription modal
    ------ (Hidden) ------
    <h4 class="content-title">Email Subscription</h4>
    <?php // displayMailChimpSubscriptionForm(); ?>


    <hr>    
-->


<h4>Looking for an event?</h4>
<?php get_search_form(); ?>

<br><br>


<?php
    /**
     * Generate a form that contains category filters for "tribe_events" post type
     * ----------------------------------
     */
    // $event_categories = get_terms(array(
    //     'taxonomy' => 'tribe_events_cat', // Replace with the actual taxonomy name if different
    //     'hide_empty' => false,
    // ));

    // if (!empty($event_categories)) {
    //     echo '<h4 class="content-title">Filter by Category</h4>';
    //     echo '<form class="event-categories-filter" action="' . esc_url(home_url('/')) . '" method="get">';
    //     echo '<fieldset>';
    //     // echo '<legend>Filter by Category:</legend>';
    //     echo '<ul>';

    //     foreach ($event_categories as $category) {
    //         echo '<li>';
    //         echo '<label>';
    //         echo '<input type="checkbox" name="event_category[]" value="' . esc_attr($category->term_id) . '"';
            
    //         // Check if the category is currently selected in the query
    //         if (isset($_GET['event_category']) && in_array($category->term_id, $_GET['event_category'])) {
    //             echo ' checked="checked"';
    //         }
            
    //         echo '>';
    //         echo esc_html($category->name);
    //         echo '</label>';
    //         echo '</li>';
    //     }

    //     echo '</ul>';
    //     echo '</fieldset>';
    //     echo '<input type="hidden" name="post_type" value="tribe_events">';
    //     echo '<input type="submit" value="Apply Filters">';
    //     echo '</form>';
    // }
?>






<?php
    // Replace 'your_custom_post_type' with your actual custom post type slug
    $post_type = 'tribe_events';

    // Replace 'your_custom_taxonomy' with your actual custom taxonomy slug
    $taxonomy = 'tribe_events_cat';

    // Get the categories for the custom post type
    $categories = get_terms(array(
        'taxonomy' => $taxonomy,
        'hide_empty' => false,
    ));

    if (!empty($categories)) {
        echo '<form class="categories-filter" action="' . esc_url(home_url('/')) . '" method="get">';
        echo '<fieldset>';
        echo '<legend>Filter by Category:</legend>';
        echo '<ul>';

        foreach ($categories as $category) {
            echo '<li>';
            echo '<label>';
            echo '<input type="checkbox" name="category_filter[]" value="' . esc_attr($category->term_id) . '"';
            
            // Check if the category is currently selected in the query
            if (isset($_GET['category_filter']) && in_array($category->term_id, $_GET['category_filter'])) {
                echo ' checked="checked"';
            }
            
            echo '>';
            echo esc_html($category->name);
            echo '</label>';
            echo '</li>';
        }

        echo '</ul>';
        echo '</fieldset>';
        echo '<input type="hidden" name="post_type" value="' . esc_attr($post_type) . '">';
        echo '<input type="submit" value="Apply Filters">';
        echo '</form>';
    }
?>










<hr>

<h4 class="content-title">.....Archives</h4>
<?php dynamic_sidebar( 'sidebar-archives' ); ?>