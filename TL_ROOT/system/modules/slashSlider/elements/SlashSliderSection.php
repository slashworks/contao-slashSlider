<?php

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
 * @copyright  Joe Ray Gregory @ borowiakziehe KG 2012
 * @author     Joe Ray Gregory <jrgregory@borowiakziehe.de>
 * @package    PackageName
 * @license    LGPL
 * @filesource
 */

namespace slashworks;

use SlashHelper\HelperTemplate;

class SlashSliderSection extends \ContentElement
{

    protected $strTemplate = 'ce_slashSliderSection';

    public function compile()
    {

        ++$GLOBALS['slashSlider'][$this->pid]['section'];

        if (TL_MODE == 'FE')
        {

            $this->Template->isFirst = false;
            $this->Template->isLast = false;

            if($GLOBALS['slashSlider'][$this->pid]['section'] === 1)

            {

                $this->Template->isFirst = true;

            }

            else if($GLOBALS['slashSlider'][$this->pid]['section'] == $GLOBALS['slashSlider'][$this->pid]['count'])

            {

                $this->Template->isLast = true;

            }

        }

        else if (TL_MODE == 'BE')

        {

            $_wildcarText = 'SLASHSLIDER SECTION '.$GLOBALS['slashSlider'][$this->pid]['section'].'';
            $_title = $this->text;

            $this->Template = HelperTemplate::wildCard($_wildcarText, $_title);

        }

    }
}
