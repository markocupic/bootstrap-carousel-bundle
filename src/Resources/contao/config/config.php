<?php

/**
 * @package    bootstrap-carousel
 * @author     Marko Cupic <m.cupic@gmx.ch>
 * @copyright  Marko Cupic 2018
 * @license    MIT
 *
 */

// Content elements
$GLOBALS['TL_CTE']['bootstrap-carousel']['bootstrapCarouselStart'] = 'Markocupic\BootstrapCarousel\CarouselStart';
$GLOBALS['TL_CTE']['bootstrap-carousel']['bootstrapCarouselSeparator'] = 'Markocupic\BootstrapCarousel\CarouselSeparator';
$GLOBALS['TL_CTE']['bootstrap-carousel']['bootstrapCarouselStop'] = 'Markocupic\BootstrapCarousel\CarouselStop';

// Wrapper settings
$GLOBALS['TL_WRAPPERS']['start'][] = 'bootstrapCarouselStart';
$GLOBALS['TL_WRAPPERS']['separator'][] = 'bootstrapCarouselSeparator';
$GLOBALS['TL_WRAPPERS']['stop'][] = 'bootstrapCarouselStop';
