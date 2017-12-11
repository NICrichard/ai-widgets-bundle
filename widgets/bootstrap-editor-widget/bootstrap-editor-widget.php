<?php
/*
Widget Name: Bootstrap Visual Editor
Description: Adds Boostrap themeing to the Visual Editor instance availabilty.
Author: Access Idaho
Author URI: https://accessidaho.org
*/

class Bootstrap_Widget_Editor_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sobw-editor',
			__('Bootstrap Visual Editor', 'sobw-editor'),
			array('description' => __('Adds Bootstrap themeing to the Visual Editor instance availability.', 'sobw-editor')),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	function get_widget_form(){
		return array(
			'title' => array(
				'type' => 'text',
				'label' => __('Title', 'sobw-editor'),
			),
			'text' => array(
				'type' => 'tinymce',
				'rows' => 20
			),
			'autop' => array(
				'type' => 'checkbox',
				'default' => true,
				'label' => __('Automatically add paragraphs', 'sobw-editor'),
			),
		);
	}

	function initialize() {
		if (class_exists('Bootstrap_Widget_Editor_Widget')) {
			SiteOrigin_Widgets_Bundle::single()->include_widget('editor');
		}
	}

	function get_template_name($instance) {
		return 'editor-template';
	}

	function get_template_dir($instance) {
		return 'tpl';
	}
}
siteorigin_widget_register('sobw-editor', __FILE__, 'Bootstrap_Widget_Editor_Widget');