jQuery( document ).ready(function($){

    // Removing comments form "novalidate" attribute
    $('#commentform').removeAttr('novalidate');

    // Playing with cocktails Card
    $('.awesomedrink-card').click(function() {
        var current_details = $(this).next('.awesomedrink-card_details');
        current_details.toggleClass('hide');
        var current_close_button = current_details.find('span.close_box');
        current_close_button.click(function() {
            current_details.addClass('hide');
        });
    });
});


