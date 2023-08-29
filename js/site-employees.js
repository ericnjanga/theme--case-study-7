






jQuery(function($) {

    var $dialog = $('#employeeModal');

    // Checks if element is the target of an event ...
    function IsEventTarget(event, CssClass) {
        var targetElement = event.target;

        // Check if the target element or its ancestors have the class CssClass
        var hasClass = false;
        $(targetElement).parents().addBack().each(function() {
            if ($(this).hasClass(CssClass)) {
                hasClass = true;
                return false; // Break the loop
            }
        });
        return hasClass;
    }

    // Closing dialog ...
    $(document).on('click', function(event) { // -> When clicking outside ...
        if (!IsEventTarget(event, 'employee__cta-modal') && $dialog[0].open) {
            $dialog[0].close();
            document.body.classList.remove('modal-open'); // Enable scrolling
        }
    });
    $('#closeDialog').click(function() { // -> When clicking on the closing button ...
        var dialog = document.getElementById('employeeModal');
        dialog.close(); // Close the dialog
        document.body.classList.remove('modal-open'); // Enable scrolling
    });

    // Opening the dialog ... 
    // (and loading dialog content from employee hidden content)
    $('.employee__cta-modal').click(function() {
        $dialog.find('.dialog-content').html($(this).next('.employee__bio').html());
        $dialog[0].showModal(); // Open the dialog
        document.body.classList.add('modal-open'); // Prevent scrolling
    });
});


