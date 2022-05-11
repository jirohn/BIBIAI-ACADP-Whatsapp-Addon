jQuery(document).ready(function($) {          //wrapper
    $('.acadp-listing-form-submit-btn').click(function() { 
        var value = $('.bawa-whatsapp').val();           //event
        $.ajax({
            url: ajaxurl, // Since WP 2.8 ajaxurl is always defined and points to admin-ajax.php
            data: {
                'action':'bawa_save_whatsapp_status', // This is our PHP function below
                'value' : value // This is the variable we are sending via AJAX
            },
            success:function(data) {
        // This outputs the result of the ajax request (The Callback)
                window.alert(data);
            },  
            error: function(errorThrown){
                window.alert(errorThrown);
            }
        });   
    });
    });