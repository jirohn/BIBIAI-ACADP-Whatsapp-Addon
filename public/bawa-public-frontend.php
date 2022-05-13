<?php



function bawa_show_whatsapp_button(){

    $posttype = get_post_type(get_the_ID(  ));
    $fieldid = get_option('bawa_custom_field_id');

    if( $posttype == 'acadp_listings') {
        
        $fieldvalue = get_post_meta(get_the_ID(), $fieldid, true);
        if($fieldvalue == 'Si'){

            ?>

            <script>
                jQuery(document).ready(function($){
                    var texto = 'Hola%21%21%20He%20visto%20tu%20anuncio%20en%20<?php echo get_site_url() ?>%20me%20gastar%C3%ADa%20obtener%20mas%20informaci%C3%B3n%21';
                    var number = $('.acadp-phone-number').children('a').text();
                    $('.acadp-field-checkbox').replaceWith('<button id="bawa-whatsapp" class="whatsapp button btn btn-primary">Enviar Whatsapp</button>');
                    $('#bawa-whatsapp').click( function (){
                        
                    window.open("https://api.whatsapp.com/send/?phone=34"+number+"&text="+texto, "_blank");
                })   
                });          //wrapper

 
        

            </script>
        
        
        <?php
        }
    }
}



add_action('wp_footer', 'bawa_show_whatsapp_button'); 
//add_action( 'init', 'bawa_show_whatsapp_button' );

function bawa_show_post_details(){

    $thispost = get_the_ID();
    $post = get_post($thispost);
    $details = get_post_field('post_content', $post);
    return '<div id="details" class="text">DETALLES: '. $details . '</div>';

}
add_shortcode('show_post_details', 'bawa_show_post_details');

?>