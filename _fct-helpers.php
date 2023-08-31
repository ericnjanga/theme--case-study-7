
<?php
    /**
     * Generate breadcrumbs on the page.
     * Toast Plugin needs to be installed for this to work.
     */
    function displayBreadcrumbs() {
        if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
        }
    }
?>




<?php
    function getFieldImage($id, $eltClass='', $imageSize='') {
        $image = get_field($id);
        $output = '';
        if ($image) {
            if ($imageSize=='') {
                $output = '<img class="'. $eltClass. '" src="' . $image . '" alt="--">';
            } else {
                // Get the image sizes
                $image_sizes = $image['sizes'];
            
                // Get the URL of the medium-sized image
                $medium_image_url = $image_sizes[$imageSize];
            
                // Output the medium-sized image URL
                $output = '<img src="' . esc_url($medium_image_url) . '" alt="' . esc_attr($image['alt']) . '">';
            }
        }

        return $output;
    }
?>




<?php
    function isUrlFrom($url, $host) {
        $url_parts = parse_url($url);
        $val = false;
        // Check if the host is "vimeo.com"
        if (isset($url_parts['host']) && $url_parts['host'] === $host) {
            $val = true;
        }
        
        return $val;
    }




    function getYoutubeUrlID($youtube_url) {
        // Parse the URL
        $url_parts = parse_url($youtube_url);

        // Get the path component (video ID)
        $path = ltrim($url_parts['path'], '/'); // Remove the leading slash

        // Split the path by '/' and get the last part
        $path_parts = explode('/', $path);
        $video_id = end($path_parts);

        return $video_id;
    }




    // youtube_url ...
    function getYoutubeThumbnail($youtubeVideo_url, $cssClass) {

        if (isUrlFrom($youtubeVideo_url, 'youtube.com') || isUrlFrom($youtubeVideo_url, 'youtu.be')) {
            /**
             * Video API created for "Eric Njanga 2023 Portfolio" under Eric Njanga on https://console.cloud.google.com/
             */
            $api_key = 'AIzaSyBOcsJM9ncaPB597YBotud6PFN1P2MIv1g';
            
            // // Extract video ID from the URL
            $video_id = getYoutubeUrlID($youtubeVideo_url);
            
            // Make API request
            $api_url = "https://www.googleapis.com/youtube/v3/videos?part=snippet&id=$video_id&key=$api_key";
            $response = file_get_contents($api_url);
            $data = json_decode($response, true);
            
            // Get thumbnail URLs
            if (sizeof($data['items'])) {
                $thumbnails = $data['items'][0]['snippet']['thumbnails'];
                
                // Choose the desired thumbnail size (e.g., 'medium', 'high', 'maxres')
                $thumbnail_url = $thumbnails['high']['url'];
                
                // Output the thumbnail
                echo '<img class="' . $cssClass . ' img-fluid" src="' . $thumbnail_url . '" alt="YouTube Video Thumbnail">';
            }
        } else {
            echo '<div>Failed to load the image</div>';
        }
        
    }




    // ...
    function getVimeoThumbnail($vimeo_url, $cssClass) {

        if (isUrlFrom($vimeo_url, 'vimeo.com')) {
            /**
             * Video API created for "Stilettosandhammers" under Eric Njanga on https://developer.vimeo.com/
             */
            $vimeoAccessToken = '0a0c0109d1fcc9c5957ba1b7fd6204c0';

            $video_id = substr(parse_url($vimeo_url, PHP_URL_PATH), 1); // Extract video ID

            $api_url = "https://api.vimeo.com/videos/$video_id";
            $access_token = $vimeoAccessToken; // Replace with your actual access token


            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $api_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer ' . $access_token,
                'Accept: application/vnd.vimeo.*+json;version=3.4',
            ]);

            $response = curl_exec($ch);
            curl_close($ch);

            if ($response) {
                $video_data = json_decode($response, true);

                if (isset($video_data['pictures']['sizes'][1]['link'])) {
                    $thumbnail_url = $video_data['pictures']['sizes'][4]['link'];
                    echo '<img class="' . $cssClass . ' img-fluid" src="' . $thumbnail_url . '" alt="Video Thumbnail">';
                } else {
                    echo 'Thumbnail not found';
                }
            } else {
                echo 'Unable to fetch video data';
            }
        } else {
            echo '<div>Failed to load the image</div>';
        }
    }
?>




<?php
    function displayEvent() {
            // Get the current date in 'Y-m-d' format
            $current_date = date('Y-m-d');

            // Get the event start date and time
            $event_start_date = get_post_meta(get_the_ID(), '_EventStartDate', true);
            $event_start_time = get_post_meta(get_the_ID(), '_EventStartDateUTC', true);

            // Get the event cost
            $event_cost = get_post_meta(get_the_ID(), '_EventCost', true);

            // Get the event categories
            $event_categories = get_the_terms(get_the_ID(), Tribe__Events__Main::TAXONOMY);

            // Get the event venue
            $event_venue = get_post_meta(get_the_ID(), '_EventVenueID', true);
            // ...
            $event_start_time_formated1 = $start_datetime = new DateTime($event_start_time);
            $event_start_time_formated2 = $event_start_time_formated1->format('g:i A');


            // Check if the event is in the past 
            $event_is_past = strtotime($event_start_date) < strtotime($current_date);
            $event_status = ($event_is_past) ? 'Past Event' : 'Upcoming Event';
        ?>
            <div class="event <?php echo ($event_is_past) ? 'hasPassed' : ''; ?> bx-container">
                <?php 
                    if ( has_post_thumbnail() ) {
                        $thumbnail_id = get_post_thumbnail_id();
                        $image_url = wp_get_attachment_image_src($thumbnail_id, 'full')[0]; // Get the URL of the full-size image
                    }
                ?>

                <a href="<?php the_permalink(); ?>">
                    <div class="event__image" style="background-image:url(<?php echo $image_url; ?>);"></div>
                    <div class="event__body">    
                        <div class="event__status"><?php echo $event_status; ?></div> 
                        <h3 class="event__title"><?php the_title() ?></h3>   

                        <div class="event__description">
                            <?php
                                $content = apply_filters('the_content', wp_trim_words(get_the_content(), 25));
                                $content = str_replace('<p>', '<p>', $content);
                                echo $content;
                            ?>
                        </div>

                        <?php if (!empty($event_categories)) : ?>
                            <div class="event__categories">
                                <?php foreach ($event_categories as $category) : ?>
                                    <span class="event__categories__item site-badge badge-info">
                                        <?php echo esc_html($category->name); ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <?php
                            if (!empty($event_venue)) {
                                $venue_name = get_the_title($event_venue);
                                ?>
                                    <span class="event__loc">
                                        <svg class="event__loc__icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                        </svg>
                                        <span class="event__loc__text"><?php echo $venue_name; ?></span>
                                    </span>
                                <?php
                            }
                        ?>

                        <ul class="event__time">
                            <li>
                                <span class="event__time__label">Event Date</span>
                                <span class="event__time__text"><?php echo date_i18n('d M, Y', strtotime($event_start_date)); ?></span>
                            </li>
                            <li>
                                <span class="event__time__label">Event Time</span>
                                <span class="event__time__text"><?php echo $event_start_time_formated2; ?></span>
                            </li>
                        </ul>


                        <footer class="event__cta__wrapper">
                            <span class="btn btn-secondary">
                                <span>
                                    <?php
                                        if (!empty($event_cost)) {
                                            echo $event_cost;
                                        } else {
                                            echo 'Free';
                                        }
                                    ?>
                                </span>
                            </span>
                        </footer>
                    </div>
                </a>

            </div>
        <?php
    }
?>







<?php
    // Display the entire section if there is an upcoming event, otherwise, don't show the section at all
    function displayUpcomingEventSection() {
        $args = array(
            'post_type' => 'tribe_events',
            'posts_per_page' => 1,
            'orderby' => 'date',
            'order' => 'DESC',
        );
        
        $latest_event_query = new WP_Query($args);
        
        if ($latest_event_query->have_posts()) {
            $latest_event_query->the_post();
        
            $event_start_date = get_post_meta(get_the_ID(), '_EventStartDate', true);
            $current_time = current_time('timestamp');
        
            // Event is in the future, display its content
            if (!empty($event_start_date) && strtotime($event_start_date) > $current_time) {
                ?>
                    <section class="container">
                        <?php displayEvent(); ?>
                    </section>
                <?php
            }
        
            wp_reset_postdata();
        }    
    }
?>




<?php
    function displayEvents($count = -1) {

        // Calculate the date from 12 months ago from the current date
        $years = 12 * 6;
        $four_year_ago = date('Y-m-d', strtotime('-'.$years.' months'));
        
        // Calculate the date from 12 months ago from the current date
        $one_year_in_the_future = date('Y-m-d', strtotime('+12 months'));

        // Create a custom query to fetch events using WP_Query
        $args = array(
            'post_type'      => 'tribe_events', // The custom post type for events
            'post_status'    => 'publish', // Show only published events
            'posts_per_page' => $count, // Number of events to display (you can adjust this)
            'orderby'        => 'meta_value', // Order events by the event start date
            'meta_key'       => '_EventStartDate', // The meta key for event start date
            'meta_query'     => array(
                array(
                    'key'     => '_EventStartDate',
                    'value'   => array($four_year_ago, $one_year_in_the_future), // Date range from 12 months ago to the current date
                    'compare' => 'BETWEEN',
                    'type'    => 'DATE',
                ),
            ),
        );
    
        $query = new WP_Query($args);
    
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();

                displayEvent();
            }
        } else {
            echo '<p>No event found.</p>';
        }
    
        wp_reset_postdata();
    }
?>




<?php
    function displayMailChimpSubscriptionForm() {
        ?>
            <div id="mc_embed_shell">
                <!-- <link href="//cdn-images.mailchimp.com/embedcode/classic-061523.css" rel="stylesheet" type="text/css"> -->
                <style type="text/css">
                        #mc_embed_signup .optionalParent { margin-top: 10px; }
                        #mc_embed_signup input.mce_inline_error {
                            background-color: #febfbf;
                        }
                        #mc_embed_signup .optionalParent,
                        #mc_embed_signup #mce-responses { margin-top: 10px; }
                        #mc_embed_signup .description { opacity: 0.8; }
                </style>
            <div id="mc_embed_signup">
                <form action="https://karmafinancial.us19.list-manage.com/subscribe/post?u=282e2fbe92a5c972b0b2e48de&amp;id=40363e3fc3&amp;f_id=00128ee4f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
                    <div id="mc_embed_signup_scroll">
                        <p class="description">Stay up to date! Subscribe now and never miss the latest updates from our blog.</p>

                        <div class="mc-field-group"><label for="mce-EMAIL">Email Address <span class="asterisk">*</span></label>
                        <input type="email" class="form-control" name="EMAIL" class="required email" id="mce-EMAIL" required="" value="">
                        <span id="mce-EMAIL-HELPERTEXT" class="helper_text"></span></div>

                        <div id="mce-responses" class="clear foot">
                            <div class="response alert alert-danger" id="mce-error-response" style="display: none;"></div>
                            <div class="response alert alert-success" id="mce-success-response" style="display: none;"></div>
                        </div>

                        <div aria-hidden="true" style="position: absolute; left: -5000px;">
                            /* real people should not fill this in and expect good things - do not remove this or risk form bot signups */
                            <input type="text" name="b_282e2fbe92a5c972b0b2e48de_40363e3fc3" tabindex="-1" value="">
                        </div>

                        <div class="optionalParent">
                            <div class="clear foot">
                                <input type="submit" name="subscribe" id="mc-embedded-subscribe" class="btn btn-secondary" value="Subscribe">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js"></script><script type="text/javascript">(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]=EMAIL;ftypes[0]=merge;,fnames[1]=FNAME;ftypes[1]=merge;,fnames[2]=LNAME;ftypes[2]=merge;,fnames[3]=ADDRESS;ftypes[3]=merge;,fnames[4]=PHONE;ftypes[4]=merge;,fnames[5]=BIRTHDAY;ftypes[5]=merge;,fnames[6]=COMPANY;ftypes[6]=merge;false}(jQuery));var $mcj = jQuery.noConflict(true);</script></div>

        <?php
    }
?>




<?php
    function getPagePermalink($title = '') {
        $page_title = $title; // Replace with the actual page title you want to retrieve the permalink for

        $page = get_page_by_title($page_title); // Get the page object by title
        $permalink = '';

        if ($page) {
            $permalink = get_permalink($page->ID); // Get the permalink from the page object
        }

        return $permalink;
    }
?>




<?php
    function getSubCategoryLink($subCat, $category) {
        return esc_url(get_category_link(get_term_by('slug', $subCat, $category)->term_id));
    }
?>




<?php
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
?>




<?php
    function getField($name) {
        global $post;

        // Get the light theme image URL
        // $field = get_field($name, $post->ID);
        // $value = $field ? $field : 'No '.$name.' found.';

        return get_field($name, $post->ID);
    }
?>




<?php
    function getFieldByID($name, $id) {
        return get_post_meta($id, $name, true);
    }
?>




<?php
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
?>




<?php
    function displayClientLogos($count = -1) {
        $args = array(
            'post_type' => 'client-logo',
            'posts_per_page' => $count,
        );
    
        $query = new WP_Query($args);
    
        if ($query->have_posts()) {
            ?>
                <ul class="grid grid-34567 list-unstyled">
                    <?php
                        while ($query->have_posts()) {
                            $query->the_post();
                            $post_ID = get_the_ID();
                            ?>
                                <li class="">
                                    <?php 
                                        if ( has_post_thumbnail() ) {
                                            the_post_thumbnail( 'full', array( 'itemprop' => 'image', 'class' => 'img-thumbnail rounded-0 mb-10' ) );
                                        }
                                    ?>
                                </li>
                            <?php
                        }
                    ?>
                </ul>
            <?php
        } else {
            ?>
                <p>No client logos found.</p>
            <?php
        }
    }
?>




<?php
    function getFeaturedImage() {
        // Get the current post ID
        $post_id = get_the_ID();

        // Get the featured image URL
        $featured_image_url = get_the_post_thumbnail_url($post_id, 'full');

        // Display the featured image
        if ($featured_image_url) {
            echo '<img src="' . $featured_image_url . '" alt="Featured Image">';
        } else {
            echo 'No featured image available';
        }
    }
?>




<?php
    /**
     * ...
     */
    function getHeroBgImage() {
        return getBackgroundImage_byName('Hero flag image');
    }
?>




<?php
    /**
     * Fetching an image by name and returning it as a CSS background image rule
     */
    function getBackgroundImage_byName($imgName) {
        $image_name = $imgName;
        $background_img = '';

        // Search for an image by title
        $attachment = get_page_by_title($image_name, OBJECT, 'attachment');

        // If the attachment is found
        if ($attachment instanceof WP_Post) {
            $image_url = wp_get_attachment_url($attachment->ID);
            $image_alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);

            if ($image_url) {
                $background_img = "background-image: url($image_url)";
            }
        }

        return $background_img;
    }
?>




<?php
    /**
     * ..
     */
    function getImage_byName($imgName, $cssClass) {
        $image_name = $imgName;
        $image = '';

        // Search for an image by name
        $attachment = get_page_by_title($image_name, OBJECT, 'attachment');

        if ($attachment) {
            $attachment_id = $attachment->ID;

            // Get the image URL
            $image_url = wp_get_attachment_url($attachment_id);

            // Display the image
            $image = '<img class="' .$cssClass. '" src="' . $image_url . '" alt="Icon Quote">';
        }

        return $image;
    }
?>




<?php
    function latestPostTitles($listClass = '', $category_slug = '', $count = 5) {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $count,
            'category_name' => $category_slug,
        );

        $query = new WP_Query( $args );

        if ( $query->have_posts() ) :
            ?>
                <ul class="<?php echo $listClass; ?>">
                    <?php 
                        while ( $query->have_posts() ) {
                            $query->the_post(); 
                    ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php 
                        }
                    ?>
                </ul>
            <?php
            wp_reset_postdata();
        else :
            echo 'No posts found.';
        endif;
    }
?>






<?php
    function displayPost() {
        // Fetching video thumbnails
        $vimeo_video_url = getField('video_url');
        $youtube_video_url = getField('youtube_video_url');

        $cssClass = ''; 
        if (empty($vimeo_video_url) && empty($youtube_video_url)) {
            $cssClass = 'vlog-item--text'; 
        } else {
            $cssClass = 'vlog-item--video'; 
        }

        ?>
            <div class="bx-container">
                <article class="vlog-item <?php echo $cssClass; ?>">
                    <?php $categories = get_the_category(); ?>

                    <a href="<?php the_permalink(); ?>">


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
                                    <?php
                                        getYoutubeThumbnail($youtube_video_url, 'vlog-item__img');
                                    ?>
                                </span>
                                <?php
                            }
                        ?>



                        <h3 class="vlog-item__title">
                            <?php the_title(); ?>
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
                                    $content = apply_filters('the_content', wp_trim_words(get_the_content(), 25));
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
?>




<?php
    function fetchBrandFeatures($gridClass  = '', $category_slug = '', $count = 5, $addMore = false, $content_text_size = 20) {
        $args = array(
            'post_type' => 'brand-feature',
            'posts_per_page' => $count,
            'category_name' => $category_slug,
        );

        // Inforce default value adoption on all parameters
        // (this doesn't seem to work during the function's declaration)
        if ($gridClass === null) {
            $gridClass = '';
        } 

        $imageSize = 'medium';

        $query = new WP_Query( $args );

        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post(); 
                ?>
                    <div class="brand-feature">
                        <a href="#">
                            <div>
                                <?php echo getField('status'); ?>
                            </div>
                            <h3>
                                <?php the_title(); ?>
                            </h3>

                            <p>
                                <?php
                                    echo wp_trim_words(get_the_content(), 13);
                                ?>
                            </p>

                            <div>
                                <?php echo getField('cta_text'); ?>
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
?>




<?php
    function latestPosts($gridClass  = '', $category_slug = '', $count = 5, $addMore = false, $content_text_size = 20) {
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $count,
            'category_name' => $category_slug,
        );

        // Inforce default value adoption on all parameters
        // (this doesn't seem to work during the function's declaration)
        if ($gridClass === null) {
            $gridClass = '';
        } 

        $imageSize = 'medium';

        $query = new WP_Query( $args );

        if ( $query->have_posts() ) {
            ?>
                <ul class="<?php echo $gridClass; ?> list-unstyled">
                    <?php
                        while ( $query->have_posts() ) {
                            $query->the_post(); 
                            ?>
                                <li>
                                    <?php
                                        displayPost($content_text_size);
                                    ?>
                                </li>
                            <?php 
                        }
                       
                    ?>
                </ul>
            <?php
            wp_reset_postdata();
        } else {
            echo 'No posts found.';
        }
    }
?>





<?php
    function displayTestimonial(
        $gridClass  = '', 
        $count = -1
    ) {
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
        $attachment = get_page_by_title($attachment_title, OBJECT, 'attachment');
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
                            <li>
                                <article class="testimonial <?php echo $currentThemeClass; ?>">
                                    <?php echo $quote_img; ?>
                                   
                                    <div class="testimonial__body">
                                        <?php 
                                            the_content(); 
                                        ?>
                                    </div>
                                    <footer class="testimonial__footer">
                                        <div class="testimonial__name"><?php the_title() ?></div>
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
?>





<?php
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
?>




<?php
    function getCurrentPageSlug() {
        global $post;
        $page_slug = '';

        if ($post) {
            $page_slug = $post->post_name;
        }

        return $page_slug;
    }
?>




<?php
    function getCurrentPageTitle() {
        global $post;
        $page_title = '';

        if ($post) {
            $page_title = get_the_title($post);
        }

        return $page_title;
    }
?>




<?php
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
?>