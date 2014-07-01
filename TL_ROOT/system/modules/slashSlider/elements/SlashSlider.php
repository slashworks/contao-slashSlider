<?php

namespace slashworks;

use SlashHelper\HelperAssets;
use SlashHelper\HelperTemplate;

class SlashSlider extends \ContentElement
{
    protected $strTemplate = 'ce_slashSlider';

    /**
     * compile content element
     */
    public function compile()
    {


        if ($this->slashSliderType == 'Setbegin')
        {

            // get total count of items in the current article
            $objTotal = $this->Database->execute("SELECT COUNT(*) as total FROM tl_content WHERE type = 'slashSliderSection' AND pid=$this->pid");
            $GLOBALS['slashSlider'][$this->pid];

            // register the total count to global object
            $GLOBALS['slashSlider'][$this->pid]['count'] =  $objTotal->total;

            // register the use of navigation to global object
            $GLOBALS['slashSlider'][$this->pid]['useNav'] =  false;


            if (TL_MODE == 'FE')
            {

                //add Basic Slider css file to head
                HelperAssets::addCss('system/modules/slashSlider/assets/mootools/spin/spin.css', 'screen');

                //addMobile swipe to head
                HelperAssets::addJS('system/modules/slashSlider/assets/mootools/powertools-1.2.0.js');

                //add Slider js file to head
                HelperAssets::addJS('system/modules/slashSlider/assets/mootools/spin/spin.js');

                // set another template
                $this->strTemplate = 'ce_slashSlider_start';

                //generate template object
                $this->Template = new \FrontendTemplate($this->strTemplate);

                //build slider id
                $sliderId = 'slashSlider_'.$this->slashSliderName;
                $this->arrData['sliderId'] = $sliderId;

                //override global useNav param if it` checked in the backend
                if($this->slashSliderUseSectionsAsNavi) {
                    $GLOBALS['slashSlider'][$this->pid]['useNav'] =  true;
                }

                //generate a moo template to init the slider
                HelperTemplate::mootools($this->slashSliderConfig, array
                (
                    'sliderId' => $sliderId,
                    'useNav' => $GLOBALS['slashSlider'][$this->pid]['useNav']
                ));

                // add template vars to Template object
                $this->Template->setData($this->arrData);
            }
            else
            {

                $this->Template = HelperTemplate::wildCard('SLASHSLIDER WRAPPER START');
            }


        }
        elseif($this->slashSliderType == 'Setend')
        {
            if (TL_MODE == 'FE')
            {

                $this->strTemplate = 'ce_slashSlider_stop';
                $this->Template = new \FrontendTemplate($this->strTemplate);
                $this->Template->setData($this->arrData);
                $this->Template->hasSections = ($GLOBALS['slashSlider'][$this->pid]['count'] > 0) ? true : false;

                if($GLOBALS['slashSlider'][$this->pid]['useNav'])
                {
                    $objSections = $this->Database->execute("SELECT * FROM tl_content WHERE type = 'slashSliderSection' AND pid=$this->pid ORDER BY sorting");
                    $tplData = array();

                    while($objSections->next())
                    {

                        if ($objSections->invisible !== '1') {

                            $cssObj = deserialize($objSections->cssID);
                            $tplData[] = array
                            (
                                'title' => $objSections->text,
                                'cssClass' => $cssObj[1]
                            );
                        }

                    }

                    $this->Template->sliderNav = $tplData;
                }
            }
            else
            {
                $this->Template = HelperTemplate::wildCard('SLASH WRAPPER END');
            }
        }

    }
}