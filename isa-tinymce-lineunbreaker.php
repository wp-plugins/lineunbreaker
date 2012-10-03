<?php
/*
Plugin Name: Lineunbreaker
Plugin URI: http://wordpress.org/extend/plugins/lineunbreaker/ 
Description: Removes line breaks from selected text in visual editor.
Version: 1.0
Author: dc5ala
License: GPL2
*/

/*  Copyright 2012  Andre Lohan  (email : dc5ala@darc.de)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function isa_tinymce_lineunbreaker_plugin( $plugins ) {
	//$mce_plugin = plugins_url( '/editor_plugin_src.js', __FILE__ ); // For development
	$mce_plugin = plugins_url( '/editor_plugin.js', __FILE__ );
	$plugins['lineunbreaker'] = $mce_plugin;

	return $plugins;
}

// For WYSYWIG editor TinyMCE
function isa_tinymce_lineunbreaker_buttons( $buttons ) {
	array_push( $buttons, 'separator', 'lineunbreak' );

	return $buttons;
}

function isa_tinymce_lineunbreaker_init() {
	if ( get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'isa_tinymce_lineunbreaker_plugin', 999 );
		add_filter( 'mce_buttons', 'isa_tinymce_lineunbreaker_buttons', 999 );
	}	
}
add_action( 'init', 'isa_tinymce_lineunbreaker_init' );

// For HTML view add button to quicktags
function isa_qtags_lineunbreaker_buttons() {
	wp_enqueue_script( 'lineunbreaker_qtags', plugins_url( 'lineunbreaker_qtags.js', __FILE__ ), array( 'jquery', 'quicktags' ) );
}
add_action( 'admin_enqueue_scripts', 'isa_qtags_lineunbreaker_buttons' );

?>
