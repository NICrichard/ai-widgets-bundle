<?php

/*
Widget Name: Biography Widget
Description: Helps create a layout for displaying staff and board member profiles.
Author: Access Idaho
Author URI: https://accessidaho.org
*/

class Bootstrap_Widget_Biography_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'bootstrap-biography',
			__('Biography', 'biography-widget'),
			// $widget_options array
			array(
				'description' 	=> __('Helps create a layout for displaying staff and board member profiles.', 'biography-widget'),
				'help' 			=> 'https://idaho.gov/webmaster',
			),
			// $control_options array
			array(),
			// $form_options array
			array(
				'name' => array(
					'type' 	=> 'text',
					'label' => __( 'Name', 'biography-widget' ),
				),
				'image' => array(
					'type' 	=> 'media',
					'label' => __( 'Image', 'biography-widget' )
				),
				'align' => array(
					'type'  	=> 'select',
					'label' 	=> __( 'Image Alignment', 'biography-widget' ),
					'default' => 'left',
					'options' => array(
						'left' 		=> __( 'Left', 'biography-widget' ),
						'right' 	=> __( 'Right', 'biography-widget' ),
					),
				),
				'style' => array(
					'type'  	=> 'select',
					'label' 	=> __( 'Image Styling', 'biography-widget' ),
					'default' 	=> 'none',
					'options' 	=> array(
						'none' 		=> __( 'None', 'biography-widget' ),
						'circle' 	=> __( 'Circle', 'biography-widget' ),
						'rounded' 	=> __( 'Rounded', 'biography-widget' ),
					),
				),
				'text' => array(
					'type' => 'tinymce',
					'rows' => 20
				),
				'autop' => array(
					'type' 		=> 'checkbox',
					'default' 	=> true,
					'label' 	=> __( 'Automatically add paragraphs', 'biography-widget' ),
				),

			),
			plugin_dir_path(__FILE__)
		);
	}

	function get_template_name($instance) {
		return 'biography-template';
	}

	function get_template_dir($instance) {
		return 'tpl';
	}
}

siteorigin_widget_register('bootstrap-biography', __FILE__, 'Bootstrap_Widget_Biography_Widget');
