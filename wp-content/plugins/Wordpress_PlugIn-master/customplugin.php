<?php
/*
   Plugin Name: Custom plugin 2022
   Plugin URI: https://www.linkedin.com/in/mohamed-ibnahmad/
   description: A simple custom plugin
   Version: 1.0.0
   Author: Ibnahmad Mohamed
   Author URI: https://www.linkedin.com/in/mohamed-ibnahmad/
*/

// Create a new table
function customplugin_table(){

  global $wpdb;
  $charset_collate = $wpdb->get_charset_collate();

  $tablename = $wpdb->prefix."customplugin";

  $sql = "CREATE TABLE $tablename (
  id mediumint(11) NOT NULL AUTO_INCREMENT,
  name varchar(80) NOT NULL,
  username varchar(80) NOT NULL,
  email varchar(80) NOT NULL,
  
  PRIMARY KEY  (id)
  ) $charset_collate;";

  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  dbDelta( $sql );

}
function delete_people_table() {
    global $wpdb;
    $tablename = $wpdb->prefix."customplugin";
    $sql = "DROP TABLE IF EXISTS $tablename";
    $wpdb->query($sql);
    delete_option("my_plugin_db_version");
    }
register_activation_hook( __FILE__, 'customplugin_table' );
register_deactivation_hook( __FILE__, 'delete_people_table' );

// Add menu
function customplugin_menu() {

    add_menu_page("Custom Plugin", "Custom Plugin","manage_options", "myplugin", "displayList",'dashicons-chart-area');
    add_submenu_page("myplugin","All Entries", "All entries","manage_options", "allentries", "displayList");
    add_submenu_page("myplugin","Add new comment", "Add new comment","manage_options", "addnewcomment", "addcomment");

}
add_action("admin_menu", "customplugin_menu");

function displayList(){
  include "displaylist.php";
}

function addcomment(){
  include "addentry.php";
}