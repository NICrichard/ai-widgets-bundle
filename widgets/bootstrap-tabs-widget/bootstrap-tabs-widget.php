<?php
/*
Widget Name: Bootstrap Tabs
Description: Adds Boostrap themeing to the Tabs instance availabilty.
Author: Access Idaho
Author URI: https://accessidaho.org
*/

class Bootstrap_Widget_Tabs_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sobw-tabs',
			__('Bootstrap Tabs', 'sobw-tabs'),
			array('description' => __('Adds Bootstrap themeing to the Tabs instance availability.', 'sobw-tabs')),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	function initialize() {
		if (!class_exists('SiteOrigin_Widget_Tabs_Widget')) {
			SiteOrigin_Widgets_Bundle::single()->include_widget('tabs');
		}
	}
}