<?php

declare(strict_types=1);

/*
 * This file is part of Carousel Bundle, a content element for the Contao CMS.
 *
 * (c) Marko Cupic 2023 <m.cupic@gmx.ch>
 * @license MIT
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 * @link https://github.com/markocupic/bootstrap-carousel-bundle
 */

$GLOBALS['TL_DCA']['tl_content']['palettes']['bootstrapCarouselStart'] = '{type_legend},type;{slider_legend},carouselAddIndicators,carouselAddControls,carouselAutoplay,carouselFade,carouselReactToKeyboard,carouselPauseOnHover,carouselInfiniteCycle,carouselInterval;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['bootstrapCarouselSeparator'] = '{type_legend},type;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['bootstrapCarouselStop'] = '{type_legend},type;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';

/*
 * Fields
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['carouselAddIndicators'] = [
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => ['tl_class' => 'm12 w50'],
    'sql'       => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['carouselAddControls'] = [
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => ['tl_class' => 'w50 m12'],
    'sql'       => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['carouselAutoplay'] = [
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => ['tl_class' => 'w50'],
    'sql'       => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['carouselInterval'] = [
    'exclude'   => true,
    'inputType' => 'text',
    'eval'      => ['tl_class' => 'clr'],
    'sql'       => "int(10) unsigned NOT NULL default '0'",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['carouselReactToKeyboard'] = [
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => ['tl_class' => 'w50'],
    'sql'       => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['carouselPauseOnHover'] = [
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => ['tl_class' => 'w50'],
    'sql'       => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['carouselInfiniteCycle'] = [
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => ['tl_class' => 'w50'],
    'sql'       => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['carouselFade'] = [
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => ['tl_class' => 'w50'],
    'sql'       => "char(1) NOT NULL default ''",
];