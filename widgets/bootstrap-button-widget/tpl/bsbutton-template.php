<?php
 d($instance);
if (!isset($href)) {
	$href = $instance['url'];
}
if (!isset($align)) {
	$align = $instance['design']['align'];
}
if (!isset($button_attributes)) {
	$button_attributes = $instance['attributes'];
}
if (!isset($text)) {
	$text = $instance['text'];
}
?>
<div class="btn <?php echo $instance['design']['theme']; ?> ow-button-align-<?php echo esc_attr($align);
	echo '"';
	if (isset($instance['design']['width'])) {
		echo " style='width:" . $instance['design']['width'] . "'";
	}
?>>
	<a href="<?php echo sow_esc_url($href); ?>" <?php foreach($button_attributes as $name => $val) echo $name . '="' . esc_attr($val) . '" ' ?>
		<?php if (!empty($instance['attributes']['onclick'])) echo 'onclick="' . esc_js($instance['attributes']['onclick']) . '"'; ?>>
			<?php
				if(!empty($icon_image_url)) {
                    ?><div class="sow-icon-image" style="<?php echo 'background-image: url(' . sow_esc_url($icon_image_url) . ')' ?>"></div><?php
				} else {
					$icon_styles = array();
					if (!empty($icon_color)) $icon_styles[] = 'color: ' . $icon_color;
					echo siteorigin_widget_get_icon($icon, $icon_styles);
				}
			?>
			<span class="btn <?php echo $instance['design']['theme']; ?>"><?php echo wp_kses_post($text); ?></span>
	</a>
</div>
