<?php
/**
 * Widget Name: Contenu Widget
 * Description: Orangizes and displays content from data types.
 * Author: Access Idaho
 * Author URI: https://accessidaho.org
 */

class Bootstrap_Widget_Content_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'bootstrap-contenu',
			__('Contenu', 'contenu-widget'),
			array(
				'description' 	=> __('Orangizes and displays content from data types. Requires Contenu plugin be installed and active.', 'contenu-widget'),
				'help' 			=> 'http://idaho.gov/webmaster/',
			),
			array(),
			array(
				'title' => array(
					'type' 	=> 'text',
					'label' => __('Title', 'contenu-widget'),
				),
				'type' => array(
					'type' 		=> 'select',
					'label' 	=> __('Type', 'contenu-widget'),
					'options' 	=> $this->get_types(),
				),
				'show'	=> array(
					'type'			=> 'select',
					'label'			=> __('Show As', 'contenu-widget'),
					'state_emitter' => array(
						'callback' 	=> 'select',
						'args'		=> array('show')
					),
					'options'		=> array(
						'content'	=> __('Content Columns', 'contenu-widget'),
						'datatable'	=> __('DataTable Format', 'contenu-widget'),
					),
				),
				'limit' => array(
					'type'			=> 'select',
					'label'			=> __('Limit', 'contenu-widget'),
					'state_handler'	=> array(
						'show[content]'		=> array('hide'),
						'show[datatable]'	=> array('show'),
					),
					'default'		=> 25,
					'description'	=> __('Set the initial number of rows', 'contenu-widget'),
					'options'		=> array(
						10 => '10',
						25 => '25',
						50 => '50',
					)
				),
				'sortable' => array(
					'type'			=> 'checkbox',
					'label'			=> __('Sortable', 'contenu-widget'),
					'state_handler' => array(
						'show[content]'		=> array('hide'),
						'show[datatable]'	=> array('show'),
					),
					'default'		=> true,
				),
				'filter' => array(
					'type'			=> 'text',
					'label'			=> __('Filter', 'contenu-widget'),
					'state_handler'	=> array(
						'show[content]'		=> array('hide'),
						'show[datatable]'	=> array('show'),
					),
				),
				'cols' => array(
					'type' 			=> 'select',
					'label' 		=> __('Columns', 'contenu-widget'),
					'state_handler'	=> array(
						'show[content]'		=> array('show'),
						'show[datatable]'	=> array('hide'),
					),
					'default'		=> 1,
					'options' 		=> array(
						1 => 'One',
						2 => 'Two',
						3 => 'Three',
						4 => 'Four',
					),
				),
				'layout' => array(
					'type' 		=> 'select',
					'label' 	=> __('Layout Style', 'contenu-widget'),
					'default' 	=> 'datatable',
					'state_handler'	=> array(
						'show[content]'		=> array('show'),
						'show[datatable]'	=> array('hide'),
					),
					'options' 	=> array(
						'horizontal' => __('Horizontal', 'contenu-widget'),
						'vertical' 	 => __('Vertical', 'contenu-widget'),
					),
				),
			),
			plugin_dir_path( __FILE__ )
		);
	}

	public function get_types() {
		$types = get_option('contenu-types');
		$_types = array();
		if (is_array($types) || is_object($types)) {
			foreach ($types as $type) {
				$_types[$type['id']] = $type['name'];
			}
			return $_types;
		}
	}

	function get_template_name($instance) {
		return 'contenu-template';
	}

	function get_template_dir($instance) {
		return 'tpl';
	}
}

siteorigin_widget_register('bootstrap-contenu', __FILE__, 'Bootstrap_Widget_Content_Widget');
