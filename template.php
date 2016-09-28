<?php
/**
 * @file
 * The primary PHP file for this theme.
 */
/**
 * Implementation of hook_preprocess_page().
 */
function tnd_bootstrap_epco_preprocess_page(&$variables) {
    if (isset($variables['node']->type)) {
        $nodetype = $variables['node']->type;
        $variables['theme_hook_suggestions'][] = 'page__' . $nodetype;
    }
	// if this is a panel page, add template suggestions
	if($panel_page = page_manager_get_current_page()) {
		// add a generic suggestion for all panel pages
		$variables['theme_hook_suggestions'][] = 'page__panel';

		// add the panel page machine name to the template suggestions
		$variables['theme_hook_suggestions'][] = 'page__' . $panel_page['name'];

		//add a body class for good measure
		$body_classes[] = 'page-panel';
	}
	// Add information about the number of sidebars.
	if (!empty($variables['page']['sidebar_first']) && !empty($variables['page']['sidebar_second'])) {
		$variables['content_column_class'] = ' class="col-xs-12 col-md-4"';
	}
	elseif (!empty($variables['page']['sidebar_first']) || !empty($variables['page']['sidebar_second'])) {
		$variables['content_column_class'] = ' class="col-xs-12 col-md-9"';
	}
	else {
		$variables['content_column_class'] = ' class="col-xs-12"';
	}
}
