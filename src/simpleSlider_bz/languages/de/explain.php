<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2012 Leo Feyer
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
 * @copyright  Leo Feyer 2005-2012
 * @author     Leo Feyer <http://www.contao.org>
 * @package    Language
 * @license    LGPL
 * @filesource
 */


/**
 * Insert tags
 */
$GLOBALS['TL_LANG']['XPL']['simpleSliderBzConfig'] = array
(
    array('transition', 'Verändere den Animations Effekt fade, horizontal-slide, vertical-slide, horizontal-push. Standard auf horizontal-push.'),
    array('transitionOption', 'Effektoptionen verändern. Standard auf {transition:"linear",duration:600}'),
    array('timer', 'Ablaufende Zeitanimation. Standard true'),
    array('transitionOption', 'Effektoptionen verändern. Standard auf {transition:"linear",duration:600}'),
    array('advanceSpeed', 'Geschwindigkeit zwischen Wechsel in Millisekunden. Standard 4000'),
    array('pauseOnHover', 'Soll der Mauszeiger pasieren? '),
    array('startClockOnMouseOut', 'Soll die das automatische weiter scrollen wieder aufgenommen werden? Standard True'),
    array('startClockOnMouseOutAfter', 'Nach welcher Zeit nach verlassen der Maus soll das Sliden weiter gehen? Standard 1000'),
    array('directionalNav', 'Soll man nach vorne oder zurück navigieren können? Standad true'),
    array('captions', 'Soll es Bildunterschriften geben? Standad true'),
    array('captionTransition', 'Welchen Effekt sollen die Bildunterschriften haben (fade, slideOpen, none)? Standad fade'),
    array('captionTransitionOption', 'Möchtest du den Effekt modifizieren? Standard {transition:"linear",duration:600}'),
    array('bullets', 'Soll es eine Punktnavigation geben?'),
    array('bulletThumbs', 'Vorschaubilder für die Punktnavigation'),
    array('bulletThumbLocation', 'Der Ort an dem die Vorschaubilder liegen.'),
    array('afterSlideChange', 'Hook um jedem Slide einen neuen effekt hinzuzufügen'),
);