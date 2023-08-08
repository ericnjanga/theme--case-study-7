
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
    function getVimeoThumbnail($video_url, $cssClass) {
        /**
         * Video API created for "Stilettosandhammers" under Eric Njanga on https://developer.vimeo.com/
         */
        $vimeoAccessToken = '0a0c0109d1fcc9c5957ba1b7fd6204c0';

        $video_id = substr(parse_url($video_url, PHP_URL_PATH), 1); // Extract video ID

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
                $thumbnail_url = $video_data['pictures']['sizes'][3]['link'];
                echo '<img class="' . $cssClass . ' img-fluid" src="' . $thumbnail_url . '" alt="Video Thumbnail">';
            } else {
                echo 'Thumbnail not found';
            }
        } else {
            echo 'Unable to fetch video data';
        }
    }
?>






<?php
    function displayEvents($count = -1) {
        // Get the current date in 'Y-m-d' format
        $current_date = date('Y-m-d');

        // Calculate the date from 12 months ago from the current date
        $one_year_ago = date('Y-m-d', strtotime('-12 months'));
        
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
                    'value'   => array($one_year_ago, $one_year_in_the_future), // Date range from 12 months ago to the current date
                    'compare' => 'BETWEEN',
                    'type'    => 'DATE',
                ),
            ),
        );
    
        $query = new WP_Query($args);
    
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();

                // Get the event start date and time
                $event_start_date = get_post_meta(get_the_ID(), '_EventStartDate', true);
                $event_start_time = get_post_meta(get_the_ID(), '_EventStartDateUTC', true);


                // Check if the event is in the past
                $event_is_past = strtotime($event_start_date) < strtotime($current_date);

                ?>
                    <div class="event-item">
                        <figure>
                            <?php 
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail( 'full', array( 'itemprop' => 'image', 'class' => 'img-thumbnail rounded-0 p-0 bg-accent border-0 mb-10' ) );
                                }
                            ?>
                            <figcaption>
                                <div class="event-text text-center">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if ($event_is_past) : ?>
                                            <div>Event closed</div>
                                        <?php endif; ?>

                                        <b><?php the_title() ?></b> <!-- Wrap the title in an anchor tag -->

                                        <p><strong>Event Date:</strong> <?php echo $event_start_date; ?></p>
                                        <p><strong>Event Time:</strong> <?php echo $event_start_time; ?></p>

                                        <?php
                                            $content = apply_filters('the_content', get_the_content());
                                            $content = str_replace('<p>', '<p class="fs-7">', $content);
                                            echo $content;
                                        ?>
                                    </a>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                <?php
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





    function display_learn_more_box($class='', $text='', $ctaText='', $ctaLink='') {
        // ...
        $image_title = 'award - transparent 3';
        // $image_title = 'award - 2013 – Rookie of the Year Award';
        $image = get_page_by_title($image_title, OBJECT, 'attachment');
        $imageSize = 'medium';

        if ($image) {
            $image_attributes = wp_get_attachment_image_src($image->ID, $imageSize);
            $image_markup = wp_get_attachment_image($image->ID, $imageSize);

            // Add the desired classes to the image markup
            $image_markup = str_replace('class="', 'class="img-fluid award-img ', $image_markup);

            ?>
                <div class="<?php echo $class; ?> box-learn-more text-center bx-container">
                    <figure class="award-figure box-learn-more__bg-wrapper">
                        <div class="award-figure-wrapper transparent box-learn-more__bg">
                            <div class="award-learn-more box-learn-more__content">
                                <p><?php echo $text; ?></p>
                                <hr>
                                <a href="<?php echo $ctaLink; ?>" class="btn btn-secondary">
                                    <?php echo $ctaText; ?>
                                </a>
                            </div>

                            <?php echo $image_markup; ?>
                        </div>
                        <figcaption class="award-caption box-learn-more__caption fs-7">Placeholder txt meant to create space</figcaption>
                    </figure>
                </div>
            <?php
        }
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
        $field = get_field($name, $post->ID);
        $value = $field ? $field : 'No '.$name.' found.';

        return $value;
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
                    <figure>
                        <?php 
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail( 'full', array( 'itemprop' => 'image', 'class' => 'img-thumbnail rounded-0 p-0 bg-accent border-0 mb-10' ) );
                            }
                        ?>
                        <figcaption>
                            <div class="employee-text text-center">
                                <b><?php the_title() ?></b>
                                <?php
                                    $content = apply_filters('the_content', get_the_content());
                                    $content = str_replace('<p>', '<p class="fs-7">', $content);
                                    echo $content;
                                ?>
                            </div>
                        </figcaption>
                    </figure>
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
    function displayHeroImages($cssClass) {
        global $post;

        // Get the light theme image URL
        $image1 = get_field('image_1', $post->ID);
        $image2 = get_field('image_2', $post->ID);
        $image3 = get_field('image_3', $post->ID);
        // $text_image1 = get_field('image_text_theme', $post->ID); 
        // Display the hero images
        if ($image1) {
            ?>
            <section class="banner">
                <div class="img1 <?php echo $cssClass; ?>" style="background-image: url(<?php echo $image1["url"]; ?>);"></div>
                <div class="img1 <?php echo $cssClass; ?>" style="background-image: url(<?php echo $image2["url"]; ?>);"></div>
                <div class="img1 <?php echo $cssClass; ?>" style="background-image: url(<?php echo $image3["url"]; ?>);"></div>
            </section>
            <?php
        } else {
            ?>
            <p>No hero images found.</p>
            <?php
        }
    }
?>


<?php
    function displayFieldIcon($id, $eltClass='') {
        $icon = get_field('icon', $id);
        if ($icon) {
        ?>
            <img class="<?php echo $eltClass; ?>" src="<?php echo $icon; ?>">
        <?php
        }
    }
?>



<?php
    function displayServicesExcerpts(
        $gridClass  = '', 
    ) {
        // Inforce default value adoption on all parameters
        // (this doesn't seem to work during the function's declaration)
        if ($gridClass === null) {
            $gridClass = '';
        } 

        global $post;
        // Get the parent page ID
        $parent_page = get_page_by_path('services');
        $parent_page_id = $parent_page->ID;

        // Retrieve the child pages of the parent page
        $child_pages = get_pages(array(
            'child_of' => $parent_page_id,
            'sort_column' => 'menu_order',
        ));

        // Display the titles and excerpts of the child pages
        if ($child_pages) {
            ?>
                <ul class="<?php echo $gridClass; ?> list-unstyled">
                    <?php foreach ($child_pages as $child_page) { ?>
                        <li>
                            <article class="card card-primary card-padd30 bdr-no-radius bdr-none">
                                <div class="card-header bdr-no-bottom no-bg">
                                    <?php displayFieldIcon($child_page->ID, 'card-header-icon'); ?>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <?php
                                            // Check if the child page is not the same as the current page
                                            $child_page_url = get_permalink($child_page->ID);
                                        ?>
                                    </div>
                                    <h3 class="card-title">
                                        <a class="km-link-primary" href="<?php echo $child_page_url; ?>">
                                            <?php echo $child_page->post_title; ?>
                                        </a>
                                    </h3>
                                    <?php 
                                        // Retrieve and display the excerpt custom field
                                        $excerpt = get_field('excerpt', $child_page->ID);
                                        if ($excerpt) {
                                            echo '<p class="card-text">' . $excerpt . '</p>';
                                        }
                                    ?>
                                    <a href="<?php echo $child_page_url; ?>" class="btn btn-secondary btn-sm">Learn more</a>
                                </div>
                            </article>
                        </li>
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
                                    <article>
                                        <?php $categories = get_the_category(); ?>

                                        <a class="km-link-primary" href="<?php the_permalink(); ?>">
                                            <?php
                                                $video_url = getField('video_url');
                                                getVimeoThumbnail($video_url, 'entry-img');
                                            ?>
                                        </a>

                                        <?php if ( ! empty( $categories ) ) : ?>
                                            <p class="pre-title heading-ff">
                                                <a class="km-link-secondary" href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ); ?>">
                                                    <?php echo esc_html( $categories[0]->name ); ?>
                                                </a>
                                            </p>
                                        <?php endif; ?>

                                        <a class="km-link-primary" href="<?php the_permalink(); ?>">
                                            <h3>
                                                    <?php the_title(); ?>
                                            </h3>
                                            <p><?php echo wp_trim_words(get_the_content(), $content_text_size); ?></p>
                                        </a>
                                    </article>
                                </li>
                            <?php 
                        }
                        if ($addMore == true) {
                            $link_blog = getPagePermalink('blog');
                            ?>
                                <li>
                                    <?php
                                        display_learn_more_box('', 'New resources added monthly.', 'More articles', $link_blog);
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
        $count = -1, 
        $addMore = false
    ) {
        // Inforce default value adoption on all parameters
        // (this doesn't seem to work during the function's declaration)
        if ($gridClass === null) {
            $gridClass = '';
        } 
        if ($count === null) {
            $count = -1;
        } 
        if ($addMore === null) {
            $addMore = false;
        } 
        // Default values enforcement


        $args = array(
            'post_type' => 'testimonial',
            'posts_per_page' => $count,
        );
        $imageSize = 'medium';
    
        $query = new WP_Query($args);
    
        if ($query->have_posts()) {
            ?>
            <ul class="<?php echo $gridClass; ?> list-unstyled">
                <?php
                    while ($query->have_posts()) {
                        $query->the_post();
                        ?>
                            <li>
                                <article class="testimonial card card-primary card-padd30 has-quote bdr-none dpw1">
                                    <div class="card-header d-flex bdr-no-bottom no-bg">
                                        
                                        <svg xmlns="http://www.w3.org/2000/svg" class="card-header-icon" height="48" viewBox="0 -960 960 960" width="48"><path d="M626-533q22.5 0 38.25-15.75T680-587q0-22.5-15.75-38.25T626-641q-22.5 0-38.25 15.75T572-587q0 22.5 15.75 38.25T626-533Zm-292 0q22.5 0 38.25-15.75T388-587q0-22.5-15.75-38.25T334-641q-22.5 0-38.25 15.75T280-587q0 22.5 15.75 38.25T334-533Zm146 272q66 0 121.5-35.5T682-393h-52q-23 40-63 61.5T480.5-310q-46.5 0-87-21T331-393h-53q26 61 81 96.5T480-261Zm0 181q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-400Zm0 340q142.375 0 241.188-98.812Q820-337.625 820-480t-98.812-241.188Q622.375-820 480-820t-241.188 98.812Q140-622.375 140-480t98.812 241.188Q337.625-140 480-140Z"/></svg>

                                        <div class="d-flex flex-column mr-15">
                                            <?php
                                                $job_title = getFieldByID('job_title', get_the_ID());
                                                if (!empty($job_title)) {
                                                    echo '<span class="fs-7">' . $job_title . '</span>';
                                                }
                                            ?>
                                        </div>

                                        <?php //displayFieldIcon($child_page->ID); ?>
                                    </div>
                                    <div class="card-body">
                                        <div class="quote">
                                            <?php 
                                                // // Add a custom class ...
                                                // $content = get_the_content();
                                                // $content_with_class = '<p class="quote">' . $content . '</p>';
                                                // echo $content_with_class;
                                                the_content(); 
                                            ?>

                                            <footer>
                                                <b class="fs-5 heading-ff"><?php the_title() ?></b>
                                            </footer>
                                        </div>
                                    </div>
                                </article>
                            </li>
                        <?php
                    }

                    if ($addMore == true) {
                            $link_testimonials = getPagePermalink('testimonials');
                        ?>
                            <li>
                                <?php
                                    display_learn_more_box('testimonial', 'More happy customers have spoken.', 'More testimonials', $link_testimonials);
                                ?>
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
    function displayAward(
        $gridClass  = '', 
        $count      = -1, 
        $addMore    = false, 
        $colorClass = 'transparent'
    ) {
        // Inforce default value adoption on all parameters
        // (this doesn't seem to work during the function's declaration)
        if ($gridClass === null) {
            $gridClass = '';
        } 
        if ($count === null) {
            $count = -1;
        } 
        if ($addMore === null) {
            $addMore = false;
        } 
        if ($colorClass === null) {
            $colorClass = 'transparent';
        }
        // Default values enforcement

        $args = array(
            'post_type' => 'award',
            'posts_per_page' => $count,
        );
        $imageSize = 'medium';
    
        $query = new WP_Query($args);
        ?>
            <div class="bx-container">
                <div class="<?php echo $gridClass; ?> awards-container">
                    <?php
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                ?>
                                    <section class="award bx-container">
                                        <figure class="award-figure">
                                            <div class="award-figure-wrapper <?php echo $colorClass; ?>">
                                                <?php if (has_post_thumbnail()) { 
                                                    the_post_thumbnail($imageSize, ['class' => 'img-fluid award-img']);
                                                } ?>
                                            </div>
                                            <figcaption class="award-caption fs-7"><?php the_title(); ?></figcaption>
                                        </figure>
                                    </section>
                                <?php
                            }

                            if ($addMore == true) {
                                $link_awards = getPagePermalink('awards');
                                display_learn_more_box('award', 'We have received more awards.', 'More awards', $link_awards);
                            }
                        } else {
                            echo '<p>No awards found.</p>';
                        }
                    ?>
                </div>
            </div>
        <?php
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