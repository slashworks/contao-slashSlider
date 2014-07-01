<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package SlashSlider
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'slashworks',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Elements
	'slashworks\SlashSlider'        => 'system/modules/slashSlider/elements/SlashSlider.php',
	'slashworks\SlashSliderSection' => 'system/modules/slashSlider/elements/SlashSliderSection.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'ce_ce_slashSliderSection'  => 'system/modules/slashSlider/templates',
	'ce_slashSlider'            => 'system/modules/slashSlider/templates',
	'ce_slashSlider_start'      => 'system/modules/slashSlider/templates',
	'ce_slashSlider_stop'       => 'system/modules/slashSlider/templates',
	'slashSliderConfig_default' => 'system/modules/slashSlider/templates',
));
