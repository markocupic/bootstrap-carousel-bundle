<?php

declare(strict_types=1);

/*
 * This file is part of Carousel Bundle, a content element for the Contao CMS.
 *
 * (c) Marko Cupic 2022 <m.cupic@gmx.ch>
 * @license MIT
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 * @link https://github.com/markocupic/bootstrap-carousel-bundle
 */

use Markocupic\BootstrapCarouselBundle\Controller\ContentElement\BootstrapCarouselSeparatorController;
use Markocupic\BootstrapCarouselBundle\Controller\ContentElement\BootstrapCarouselStartController;
use Markocupic\BootstrapCarouselBundle\Controller\ContentElement\BootstrapCarouselStopController;

/*
 * Wrappers
 */
$GLOBALS['TL_WRAPPERS']['start'][] = BootstrapCarouselStartController::TYPE;
$GLOBALS['TL_WRAPPERS']['separator'][] = BootstrapCarouselSeparatorController::TYPE;
$GLOBALS['TL_WRAPPERS']['stop'][] = BootstrapCarouselStopController::TYPE;
