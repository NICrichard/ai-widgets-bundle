<div class="panel panel-<?php echo esc_attr($instance['style']); ?>">
	<?php
	if (!empty($instance['title'])) { ?>
  		<div class="panel-heading">
    		<h3 class="panel-title"><?php echo esc_html($instance['title']); ?></h3>
  		</div>
	<?php } ?>
  <div class="panel-body">
		<?php if (!empty($instance['image'])) { ?>
			<div class="panel-image">
				<img src="<?php echo esc_url(wp_get_attachment_image_src($instance['image'], 'panel-image')[0] ); ?>" title="<?php echo esc_attr($instance['title']); ?>"/>
			</div>
		<?php } elseif (strpos($instance['text'], 'Lorem') !== false) { ?>
			<div class="panel-image">
				<img src="https://placehold.it/350x150" title="Placeholder">
			</div>
		<?php } ?>
    <?php
    	if ($instance['autop']) {
    		echo $instance['text'];
    	} else {
			echo unwpautop($instance['text']);
		}
		if ($instance['nav'] !==  'none') {
			$menu_items = wp_get_nav_menu_items($instance['nav']);
	?>
			<ul class="list-group">
				<?php foreach ((array)$menu_items as $key => $menu_item) { ?>
					<a href="<?php echo esc_url($menu_item->url); ?>" class="list-group-item"><?php echo esc_attr($menu_item->title); ?></a>
		    <?php } ?>
			</ul>
		<?php } ?>
  </div>
</div>
