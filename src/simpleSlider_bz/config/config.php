<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2010 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Die Kommunikationsabteilung - Fauth und Gundlach GmbH - 2010 / Stoutlabs - 2009-2010
 * @author     Sabri Karadayi <karadayi@kommunikationsabteilung.de> / Daniel Stout <http://stoutlabs.com>
 * @package    ce_slider
 * @license    LGPL
 * @filesource
 */
if(TL_MODE == 'FE') {
    $GLOBALS['TL_CSS'][] = 'plugins/spin/spin.css';
    $GLOBALS['TL_JAVASCRIPT'][] = 'plugins/spin/spin.js';
}

if(TL_MODE == 'BE') {
    $GLOBALS['TL_CSS'][] = 'system/modules/simpleSlider_bz/html/simpleSlider_bz.css';
}

$GLOBALS['TL_CTE']['images']['simpleSlider'] = 'SimpleSlider_bz';