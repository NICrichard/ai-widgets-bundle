<?php
/*
Widget Name: Bootstrap Button
Description: Adds Boostrap themeing to the Button instance availabilty.
Author: Access Idaho
Author URI: https://accessidaho.org
*/

class Bootstrap_Widget_Button_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sobw-button',
			__('Bootstrap Button', 'sobw-widgets-bundle'),
			array('description' => __('Adds Bootstrap themeing to buttons.', 'sobw-button-widget')),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	function initialize() {
		if (!class_exists('SiteOrigin_Widget_Button_Widget')) {
			SiteOrigin_Widgets_Bundle::single()->include_widget('button');
		}
		$this->register_frontend_styles(
			array(
				array('bootstrap-style', plugin_dir_url(__FILE__) . 'css/bootstrap.css', array(), '1.0')
			)
		);
	}

	function get_widget_form() {
		return array(
			'text' => array(
				'type' => 'text',
				'label' => __('Button text', 'sobw-button-widget'),
			),

			'url' => array(
				'type' => 'link',
				'label' => __('Destination URL', 'sobw-button-widget'),
			),

			'new_window' => array(
				'type' => 'checkbox',
				'default' => false,
				'label' => __('Open in a new window', 'sobw-button-widget'),
			),

			'button_icon' => array(
				'type' => 'section',
				'label' => __('Icon', 'sobw-button-widget'),
				'fields' => array(
					'icon_selected' => array(
						'type' => 'icon',
						'label' => __('Icon', 'sobw-button-widget'),
					),

					'icon_color' => array(
						'type' => 'color',
						'label' => __('Icon color', 'sobw-button-widget'),
					),

					'icon' => array(
						'type' => 'media',
						'label' => __('Image icon', 'sobw-button-widget'),
						'description' => __('Replaces the icon with your own image icon.', 'sobw-button-widget'),
					),
				),
			),

			'design' => array(
				'type' => 'section',
				'label' => __('Design and layout', 'sobw-button-widget'),
				'hide' => true,
				'fields' => array(

					'width' => array(
						'type' => 'measurement',
						'label' => __( 'Width', 'sobw-button-widget' ),
						'description' => __( 'Leave blank to let the button resize according to content.', 'sobw-button-widget' )
					),

					'align' => array(
						'type' => 'select',
						'label' => __('Align', 'sobw-button-widget'),
						'default' => 'center',
						'options' => array(
							'left' => __('Left', 'sobw-button-widget'),
							'right' => __('Right', 'sobw-button-widget'),
							'center' => __('Center', 'sobw-button-widget'),
							'justify' => __('Justify', 'sobw-button-widget'),
						),
					),

					'theme' => array(
						'type' => 'select',
						'label' => __('Bootstrap theme type', 'sobw-button-widget'),
						'default' => 'bootstrap',
						'options' => array(
							'btn-default' => __('Default', 'sobw-button-widget'),
							'btn-primary' => __('Primary', 'sobw-button-widget'),
							'btn-info'    => __('Information', 'sobw-button-widget'),
							'btn-warning' => __('Warning', 'sobw-button-widget'),
							'btn-success' => __('Success', 'sobw-button-widget'),
							'btn-danger'  => __('Danger', 'sobw-button-widget'),
						),
					),

					'text_color' => array(
						'type' => 'color',
						'label' => __('Text color', 'sobw-button-widget'),
					),

					'hover' => array(
						'type' => 'checkbox',
						'default' => true,
						'label' => __('Use hover effects', 'sobw-button-widget'),
					),

					'font' => array(
						'type' => 'font',
						'label' => __( 'Font', 'ssobw-button-widget' ),
						'default' => 'default'
					),

					'font_size' => array(
						'type' => 'select',
						'label' => __('Font size', 'ssobw-button-widget'),
						'options' => array(
							'1' => __('Normal', 'sobw-button-widget'),
							'1.15' => __('Medium', 'sobw-button-widget'),
							'1.3' => __('Large', 'sobw-button-widget'),
							'1.45' => __('Extra large', 'sobw-button-widget'),
						),
					),

					'padding' => array(
						'type' => 'select',
						'label' => __('Padding', 'sobw-button-widget'),
						'default' => '1',
						'options' => array(
							'0.5' => __('Low', 'sobw-button-widget'),
							'1' => __('Medium', 'sobw-button-widget'),
							'1.4' => __('High', 'sobw-button-widget'),
							'1.8' => __('Very high', 'sobw-button-widget'),
						),
					),

				),
			),

			'attributes' => array(
				'type' => 'section',
				'label' => __('Other attributes and SEO', 'sobw-button-widget'),
				'hide' => true,
				'fields' => array(
					'id' => array(
						'type' => 'text',
						'label' => __('Button ID', 'sobw-button-widget'),
						'description' => __('An ID attribute allows you to target this button in Javascript.', 'sobw-button-widget'),
					),

					'classes' => array(
						'type' => 'text',
						'label' => __('Button Classes', 'sobw-button-widget'),
						'description' => __('Additional CSS classes added to the button link.', 'sobw-button-widget'),
					),

					'title' => array(
						'type' => 'text',
						'label' => __('Title attribute', 'sobw-button-widget'),
						'description' => __('Adds a title attribute to the button link.', 'sobw-button-widget'),
					),

					'onclick' => array(
						'type' => 'text',
						'label' => __('Onclick', 'sobw-button-widget'),
						'description' => __('Run this Javascript when the button is clicked. Ideal for tracking.', 'sobw-button-widget'),
					),
				)
			),
		);
	}

	function get_google_font_fields( $instance ) {
		return array(
			$instance['design']['font'],
		);
	}

	function get_template_name($instance) {
		return 'bsbutton-template';
	}

	function get_template_dir($instance) {
		return 'tpl';
	}
}
siteorigin_widget_register('sobw-button', __FILE__, 'Bootstrap_Widget_Button_Widget');

function sobw_extend_button_form($form_options, $widget) {
	if (!empty($form_options['design']['fields']['theme']['options'])) {
		$form_options['design']['fields']['theme']['options']['btn-default'] = __('Bootstrap Default Style', 'sobw-button-widget');
		$form_options['design']['fields']['theme']['options']['btn-primary'] = __('Bootstrap Primary Style', 'sobw-button-widget');
		$form_options['design']['fields']['theme']['options']['btn-success'] = __('Bootstrap Success Style', 'sobw-button-widget');
		$form_options['design']['fields']['theme']['options']['btn-info'] = __('Bootstrap Info Style', 'sobw-button-widget');
		$form_options['design']['fields']['theme']['options']['btn-warning'] = __('Bootstrap Warning Style', 'sobw-button-widget');
		$form_options['design']['fields']['theme']['options']['btn-danger'] = __('Bootstrap Danger Style', 'sobw-button-widget');
	}
	return $form_options;
}
add_filter('siteorigin_widgets_form_options_sow-button', 'sobw_extend_button_form', 10, 2);

function sobw_button_template_file($filename, $instance, $widget) {
	if (!empty($instance['design']['theme']) && ($instance['design']['theme'] == 'btn-default' || $instance['design']['theme'] == 'btn-primary' || $instance['design']['theme'] == 'btn-success' || $instance['design']['theme'] == 'btn-success' || $instance['design']['theme'] == 'btn-info' || $instance['design']['theme'] == 'btn-warning' || $instance['design']['theme'] == 'btn-danger')) {
		$filename = plugin_dir_path(__FILE__) . 'tpl/bsbutton-template.php';
	}
	return $filename;
}
add_filter('siteorigin_widgets_template_file_sow-button', 'sobw_button_template_file', 10, 3);