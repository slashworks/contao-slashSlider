<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jrgregory
 * Date: 29.05.12
 * Time: 16:18
 * To change this template use File | Settings | File Templates.
 */

$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] 	= 'simpleSliderBzType';
$GLOBALS['TL_DCA']['tl_content']['palettes']['simpleSlider'] = '{type_legend},type,simpleSliderBzType;';
$GLOBALS['TL_DCA']['tl_content']['palettes']['simpleSliderSetbegin'] = '{type_legend},type,simpleSliderBzType;headline,simpleSliderBzName,simpleSliderBzConfig';
$GLOBALS['TL_DCA']['tl_content']['palettes']['simpleSliderSetend'] = '{type_legend},type,simpleSliderBzType,simpleSliderBzRelation;';
$GLOBALS['TL_DCA']['tl_content']['palettes']['simpleSliderSetImage'] = '{type_legend},type,simpleSliderBzType;singleSRC,alt,title,size,imagemargin,imageUrl,fullsize,caption';

$GLOBALS['TL_DCA']['tl_content']['fields']['simpleSliderBzName'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['simpleSliderBzName'],
    'exclude'                 => true,
    'search'                  => true,
    'inputType'               => 'text',
    'eval'                    => array('mandatory'=>true, 'unique'=>true, 'spaceToUnderscore'=>true, 'rgxp'=>'alnum')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['simpleSliderBzType'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['mooType'],
    'exclude'                 => true,
    'inputType'               => 'radio',
    'options'                 => array('Setbegin', 'Setend'),
    'reference'               => &$GLOBALS['TL_LANG']['tl_content'],
    'eval'                    => array('helpwizard'=>true, 'submitOnChange'=>true)
);

$GLOBALS['TL_DCA']['tl_content']['fields']['simpleSliderBzConfig'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['simpleSliderBzConfig'],
    'exclude'                 => true,
    'search'                  => true,
    'inputType'               => 'textarea',
    'eval'                    => array('helpwizard'=>true),
    'explanation'             => 'simpleSliderBzConfig'
);

$GLOBALS['TL_DCA']['tl_content']['fields']['simpleSliderBzRelation'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['simpleSliderBzRelation'],
    'exclude'                 => true,
    'filter'                  => true,
    'inputType'               => 'select',
    'options_callback'        => array('tl_simpleSliderBZ', 'getsimpleSliderBZStartPoints'),
    'reference'               => &$GLOBALS['TL_LANG']['CTE'],
    'eval'                    => array('chosen'=>true, 'submitOnChange'=>true)
);

class tl_simpleSliderBZ extends Backend
{
    public function getsimpleSliderBZStartPoints(DataContainer $dc)
    {
        $article = $dc->activeRecord->pid;
        $dbObj = $this->Database->prepare('SELECT simpleSliderBzName FROM tl_content WHERE pid=? and simpleSliderBzName != ""')->execute($article);

        $data = array();
        while($dbObj->next())
        {
            $data[$dbObj->simpleSliderBzName] = $dbObj->simpleSliderBzName;
        }

        return $data;
    }
}