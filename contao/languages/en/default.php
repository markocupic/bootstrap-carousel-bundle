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

use Markocupic\BootstrapCarouselBundle\Controller\ContentElement\BootstrapCarouselSeparatorController;
use Markocupic\BootstrapCarouselBundle\Controller\ContentElement\BootstrapCarouselStartController;
use Markocupic\BootstrapCarouselBundle\Controller\ContentElement\BootstrapCarouselStopController;

/*
 * Labels
 */
$GLOBALS['TL_LANG']['CTE']['bootstrap-carousel'] = 'Carousel elements';
$GLOBALS['TL_LANG']['MSC']['bootstrap-carousel'] = 'Bootstrap Carousel: %s';

/*
 * Buttons
 */
$GLOBALS['TL_LANG']['MSC']['carouselPrev'] = 'Previous';
$GLOBALS['TL_LANG']['MSC']['carouselNext'] = 'Next';

/*
 * Content elements
 */
$GLOBALS['TL_LANG']['CTE'][BootstrapCarouselStartController::TYPE] = ['Carousel Start', 'The start-element of the Bootstrap Carousel opens the Bootstrap Carousel.'];
$GLOBALS['TL_LANG']['CTE'][BootstrapCarouselSeparatorController::TYPE] = ['Carousel part-element', 'The Part-element separates parts of the Bootstrap Carousel.'];
$GLOBALS['TL_LANG']['CTE'][BootstrapCarouselStopController::TYPE] = ['Carousel end-element', 'The end-element of the Bootstrap Carousel closes the Bootstrap Carousel.'];
