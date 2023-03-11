<?php

declare(strict_types=1);

/*
 * This file is part of Contao Bootstrap Carousel Bundle.
 *
 * (c) Marko Cupic 2023 <m.cupic@gmx.ch>
 * @license MIT
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 * @link https://github.com/markocupic/bootstrap-carousel-bundle
 */

use Markocupic\BootstrapCarouselBundle\Controller\ContentElement\BootstrapCarouselSeparatorController;
use Markocupic\BootstrapCarouselBundle\Controller\ContentElement\BootstrapCarouselStartController;
use Markocupic\BootstrapCarouselBundle\Controller\ContentElement\BootstrapCarouselStopController;

/*
 * Labels
 */
$GLOBALS['TL_LANG']['CTE']['bootstrap-carousel'] = 'Bootstrap Carousel Slider';
$GLOBALS['TL_LANG']['MSC']['bootstrap-carousel'] = 'Bootstrap Carousel: %s';

/*
 * Buttons
 */
$GLOBALS['TL_LANG']['MSC']['carouselPrev'] = 'Rückwärts';
$GLOBALS['TL_LANG']['MSC']['carouselNext'] = 'Vorwärts';

/*
 * Content elements
 */
$GLOBALS['TL_LANG']['CTE'][BootstrapCarouselStartController::TYPE] = ['Carousel Umschlag Anfang', 'Beginnt ein Bootstrap Carousel.'];
$GLOBALS['TL_LANG']['CTE'][BootstrapCarouselSeparatorController::TYPE] = ['Carousel Trennelement', 'Trennelement für das Bootstrap Carousel'];
$GLOBALS['TL_LANG']['CTE'][BootstrapCarouselStopController::TYPE] = ['Carousel Umschlag Ende', 'Ende des Bootstrap Carousels'];
