/**
 * Toggle parent class each time the button is clicked
 * ------------------
 */
jQuery(document).ready(function ($) {
    let $btn = $('#site-btn-sidebar-toggle');
    let flagOpen = 'sidebar-is-open';
    let $container = $('.site-global-container');

    $btn.on('click', function () {
        console.log('....');
        $container.toggleClass(flagOpen);
        if ($container.hasClass(flagOpen)) {
            $btn.removeClass('is-off').addClass('is-on');
        } else {
            $btn.removeClass('is-on').addClass('is-off');
        }
    });
});

