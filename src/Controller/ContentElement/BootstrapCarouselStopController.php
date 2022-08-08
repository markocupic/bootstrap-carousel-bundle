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

namespace Markocupic\BootstrapCarouselBundle\Controller\ContentElement;

use Contao\ContentModel;
use Contao\CoreBundle\ServiceAnnotation\ContentElement;
use Contao\PageModel;
use Contao\Template;
use Markocupic\BootstrapCarouselBundle\Carousel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @ContentElement(BootstrapCarouselStopController::TYPE, category="bootstrap-carousel", template="ce_bootstrapCarouselStop")
 */
class BootstrapCarouselStopController extends Carousel
{
    public const TYPE = 'bootstrapCarouselStop';

    public function __invoke(Request $request, ContentModel $model, string $section, array $classes = null, PageModel $pageModel = null): Response
    {
        $model->title = $model->headline;

        return parent::__invoke($request, $model, $section, $classes);
    }

    protected function getResponse(Template $template, ContentModel $model, Request $request): Response
    {
        $template->start = $this->getRelatedStart($model);
        $template->stop = $this->getRelatedStop($model);
        $template->separators = $this->getRelatedSeparators($model);

        $template->identifier = '';

        if (null !== $this->getRelatedStart($model)) {
            $template->identifier = sprintf(self::$IDENTIFIER, $this->getRelatedStart($model)->id);
        }

        // Labels
        $template->carouselPrevious = $GLOBALS['TL_LANG']['MSC']['carouselPrev'];
        $template->carouselNext = $GLOBALS['TL_LANG']['MSC']['carouselNext'];

        return $template->getResponse();
    }
}
