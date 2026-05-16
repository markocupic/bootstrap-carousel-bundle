<?php

declare(strict_types=1);

/*
 * This file is part of Bootstrap Carousel Bundle.
 *
 * (c) Marko Cupic <m.cupic@gmx.ch>
 * @license MIT
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 * @link https://github.com/markocupic/bootstrap-carousel-bundle
 */

namespace Markocupic\BootstrapCarouselBundle\Controller\ContentElement;

use Contao\ContentModel;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\CoreBundle\Routing\ScopeMatcher;
use Contao\Template;
use Markocupic\BootstrapCarouselBundle\Carousel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#[AsContentElement(BootstrapCarouselStartController::TYPE, category: 'bootstrap-carousel', template: 'ce_bootstrapCarouselStart')]
class BootstrapCarouselStartController extends Carousel
{
    public const TYPE = 'bootstrapCarouselStart';

    public function __construct(protected readonly ScopeMatcher $scopeMatcher)
    {
    }

    /**
     * @param array<string>|null $classes
     */
    public function __invoke(Request $request, ContentModel $model, string $section, array|null $classes = null): Response
    {
        if ($this->scopeMatcher->isBackendRequest($request)) {
            return new Response('', Response::HTTP_NO_CONTENT);
        }

        return parent::__invoke($request, $model, $section, $classes);
    }

    protected function getResponse(Template $template, ContentModel $model, Request $request): Response
    {
        $arrTemplate = [];
        $arrTemplate['start'] = $this->getRelatedStart($model);
        $arrTemplate['stop'] = $this->getRelatedStop($model);
        $arrTemplate['separators'] = $this->getRelatedSeparators($model);
        $arrTemplate['identifier'] = '';

        if (null !== ($relatedStart = $this->getRelatedStart($model))) {
            $arrTemplate['identifier'] = \sprintf(parent::IDENTIFIER, (string) $relatedStart->id);
        }

        // Data attributes
        $arrTemplate['carouselFade'] = (bool) $model->carouselFade;
        $arrTemplate['carouselInterval'] = (int) $model->carouselInterval;
        $arrTemplate['carouselAutoplay'] = $model->carouselAutoplay ? 'carousel' : 'false';
        $arrTemplate['carouselReactToKeyboard'] = $model->carouselReactToKeyboard ? 'true' : 'false';
        $arrTemplate['carouselPauseOnHover'] = $model->carouselPauseOnHover ? 'hover' : 'false';
        $arrTemplate['carouselInfiniteCycle'] = $model->carouselInfiniteCycle ? 'true' : 'false';

        $arrTemplate['countItems'] = $this->countItems($model);
        $arrTemplate['arrCount'] = range(0, $this->countItems($model) - 1);
        $arrTemplate['carouselId'] = $this->getCarouselId($model);
        $arrTemplate['addIndicators'] = $model->carouselAddIndicators;

        $template->setData(array_merge($template->getData(), $arrTemplate));

        return $template->getResponse();
    }
}
