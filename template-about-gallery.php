<?php
    /*
    Template Name: About > Gallery
    */ 
    get_header();
?>

<?php
    // HERO -----
    // Fetching hero's background image.
    $hero_background_img = getHeroBgImage();
?>
<header class="hero bottom-section-spacer" role="region" style="<?php echo $hero_background_img; ?>;">
    <div class="container">
        <div class="text-wrapper">
            <h1 class="hero-title"><?php echo getField('optional_title'); ?></h1>
            <section class="breadcrumb">
                <?php displayBreadcrumbs(); ?>
            </section>
            <?php edit_post_link(); ?>
        </div>
    </div>
</header>

<main class="main-content-wrapper container" role="main">
    <header> 
        <h2 class="section-title title-spacer">
            <?php echo getField('optional_subtitle'); ?>
        </h2>
    </header> 


    <?php 
        /**
         * Extracts image data such as URLs, dimensions, and alt text from a list of 
         * image names using Advanced Custom Fields, storing them in an array of image objects.
         * ------------------------------
         */
        $arr_images = ['image_1', 'image_2', 'image_3', 'image_4', 'image_5', 'image_6', 'image_7', 'image_8', 'image_9'];
        $arr_img = []; // Initialize the array to store image objects

        foreach ($arr_images as $image) {
            // ...
            $img = get_field($image);
            if ($img) {
                // Get the image sizes
                $image_sizes = $img['sizes'];
        
                // Get the width and height of the large-sized image
                $large_width = $image_sizes['large-width'];
                $large_height = $image_sizes['large-height'];

                // Create an image object
                $image_obj = [
                    'xxl_url' => $image_sizes['large'],
                    'small_url' => $image_sizes['gallery-thumb'],
                    'alt_text' => $img['alt'],
                    'large_width' => $large_width,
                    'large_height' => $large_height,
                    // Add more properties as needed
                ];

                // Push the image object into $arr_img
                $arr_img[] = $image_obj;
            }
        }

    ?>


    <div class="js-photo-gallery masonry">
        <?php
            /**
             * Generates HTML anchor elements with responsive images linked to their original 
             * versions while storing their dimensions for use in a lightbox gallery.
             * ------------------------------
             */
            foreach ($arr_img as $img) {
            ?>
                <a class="item" href="<?php echo $img['xxl_url']; ?>" 
                    data-pswp-width="<?php echo $img['large_width']; ?>" 
                    data-pswp-height="<?php echo $img['large_height']; ?>">
                    <img src="<?php echo $img['small_url']; ?>" class="img-fluid" alt="" />
                </a>
            <?php
            }
        ?>
    </div>
</main>


<?php get_footer(); ?>