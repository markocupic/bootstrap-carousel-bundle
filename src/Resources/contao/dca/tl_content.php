<?php

/**
 * @package    bootstrap-carousel
 * @author     Marko Cupic <m.cupic@gmx.ch>
 * @copyright  Marko Cupic 2018
 * @license    MIT
 *
 */

/*
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['bootstrapCarouselStart'] = '{type_legend},type;{slider_legend},carouselAddIndicators,carouselAddControls,carouselAutoplay,carouselReactToKeyboard,carouselPauseOnHover,carouselInfiniteCycle,carouselInterval;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['bootstrapCarouselSeparator'] = '{type_legend},type;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['bootstrapCarouselStop'] = '{type_legend},type;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';


$GLOBALS['TL_DCA']['tl_content']['fields']['carouselAddIndicators'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['carouselAddIndicators'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'm12 w50'),
    'sql'       => "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['carouselAddControls'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['carouselAddControls'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w50 m12'),
    'sql'       => "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['carouselAutoplay'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['carouselAutoplay'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['carouselInterval'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['carouselInterval'],
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => array('tl_class' => 'clr'),
    'sql'       => "int(10) unsigned NOT NULL default '0'",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['carouselReactToKeyboard'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['carouselReactToKeyboard'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['carouselPauseOnHover'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['carouselPauseOnHover'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_content']['fields']['carouselInfiniteCycle'] = array
(
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['carouselInfiniteCycle'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => array('tl_class' => 'w50'),
    'sql'       => "char(1) NOT NULL default ''",
);


