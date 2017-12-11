<?php
/*
Widget Name: Bootstrap Accordian
Description: Adds Boostrap themeing to the Accordian instance availabilty.
Author: Access Idaho
Author URI: https://accessidaho.org
*/

class Bootstrap_Widget_Accordian_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sobw-accordian',
			__('Bootstrap Accordian', 'sobw-accordian'),
			array('description' => __('Adds Bootstrap themeing to the Accordian instance availability.', 'sobw-accordian')),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	function initialize() {
		if (!class_exists('SiteOrigin_Widget_Accordian_Widget')) {
			SiteOrigin_Widgets_Bundle::single()->include_widget('accordian');
		}
	}
}