<?php
/*
Widget Name: Boostrap Panel Widget
Description: Uses the Bootstrap Panel feature to put content within a Panel box.
Author: Access Idaho
Author URI: https://accessidaho.org
*/

class Bootstrap_Widget_Panel_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'bootstrap-panel',
			__('Panel', 'bs-panels-widget' ),
			array(
				'description' 	=> __('Uses the Bootstrap Panel feature to put content within a Panel box.', 'bs-panels-widget' ),
				'help' 			=> 'https://idaho.gov/webmaster',
			),
			array(),
			array(
				'title' => array(
					'type' 	=> 'text',
					'label' => __('Title', 'bs-panels-widget'),
				),
				'style' => array(
					'type'  	=> 'select',
					'label' 	=> __('Panel Style', 'bs-panels-widget'),
					'default' 	=> 'default',
					'options' 	=> array(
						'default' 	=> __('Default', 'bs-panels-widget'),
						'primary' 	=> __('Primary', 'bs-panels-widget'),
						'success' 	=> __('Success', 'bs-panels-widget'),
						'info' 		=> __('Info', 'bs-panels-widget'),
						'warning' 	=> __('Warning', 'bs-panels-widget'),
						'danger' 	=> __('Danger', 'bs-panels-widget'),
					),
				),
				'image' => array(
					'type' 	=> 'media',
					'label' => __('Image', 'bs-panels-widget'),
				),
				'text' => array(
					'type' => 'tinymce',
					'rows' => 20,
				),
				'autop' => array(
					'type' 		=> 'checkbox',
					'default' 	=> true,
					'label' 	=> __('Automatically add paragraphs', 'bs-panels-widget'),
				),
				'nav' => array(
					'type' 		=> 'select',
					'default' 	=> 'none',
					'label' 	=> __('Navigation', 'bs-panels-widget'),
					'options' 	=> $this->get_navs(),
				),
			),
			plugin_dir_path( __FILE__ )
		);
	}

	public function get_navs() {
		$nav_menus = get_terms('nav_menu', array('hide_empty' => false));
		$_navs = array('none' => 'None');
		foreach ($nav_menus as $nav) {
			$_navs[$nav->term_id] = $nav->name;
		}
		return $_navs;
	}

	function get_template_name($instance) {
		return 'panels-template';
	}

	function get_template_dir($instance) {
		return 'tpl';
	}

	function get_style_name($instance) {
		return 'buttons';
	}
}
siteorigin_widget_register('bootstrap-panel', __FILE__, 'Bootstrap_Widget_Panel_Widget');
