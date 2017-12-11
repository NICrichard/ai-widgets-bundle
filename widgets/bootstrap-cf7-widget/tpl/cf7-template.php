<?php
// d($instance);
$id = $instance['form'];
if (!empty($instance['title'])) {
	echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'];
}
echo wp_kses_post("[contact-form-7 id='$id']");
?>
