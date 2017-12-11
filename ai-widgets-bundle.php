<?php

/*
  Plugin Name: Idaho.gov Widgets
  Plugin URI: https://accessidaho.org
  Description: Widgets to complement SiteOrigin's PageBuilder plugin tool.
  Version: 2.0.0
  Author: Access Idaho
  Author URI: https://accessidaho.org
  License: MIT
*/

defined('ABSPATH') or die('No script kitties please!');

function ai_widgets_collection($folders) {
  $folders[] = plugin_dir_path(__FILE__) . 'widgets/';
  return $folders;
}
add_filter('siteorigin_widgets_widget_folders', 'ai_widgets_collection');
