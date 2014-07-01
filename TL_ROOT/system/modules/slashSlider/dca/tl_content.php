<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jrgregory
 * Date: 29.05.12
 * Time: 16:18
 * To change this template use File | Settings | File Templates.
 */

$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] 	= 'slashSliderType';
$GLOBALS['TL_DCA']['tl_content']['palettes']['slashSlider'] = '{type_legend},type,slashSliderType;';
$GLOBALS['TL_DCA']['tl_content']['palettes']['slashSliderSetbegin'] = '{type_legend},type,slashSliderType;headline,slashSliderName,slashSliderConfig,cssID,slashSliderUseSectionsAsNavi';
$GLOBALS['TL_DCA']['tl_content']['palettes']['slashSliderSetend'] = '{type_legend},type,slashSliderType;';
$GLOBALS['TL_DCA']['tl_content']['palettes']['slashSliderSection'] = '{type_legend},type,text;cssID';


$GLOBALS['TL_DCA']['tl_content']['fields']['slashSliderType'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['mooType'],
    'exclude'                 => true,
    'inputType'               => 'radio',
    'options'                 => array('Setbegin', 'Setend'),
    'reference'               => &$GLOBALS['TL_LANG']['tl_content'],
    'eval'                    => array('helpwizard'=>true, 'submitOnChange'=>true),
    'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['slashSliderName'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['slashSliderName'],
    'exclude'                 => true,
    'search'                  => true,
    'inputType'               => 'text',
    'eval'                    => array('mandatory'=>true, 'unique'=>true, 'spaceToUnderscore'=>true, 'rgxp'=>'alnum'),
    'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['slashSliderSectionTitle'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['slashSliderSectionTitle'],
    'exclude'                 => true,
    'search'                  => true,
    'inputType'               => 'text',
    'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['slashSliderConfig'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['slashSliderConfig'],
    'exclude'                 => true,
    'inputType'               => 'select',
    'options_callback'        => array('tl_slashSlider', 'getSlashSliderConfig'),
    'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['slashSliderUseSectionsAsNavi'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['slashSliderUseSectionsAsNavi'],
    'exclude'                 => true,
    'inputType'               => 'checkbox',
    'sql'                     => "char(1) NOT NULL default ''"
);

class tl_slashSlider extends Backend
{
    public function getSlashSliderStartPoints(DataContainer $dc)
    {
        $article = $dc->activeRecord->pid;
        $dbObj = $this->Database->prepare('SELECT slashSliderName FROM tl_content WHERE pid=? and slashSliderName != ""')->execute($article);

        $data = array();
        while($dbObj->next())
        {
            $data[$dbObj->slashSliderName] = $dbObj->slashSliderName;
        }

        return $data;
    }

    /**
     * Return all gallery templates as array
     * @param \DataContainer
     * @return array
     */
    public function getSlashSliderConfig(DataContainer $dc)
    {
        // Only look for a theme in the articles module (see #4808)
        if (Input::get('do') == 'article')
        {
            $intPid = $dc->activeRecord->pid;

            // Override multiple
            if (Input::get('act') == 'overrideAll')
            {
                $intPid = Input::get('id');
            }

            // Get the page ID
            $objArticle = $this->Database->prepare("SELECT pid FROM tl_article WHERE id=?")
                ->limit(1)
                ->execute($intPid);

            // Inherit the page settings
            $objPage = $this->getPageDetails($objArticle->pid);

            // Get the theme ID
            $objLayout = LayoutModel::findByPk($objPage->layout);

            if ($objLayout === null)
            {
                return array();
            }
        }

        // Return all gallery templates
        return $this->getTemplateGroup('slashSliderConfig_', $objLayout->pid);
    }
}