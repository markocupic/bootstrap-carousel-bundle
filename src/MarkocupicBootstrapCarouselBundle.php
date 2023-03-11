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

namespace Markocupic\BootstrapCarouselBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Configures the bootstrap-carousel-bundle.
 */
class MarkocupicBootstrapCarouselBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
