<?php
function unwpautop($string) {
	$string = str_replace( "\n", "", $string );
	$string = str_replace( "<p>", "", $string );
	$string = str_replace( array( "<br />", "<br>", "<br/>" ), "\n", $string );
	$string = str_replace( "</p>", "\n\n", $string );
	return $string;
}
?>
<div>
	<h4><?php
		echo wp_kses_post($instance['name']);
	?></h4>
	<p><?php
		if ($instance['image']) {
			if (isset($instance['style'])) {
				$combined_class = $instance['style'];
			}
			$combined_class .= ' ';
			if (isset($instance['align'])) {
				$combined_class .= $instance['align'];
			}
			echo wp_get_attachment_image($instance['image'], 'medium', false, array(
				'title' => $instance['name'],
				'class' => $combined_class,
			));
		} else {
			echo '<img src="https://placehold.it/300x300" class="' . $combined_class . '">';
		}
		if ($instance['autop']) {
			echo $instance['text'];
		} else {
			echo unwpautop($instance['text']);
		}
	?></p>
</div>