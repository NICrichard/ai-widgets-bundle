<?php

/**
 * Widget Name: Contact Form 7 Widget
 * Description: Contact Form 7 can manage multiple contact forms, plus you can customize the form and the mail contents flexibly with simple markup.
 * Author: Access Idaho
 * Author URI: https://accessidaho.org
 */

class Bootstrap_Widget_CF7_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'bootstrap-cf7',
			__( 'Contact Form 7', 'cf7-widget' ),
			array(
				'description' 	=> __( 'Contact Form 7 can manage multiple contact forms, plus you can customize the form and the mail contents flexibly with simple markup. Contact Form 7 plugin must be installed and active.', 'bootstrap-widgets-bundle' ),
				'help' 			=> 'http://idaho.gov/webmaster/',
			),
			array(),
			array(
				'title' => array(
					'type' 	=> 'text',
					'label' => __( 'Title', 'cf7-widget' ),
				),
				'form' => array(
					'type' 		=> 'select',
					'label' 	=> __( 'Form', 'cf7-widget' ),
					'options' 	=> $this->get_forms(),
				),
			),
			plugin_dir_path( __FILE__ )
		);
	}

	public function get_forms() {
		$args = array(
			'post_type' 	 => 'wpcf7_contact_form',
			'posts_per_page' => 50,
		);

		$forms = array();
		$cf7Forms = get_posts( $args );
		if ($cf7Forms) {
			foreach ($cf7Forms as $cf7Form) {
				$forms[$cf7Form->ID] = $cf7Form->post_title;
			}
		}
		return $forms;
	}

	function get_template_name($instance) {
		return 'cf7-template';
	}

	function get_template_dir($instance) {
		return 'tpl';
	}
}
siteorigin_widget_register('bootstrap-cf7', __FILE__, 'Bootstrap_Widget_CF7_Widget');
