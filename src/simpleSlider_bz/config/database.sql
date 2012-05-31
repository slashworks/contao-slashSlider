-- **********************************************************
-- *                                                        *
-- * IMPORTANT NOTE                                         *
-- *                                                        *
-- * Do not import this file manually but use the TYPOlight *
-- * install tool to create and maintain database tables!   *
-- *                                                        *
-- **********************************************************


-- --------------------------------------------------------

--
-- Table `tl_content`
--

CREATE TABLE `tl_content` (
  `simpleSliderBzType` varchar(255) NOT NULL default '',
  `simpleSliderBzName` varchar(255) NOT NULL default '',
  `simpleSliderBzConfig` text NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;