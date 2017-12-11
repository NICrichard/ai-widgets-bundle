<?php
/*
Widget Name: Animated Image
Description: An image that animates in when it enters the screen
Author: Access Idaho
Author URI: https://accessidaho.org
*/

class Animated_Image_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'ai-animage',
			__('Animated Image', 'ai-animage'),
			array(
				'description' => __('An image that animates in when it enters the screen.', 'ai-animage'),
				'help' 	      => 'https://webmaster.idaho.gov',
			),
			array(),
			array(
				'image' => array(
					'type' 	=> 'text',
					'label'	=> __('Image URL', 'ai-animage'),
				),
				'animation' => array(
					'type' 		=> 'select',
					'label'		=> __('Animation', 'ai-animage'),
					'options'	=> array(
						'fade'			=> __('Fade In', 'ai-animage'),
						'slide-up'		=> __('Slide Up', 'ai-animage'),
						'slide-down'	=> __('Slide Down', 'ai-animage'),
						'slide-left'	=> __('Slide Left', 'ai-animage'),
						'slide-right'	=> __('Slide Right', 'ai-animage'),
					),
				),
			),
			plugin_dir_path(__FILE__)
		);
	}

	function initialize() {
		$this->register_frontend_scripts(
			array(
				array('onscreen-script', plugin_dir_path(__FILE__) . 'js/onscreen.js', array('jquery')),
				array('main-script', plugin_dir_path(__FILE__) . 'js/main.js', array('jquery'))
			)
		);
	}

	function get_template_name($instance) {
		return 'animage-template';
	}

	function get_template_dir($instance) {
		return 'tpl';
	}
}
siteorigin_widget_register('ai-animage', __FILE__, 'Animated_Image_Widget');