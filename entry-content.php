

<div style="background: turquoise; padding: 20px;">
    <div class="entry-content" itemprop="mainEntityOfPage">

        <?php
            /**
             * Render vimeo video player if the video url has been provided
             * -----------------
             */
            $vimeo_video_url = getField('video_url'); // Video URL
            $youtube_video_url = getField('youtube_video_url');

            if (!empty($vimeo_video_url)) {
                $video_embed = wp_oembed_get($vimeo_video_url); // Get the oEmbed HTML for the video
                ?>
                    <figure class="wp-block-embed is-type-video is-provider-vimeo wp-block-embed-vimeo wp-embed-aspect-16-9 wp-has-aspect-ratio">
                        <div class="wp-block-embed__wrapper">
                            <?php
                                echo $video_embed; // Output the video embed code
                            ?>
                        </div>
                    </figure>
                <?php
            }
            else if (!empty($youtube_video_url)) {
                 
                // Extract video ID from the URL
                $video_id = getYoutubeUrlID($youtube_video_url);
            
                // If video ID is found, render the YouTube player
                if (!empty($video_id)) {
                    echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . esc_attr($video_id) . '" frameborder="0" allowfullscreen></iframe>';
                } 
            }
        ?>



        <?php if ( has_post_thumbnail() ) : ?>
        <a href="<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full', false ); echo esc_url( $src[0] ); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) ); ?></a>
        <?php endif; ?>
        <meta itemprop="description" content="<?php echo esc_html( wp_strip_all_tags( get_the_excerpt(), true ) ); ?>" />
        <?php the_content(); ?>
        <div class="entry-links"><?php wp_link_pages(); ?></div>
    </div>

</div>




