<?php
// d($instance);
if (!empty($instance['title'])) {
	echo $args['before_title'] . esc_html($instance['title']) . $args['after_title'];
}
if ($instance['show'] == 'content') {
	echo wp_kses_post("[content " . $instance['type'] . " layout='" . $instance['layout'] . "' cols='" . $instance['cols'] . "']");
} else {
	echo wp_kses_post("[datatable " . $instance['type'] . " limit='" . $instance['limit'] . "' filter='" . $instance['filter'] . "' sortable='" . $instance['sortable'] . "']");
}
