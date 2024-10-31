<?php
/*
Plugin Name: Page Size Checker 
Plugin URI: http://seorankanalyser.com/
Description: Page Size Checker will help you to findout exact size of web page (including text and images) that loads in user computer. It is very helpful to manage bandwidth, page loading time and content management.  
Version: 1.0
Author: SEORankAnalyser.com
Author URI: http://seorankanalyser.com
License:  GPL2 or later
. 
.
*/
set_time_limit(120);

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



add_action( 'admin_menu', 'pagesizechecker_plugin_menu' );

function pagesizechecker_plugin_menu() {
	
    add_menu_page(__('Page Size Checker','menu-pagesizechecker'), __('Page Size Checker','menu-pagesizechecker'), 'manage_options', 'pagesizechecker_plugin_pagelist', 'pagesizechecker_plugin_pagelist' , plugin_dir_url( __FILE__ ) .'assets/images/logo.png');

    

}


function pagesizechecker_plugin_pagelist() {
	
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}

	require_once('sizechecker-all-pagelink.php');
}



?>
