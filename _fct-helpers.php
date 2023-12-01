<?php
    /**
     * Generate breadcrumbs on the page.
     * Yoast Plugin needs to be installed for this to work.
     */
    function displayBreadcrumbs() {
        if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
        }
    }


    // ...
    function getFieldImage($id, $cssClass='', $imageSize='') {
        $image = get_field($id);
        $output = '';
        if ($image) {
            if ($imageSize=='') {
                $output = '<img class="'. $cssClass. '" src="' . $image . '" alt="--">';
            } else {
                // Get the image sizes
                $image_sizes = $image['sizes'];
            
                // Get the URL of the medium-sized image
                $medium_image_url = $image_sizes[$imageSize];
            
                // Output the medium-sized image URL
                $output = '<img src="'. esc_url($medium_image_url) .'"  class="'. $cssClass. '" alt="' . esc_attr($image['alt']) . '">';
            }
        }

        return $output;
    }
 
    
 


    // ...
    function getPagePermalink($title = '') {
        $page_title = $title; // Replace with the actual page title you want to retrieve the permalink for

        $page = get_page_by_path($page_title); // Get the page object by title
        $permalink = '';

        if ($page) {
            $permalink = get_permalink($page->ID); // Get the permalink from the page object
        }

        return $permalink;
    }


    // ...
    function getSubCategoryLink($subCat, $category) {
        return esc_url(get_category_link(get_term_by('slug', $subCat, $category)->term_id));
    }


    // ...
    function getAppointmentModal() {
        ?>
            <div class="modal fade" id="appointmentModal" tabindex="-1" aria-labelledby="appointmentModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="appointmentModalLabel">Appointment Scheduling</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                            <?php
                                echo esc_html__( 'Click any link to schedule an appointment on Calendly for a convenient booking experience.', 'generic' );
                            ?>
                        </p>
                        <?php dynamic_sidebar('sidebar-appointments'); ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
        <?php
    }


    // ...
    function getField($name) {
        global $post;
        return get_field($name, $post->ID);
    }


    // ...
    function getFieldByID($name, $id) {
        return get_post_meta($id, $name, true);
    }


    // ...
    function displayEmployee($count = -1) {
        $args = array(
            'post_type' => 'employee',
            'posts_per_page' => $count,
        );
    
        $query = new WP_Query($args);
    
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                ?>
                    <div class="employee">
                        <figure>
                            <?php 
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail( 'full', array( 'itemprop' => 'image', 'class' => 'img-thumbnail rounded-0 p-0 bg-accent border-0 mb-10' ) );
                                }
                            ?>
                            <figcaption>
                                <div class="">
                                    <b><?php the_title() ?></b>
                                    <p><?php echo getField('optional_title'); ?></p>

                                    <?php
                                        $content = apply_filters('the_content', get_the_content());
                                        if (!empty($content)) {
                                            // Content is not empty, do something
                                            ?>

                                                <!-- Let people know there is more content to be consumed -->
                                                <button class="btn employee__cta-modal">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48"><path d="m202-160-42-42 498-498H364v-60h396v396h-60v-294L202-160Z"/></svg>
                                                </button>

                                                <article class="employee__bio">
                                                    <?php
                                                        $content = str_replace('<p>', '<p class="fs-7">', $content);
                                                        echo $content;
                                                    ?>
                                                </article>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                <?php
            }
        } else {
            echo '<p>No employee found.</p>';
        }
    
        wp_reset_postdata();
    }


    // ...
    function displayClientLogos($count = -1) {
        $args = array(
            'post_type' => 'client-logo',
            'posts_per_page' => $count,
        );
    
        $query = new WP_Query($args);
    
        if ($query->have_posts()) {
            ?>
                <div class="partner-logos-carousel">
                    <ul class="partner-logos-carousel__list list-unstyled">
                        <?php
                            while ($query->have_posts()) {
                                $query->the_post();
                                $post_ID = get_the_ID();
                                ?>
                                    <li class="partner-logos-carousel__item">
                                        <?php 
                                            if ( has_post_thumbnail() ) {
                                                the_post_thumbnail( 'full', array( 'itemprop' => 'image', 'class' => 'img-thumbnail rounded-0' ) );
                                            }
                                        ?>
                                    </li>
                                <?php
                            }
                        ?>
                    </ul>

                </div>
            <?php
        } else {
            ?>
                <p>No client logos found.</p>
            <?php
        }
    }


    // ...
    function getFeaturedImage($cssClass) {
        // Get the current post ID
        $post_id = get_the_ID();

        // Get the featured image URL
        $featured_image_url = get_the_post_thumbnail_url($post_id, 'full');

        // Display the featured image
        if ($featured_image_url) {
            echo '<img class="'.$cssClass.'" src="' . $featured_image_url . '" alt="Featured Image">';
        } else {
            echo 'No featured image available';
        }
    }


    // ...
    function getHeroBgImage() {
        return getBackgroundImage_byName('Hero flag image');
    }


    /**
     * Fetching an image by name and returning it as a CSS background image rule
     */
    function getBackgroundImage_byName($imgName) {
        // Initialize the background image variable
        $background_img = '';
    
        // Define the query arguments
        $args = array(
            'post_type' => 'attachment',
            'post_status' => 'inherit',
            'posts_per_page' => 1,
            'title' => $imgName,
        );
    
        // Create a new WP_Query instance
        $query = new WP_Query($args);
    
        // Check if there are any matching attachments
        if ($query->have_posts()) {
            $query->the_post();
            
            // Get the attachment ID
            $attachment_id = get_the_ID();
            
            // Get the image URL
            $image_url = wp_get_attachment_url($attachment_id);
            
            if ($image_url) {
                $background_img = "background-image: url($image_url)";
            }
            
            // Reset the post data
            wp_reset_postdata();
        }
    
        return $background_img;
    }
    


    // ...
    function getImage_byName($imgName, $cssClass = '') {
        $image = '';
    
        // Define the query arguments
        $args = array(
            'post_type' => 'attachment',
            'post_status' => 'inherit',
            'posts_per_page' => 1,
            'title' => $imgName,
        );
    
        // Create a new WP_Query instance
        $query = new WP_Query($args);
    
        // Check if there are any matching attachments
        if ($query->have_posts()) {
            $query->the_post();
            
            // Get the attachment ID
            $attachment_id = get_the_ID();
            
            // Get the image URL
            $image_url = wp_get_attachment_url($attachment_id);
            
            if ($image_url) {
                $image = '<img class="' .$cssClass. '" src="' . $image_url . '" alt="Icon Quote">';
            }
            
            // Reset the post data
            wp_reset_postdata();
        }

        return $image;
    }


    // ...
    function latestPostTitles($listClass = '', $post_type = 'post', $category_slug = '', $count = 5) {
        $args = array(
            'post_type' => $post_type,
            'posts_per_page' => $count,
            'category_name' => $category_slug,
        );

        // The way we'll name the post type to users ...
        $post_label = '';
        $post_icon = '';
        switch($post_type) {
            case 'tribe_events': 
                $post_label = 'events';
                $post_icon = 'event';
                break;
            default:
                $post_label = 'posts';
                $post_icon = 'post';
        }

        // Fetch posts ...
        $query = new WP_Query( $args );

        if ( $query->have_posts() ) :
            ?>
                <ul class="<?php echo $listClass; ?>">
                    <?php 
                        while ( $query->have_posts() ) {
                            $query->the_post(); 
                    ?>
                        <li class="<?php echo $post_icon; ?>">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </li>
                    <?php 
                        }
                    ?>
                </ul>
            <?php
            wp_reset_postdata();
        else :
            echo "No $post_label found.";
        endif;
    }


    // ...
    function displayPost($postID = -1) {
            // the post ...
            $the_post;
            if ($postID > -1) {
                $the_post = get_post($postID);
            } else {
                global $post;
                $the_post = $post;
            }

            // custom field ...
            $vimeo_video_url = get_post_meta( $the_post->ID, 'video_url', true );
            $youtube_video_url = get_post_meta( $the_post->ID, 'youtube_video_url', true );
        
            // ...
            $cssClass = ''; 
            if (empty($vimeo_video_url) && empty($youtube_video_url)) {
                $cssClass = 'vlog-item--text'; 
            } else {
                $cssClass = 'vlog-item--video'; 
            }
        ?>
            <div class="bx-container">
                <article class="vlog-item <?php echo $cssClass; ?>">
                    <?php $categories = get_the_category($postID); ?>

                    <a href="<?php echo get_permalink($postID); ?>">

                    <?php if ($cssClass == 'vlog-item--text') { ?>
                        <svg class="vlog-item__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M400-400h160v-80H400v80Zm0-120h320v-80H400v80Zm0-120h320v-80H400v80Zm-80 400q-33 0-56.5-23.5T240-320v-480q0-33 23.5-56.5T320-880h480q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H320Zm0-80h480v-480H320v480ZM160-80q-33 0-56.5-23.5T80-160v-560h80v560h560v80H160Zm160-720v480-480Z"/></svg>
                    <?php } else { ?>
                        <svg class="vlog-item__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m160-800 80 160h120l-80-160h80l80 160h120l-80-160h80l80 160h120l-80-160h120q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800Zm0 240v320h640v-320H160Zm0 0v320-320Z"/></svg>
                    <?php } ?>

                        <?php
                            if (!empty($vimeo_video_url)) {
                                getVimeoThumbnail($vimeo_video_url, 'vlog-item__img');
                            } 
                            else if (!empty($youtube_video_url)) {
                                // This wrapper will be used to hide the black bands
                                ?>
                                <span class="vlog-item__youtube-img-wrapper">
                                    ...
                                </span>
                                <?php
                            }
                        ?>

                        <h3 class="vlog-item__title">
                            <?php echo get_the_title($postID); ?>
                        </h3>
                        <footer class="vlog-item__footer">
                            <?php if ( ! empty( $categories ) ) : ?>
                                <!-- <a class="km-link-secondary" href="<?php // echo esc_url( get_category_link( $categories[0]->term_id ) ); ?>"> -->
                                <!-- </a> -->
                                <span class="vlog-item__categories__item site-badge badge-info">
                                    <?php echo esc_html( $categories[0]->name ); ?>
                                </span>
                                <span class="vlog-item__spacer"></span>
                                <span class="vlog-item__date"><?php echo get_the_date(); ?></span>
                            <?php endif; ?>
                        </footer>

                        <?php if ($cssClass == 'vlog-item--text') { ?>
                            <div class="vlog-item__description">
                                <?php
                                    $content = apply_filters('the_content', wp_trim_words($the_post->post_content, 25));
                                    $content = str_replace('<p>', '<p>', $content);
                                    echo $content;
                                ?>
                            </div>
                        <?php } ?>
                    </a>
                </article>
            </div>
        <?php
    }


    // ...
    function fetchBrandFeatures($gridClass  = '', $category_slug = '', $count = 5, $addMore = false, $content_text_size = 20) {
        $args = array(
            'post_type' => 'brand-feature',
            'posts_per_page' => $count,
            'category_name' => $category_slug,
            'order'          => 'ASC', // Display posts in ascending order
            'orderby'        => 'date', // Order by publish date
        );

        // Inforce default value adoption on all parameters
        // (this doesn't seem to work during the function's declaration)
        if ($gridClass === null) {
            $gridClass = '';
        } 

        $imageSize = 'medium';

        $query = new WP_Query( $args );

        if ( $query->have_posts() ) {
            $themeClasses = array('theme1', 'theme2', 'theme3');
            $themeIndex = 0;

            while ( $query->have_posts() ) {     
                $query->the_post(); 
                $currentThemeClass = $themeClasses[$themeIndex];
                $themeIndex = ($themeIndex + 1) % count($themeClasses);
                ?>
                    <div class="brand-feature bx-container <?php echo $currentThemeClass; ?>">
                        <?php
                            $cssPopupTrigger = strtolower(trim(getField('status'))) === 'members only' ? 'triggers-subscriber-popup' : '';
                        ?>
                        <a class="<?php echo $cssPopupTrigger ?>" href="<?php echo getField('cta_link'); ?>">
                            <div class="brand-feature__content">
                                <span class="brand-feature__status">
                                    <?php echo getField('status'); ?>
                                </span>
                                <h3 class="brand-feature__title">
                                    <?php the_title(); ?>
                                </h3>
                                <p class="brand-feature__text">
                                    <?php
                                        echo wp_trim_words(get_the_content(), 13);
                                    ?>
                                </p>
                                <span class="btn btn-transparent brand-feature__cta">
                                    <span class="brand-feature__cta-text"><?php echo getField('cta_text'); ?></span>
                                </span>
                            </div>

                            <?php 
                                if ( has_post_thumbnail() ) {
                                    $thumbnail_id = get_post_thumbnail_id();
                                    $image_url = wp_get_attachment_image_src($thumbnail_id, 'full')[0]; // Get the URL of the full-size image
                                }
                            ?>
                
                            <div class="brand-feature__image" style="background-image:url(<?php echo $image_url; ?>);"></div>
                        </a>
                    </div>
                <?php 
            }
            wp_reset_postdata();
        } else {
            echo 'No posts found.';
        }
    }


    // ...
    function displayTestimonial($gridClass  = '', $count = -1) {
        // Inforce default value adoption on all parameters
        // (this doesn't seem to work during the function's declaration)
        if ($gridClass === null) {
            $gridClass = '';
        } 
        if ($count === null) {
            $count = -1;
        }
        // Default values enforcement

        // Get the quote image from the gallery
        $attachment_title = 'icon-quote';
        $attachment = get_page_by_path($attachment_title, OBJECT, 'attachment');
        $quote_img = getImage_byName('icon-quote', 'testimonial__icon');

        $args = array(
            'post_type' => 'testimonial',
            'posts_per_page' => $count,
        );
        $imageSize = 'medium';
    
        $query = new WP_Query($args);
    
        if ($query->have_posts()) {
            $themeClasses = array('theme1', 'theme2', 'theme3');
            $themeIndex = 0;
            ?>
            <ul class="<?php echo $gridClass; ?> list-unstyled">
                <?php
                    while ($query->have_posts()) {
                        $query->the_post();
                        $currentThemeClass = $themeClasses[$themeIndex];
                        $themeIndex = ($themeIndex + 1) % count($themeClasses);
                        ?>
                            <li class="bx-container">
                                <article class="testimonial <?php echo $currentThemeClass; ?>">
                                    <?php echo $quote_img; ?>
                                   
                                    <div class="testimonial__body">
                                        <?php 
                                            the_content(); 
                                        ?>
                                    </div>
                                    <footer class="testimonial__footer">
                                        <div class="testimonial__name section-title h4"><?php the_title() ?></div>
                                        <p class="testimonial__title"><?php echo getField('title'); ?></p>
                                    </footer>
                                </article>
                            </li>
                        <?php
                    }
                ?>
            </ul>

            <?php
        } else {
            echo '<p>No awards found.</p>';
        }
    
        wp_reset_postdata();
    }


    // ...
    function displayChildrenPageTitle($listClass = '', $parent = '') {
        global $post;

        // Get the parent page ID
        $parent_page = get_page_by_path($parent);
        $parent_page_id = $parent_page->ID;

        // Retrieve the child pages of the parent page
        $child_pages = get_pages(array(
            'child_of' => $parent_page_id,
            'sort_column' => 'menu_order',
        ));

        // Display the titles of the child pages
        if ($child_pages) {
            ?>
                <ul class="<?php echo $listClass; ?>">
                    <?php foreach ($child_pages as $child_page) { ?>
                        <?php
                            // Check if the child page is not the same as the current page
                            if ($child_page->ID !== $post->ID) {
                                $child_page_url = get_permalink($child_page->ID);
                            ?>
                                <li><a href="<?php echo $child_page_url; ?>"><?php echo $child_page->post_title; ?></a></li>
                            <?php
                            } else {
                            ?>
                                <li><?php echo $child_page->post_title; ?></li>
                            <?php
                            }
                        ?>
                    <?php } ?>
                </ul>
            <?php 
        } else { 
            ?>
                <p>No child pages found.</p>
            <?php 
        }
    }


    // ...
    function getCurrentPageSlug() {
        global $post;
        $page_slug = '';

        if ($post) {
            $page_slug = $post->post_name;
        }

        return $page_slug;
    }


    // ...
    function getCurrentPageTitle() {
        global $post;
        $page_title = '';

        if ($post) {
            $page_title = get_the_title($post);
        }

        return $page_title;
    }


    // ...
    function displayPostCategoryTitles() {
        $categories = get_categories(); // Retrieve all post categories

        if ($categories) {
            ?>
                <ul class="">
                    <?php
                        foreach ($categories as $category) {
                            $category_title = $category->name;
                            $category_url = get_category_link($category->term_id);
                            echo '<li><a href="' . $category_url . '">' . $category_title . '</a></li>';
                        }
                    ?>
                </ul>
            <?php
        } else {
            ?>
                <p>No post categories found.</p>
            <?php
        }
    }
 





    // Return the closed event
    // ******************************
    // ******************************
    function displayCtaBigBlock() {
        $args = array(
            'post_type' => 'cta-big-block',
            'posts_per_page' => 1,
            'orderby' => 'date',  // Order by date in descending order (latest event first)
            'order' => 'DESC',    // Sort in descending order
        );

        // Fetch posts ...
        $query = new WP_Query( $args );

        if ( $query->have_posts() ) :
            ?>
            <section class="section-cta-big-block container">
                <div class="section-cta-big__content-wrapper">
                    <div class="section-cta-big__text-wrapper">
                        <?php while ( $query->have_posts() ) { ?>
                            <?php 
                                $query->the_post();
                            ?>
                            <h2 class="section-cta-big-block__title"><?php the_title(); ?></h2>
                            <div class="section-cta-big-block__text">
                                <?php the_content(); ?>
                            </div>
                            <ul class="section-cta-big-block__list list-material-icons">
                                <li class="star"><?php echo getField('item_1'); ?></li>
                                <li class="star"><?php echo getField('item_2'); ?></li>
                                <li class="star"><?php echo getField('item_3'); ?></li>
                            </ul>
                            <footer class="section-cta-big-block__footer">
                                <button class="btn btn-primary triggers-subscriber-popup pum-trigger">Join Now</button>
                            </footer>
                        <?php } ?>
                    </div>
                </div>
            </section> 
            <?php
            wp_reset_postdata();
        endif;
    }




// No PHP closing tag ...