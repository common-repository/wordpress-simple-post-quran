<?php /*

Plugin Name: Wordpress Simple Post Quran
Plugin URI: http://pashamahardika.co.cc/2009/02/13/wordpress-simple-post-quran/
Version: 0.1
Description: Allow you to embed Al-Quran to your post
Author: Pasha Mahardika
Author URI: http://pashamahardika.co.cc

*/

# Nothing to see here! Please use the plugin's options page. You can configure everything there.
	

	
	// Initialization stuff
	function myplugin_addbuttons() {
		// Don't bother doing this stuff if the current user lacks permissions
		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
			return;
	 
		// Add only in Rich Editor mode
		if ( get_user_option('rich_editing') == 'true') {
			add_filter("mce_external_plugins", "add_myplugin_tinymce_plugin");
			add_filter('mce_buttons', 'register_myplugin_button');
		}
	}
	 
	function register_myplugin_button($buttons) {
		array_push($buttons, "separator", "postquran");
		return $buttons;
	}
	 
	// Load the TinyMCE plugin : editor_plugin.js (wp2.5)
	function add_myplugin_tinymce_plugin($plugin_array) {
		global $folder;
		$plugin_array['postquran'] = $folder.'editor_plugin.js';
		//print_r($plugin_array);
		return $plugin_array;
	}
	$siteurl = get_option('siteurl');
	$folder = $siteurl.'/wp-content/plugins/wordpress-simple-post-quran/'; // You shouldn't need to change this ;)

	add_action('init', 'myplugin_addbuttons');
	
?>