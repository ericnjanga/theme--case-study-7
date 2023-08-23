








// alert('-----///////');

jQuery(function($){
    var page = 3; // Initial page number
    var loading = false;
    var $content = $('.js-loead-moreposts-container'); // Change this to your content container
    var $loadMoreMessage = $('.loadmore__message');
    var $noMorePostsMessage = $('<p class="no-more-posts">No more posts to display.</p>').hide();

    function loadMorePosts() {


        console.log('------> loadMorePosts ');




        if (loading) {
            return;
        }
        loading = true;

        $.ajax({
            url: my_ajax_obj.ajax_url, // Use the localized ajax_url
            type: 'post',
            data: {
                action: 'load_more_posts',
                page: page,
            },
            success: function(response) {
                if (response) {
                    // $content.append(response);

                    var $newPosts = $(response).hide(); // Hide the new posts initially
                    $content.append($newPosts);
                    $newPosts.fadeIn(); // Apply fade-in effect
                    page++;


                    console.log('------> response = ', response.trim() == '');


                    console.log('---+++++' );

                    page++;

                } else {
                    console.log('------> ???????? ' );



                    $loadMoreMessage.text('No more posts to display.');

                    console.log($loadMoreMessage.length);
                    // $noMorePostsMessage.fadeIn(); // Display the no more posts message
                }
                loading = false;
            }
        });
    }

    $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() >= $content.height() - 200) {
            loadMorePosts();
        }
    });
});
