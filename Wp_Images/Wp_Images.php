<?php
/*
Plugin Name: Wp_Images
Plugin URI: https://www.google.com/
Description: A simple asignment project plugin for uploading images on WordPress.
Author: Arpan Patil
Author URI: https://www.google.com/
Version: 0.0.1
*/

if ( ! defined( 'ABSPATH' ) ) {
	die(); //Die if direct ascess
}

//Activation hook
function Wp_Images_activhock(){
	global $wpdb,$table_prefix;
	$table_name=$table_prefix.'wpimages';

    //create database for images
	$q="CREATE TABLE `bitnami_wordpress`.`$table_name` ( `id` INT(3) NOT NULL AUTO_INCREMENT , `imagename` VARCHAR(111) NOT NULL , `imgpath` VARCHAR(111) NOT NULL , `shortcode` VARCHAR(111) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
	$wpdb->query($q);
}
register_activation_hook(__FILE__,'Wp_Images_activhock');

//Deactivation hook
function Wp_Images_deactivhock(){
	global $wpdb,$table_prefix;
	$table_name=$table_prefix.'wpimages';

    //removing database
	$q="DROP TABLE `$table_name`;";
	$wpdb->query($q);
}
register_deactivation_hook(__FILE__,'Wp_Images_deactivhock');

function Wp_Imades_MenuHome_Calback(){
    include 'includes/homemenu.php';
}
function Wp_Imades_Menu_add_Calback(){
	include 'includes/addmenu.php';
}
// admin Menu
function Wp_ImagesMenu(){
    $dir=plugin_dir_url(__FILE__);

	add_menu_page('Wp_Images_Plugin_Id1','Wp Images','manage_options','Wp_Imades_Slug','Wp_Imades_MenuHome_Calback',$dir.'assets/icon.png',13);	

	add_submenu_page('Wp_Imades_Slug','Wp_Images_Plugin_Id','All Images','manage_options','Wp_Imades_Slug','Wp_Imades_MenuHome_Calback');

	add_submenu_page('Wp_Imades_Slug','Wp_Images_Plugin_Id2','Add Images','manage_options','Wp_Imades_add_Slug','Wp_Imades_Menu_add_Calback');
}

add_action('admin_menu','Wp_ImagesMenu');

//shortcode
function WP_myshorkcodfun($atts){

	

	$html='';

	$html .='<img src='.$atts['img'].' width="522px"/>';

	return $html;
}
add_shortcode('wpimage_shortcode','WP_myshorkcodfun');

?>