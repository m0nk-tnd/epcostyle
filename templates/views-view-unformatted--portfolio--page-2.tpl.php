<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<div class="group row">
	<div class="row-height">
		<?php if (!empty($title)): ?>
			<div class="col-sm-height full-height-wrapper col-xs-12 col-sm-2 col-md-3">
				<div class="full-height">
					<h3><?php print $title; ?></h3>

				</div>
			</div>
		<?php endif; ?>
		<div class="col-sm-height col-xs-12 col-sm-8 col-md-9">
			<div class="row">
				<?php foreach ($rows as $id => $row): ?>
					<div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
					<?php print $row; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
</div>