<?php
/*
	Widget Name: Well Widget
	Description: Use the Well as a simple effect on an element to give it an inset effect.
	Author: Access Idaho
	Author URI: https://accessidaho.org
*/

class Bootstrap_Widget_Well_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'bootstrap-well',
			__('Well', 'bootstrap-well-widget'),
			array(
				'description' 	=> __('Use the well as a simple effect on an element to give it an inset effect.', 'bootstrap-well-widget'),
				'help' 			=> 'https://idaho.gov/webmaster',
			),
			array(),
			array(
				'size' => array(
					'type'    => 'select',
					'default' => '',
					'options' => array(
						'' 		  => __('Default', 'bootstrap-well-widget'),
						'well-lg' => __('Large', 'bootstrap-well-widget'),
						'well-sm' => __('Small', 'bootstrap-well-widget'),
					),
					'label' 	=> __('Size', 'bootstrap-well-widget'),
				),
				'style' => array(
					'type'  	=> 'select',
					'label' 	=> __('Panel Style', 'bootstrap-well-widget'),
					'default' 	=> 'default',
					'options' 	=> array(
						'default' => __('Default', 'bootstrap-well-widget'),
						'primary' => __('Primary', 'bootstrap-well-widget'),
						'success' => __('Success', 'bootstrap-well-widget'),
						'info' 	  => __('Info', 'bootstrap-well-widget'),
						'warning' => __('Warning', 'bootstrap-well-widget'),
						'danger'  => __('Danger', 'bootstrap-well-widget'),
					),
				),
				'text' => array(
					'type' 	=> 'tinymce',
					'rows' 	=> 20,
					'label'	=> __('Content', 'bootstrap-well-widget'),
				),
				'autop' => array(
					'type' 		=> 'checkbox',
					'default' 	=> true,
					'label' 	=> __('Automatically add paragraphs', 'bootstrap-well-widget'),
				),
			),
			plugin_dir_path(__FILE__)
		);
	}

	function get_template_name($instance) {
		return 'well-template';
	}

	function get_template_dir($instance) {
		return 'tpl';
	}

	function get_style_name($instance) {
		return 'buttons';
	}
}
siteorigin_widget_register('bootstrap-well', __FILE__, 'Bootstrap_Widget_Well_Widget');
