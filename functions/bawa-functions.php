<?php

function bawa_add_post_to_acadp(){

    
    // Create post object
    $my_post = array(
      'post_title'    => 'whatsapp',
      'post_content'  => '',
      'post_status'   => 'publish',
      'post_author'   => get_current_user(),
      'post_type'     => 'acadp_fields',
    );
     
    // añadiendo el post Whatsapp como Custom field en acadp
    $exist = get_posts( $my_post );
    if($exist != null){
        return;
    }
    $result = wp_insert_post( $my_post );

    if ( $result && ! is_wp_error( $result ) ) {
        $post_id = $result;
        /**
         * añadiendo meta al post si se añade correctamente
         */
        bawa_add_meta_to_acadp($post_id);

    }
    
}
function bawa_add_meta_to_acadp($postid){



   
    // Crear objetos del custom field ACADP
    update_post_meta( $postid, '_wp_desired_post_slug', 'whatsapp' );
    update_post_meta( $postid, 'associate', 'form' );
    update_post_meta( $postid, 'searchable', '1' );
    update_post_meta( $postid, 'required', '1' );
    update_post_meta( $postid, 'required', '1' );
    update_post_meta( $postid, 'order', 'o' );
    update_post_meta( $postid, 'type_search', '' );
    update_post_meta( $postid, 'listings_archive', '1' );
    update_post_meta( $postid, 'default_value', 'No' );
    update_post_meta( $postid, 'choices', 'Si' );
    update_post_meta( $postid, 'instructions', 'Usas whatsapp?' );
    update_post_meta( $postid, 'type', 'checkbox' );

    update_option('bawa_custom_field_id', $postid);
    // objetos insertados en el post


}
?>