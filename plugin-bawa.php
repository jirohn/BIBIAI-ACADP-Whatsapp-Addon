<?php
/**
 * Plugin Name:       BAWA Bibiai ACADP Whatsapp AddOn
 * Description:       Añade el campo Whatsap y boton enviar whatsapp a los anuncios con el plugin Advanced Clasified & directory Pro
 * Version:           0.0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Pablo Reyes for Bibiai
 * License:           GPL v2 or later
 */

/**
 * Activate the plugin.
 */


function pluginprefix_activate() { 
    bawa_add_post_to_acadp();
}
register_activation_hook( __FILE__, 'pluginprefix_activate' );


/**
 * Deactivation hook.
 */
function pluginprefix_deactivate() {

}
register_deactivation_hook( __FILE__, 'pluginprefix_deactivate' );

if ( is_admin() ) {
    // we are in admin mode
    include __DIR__ . '/functions/bawa-functions.php';
}else{
    // Estamos en modo publico
    include __DIR__ . '/public/bawa-public-frontend.php';
}?>