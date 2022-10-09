<?php

declare(strict_types=1);

/*
 * This file is part of Bootstrap Carousel Bundle.
 *
 * (c) Marko Cupic 2022 <m.cupic@gmx.ch>
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

#[AsContentElement(BootstrapCarouselStartController::TYPE, category: 'bootstrap-carousel')]
class BootstrapCarouselStartController extends Carousel
{
    public const TYPE = 'bootstrapCarouselStart';

    protected ScopeMatcher $scopeMatcher;

    public function __construct(ScopeMatcher $scopeMatcher)
    {
        $this->scopeMatcher = $scopeMatcher;
    }

    public function __invoke(Request $request, ContentModel $model, string $section, array $classes = null): Response
    {
        if ($this->scopeMatcher->isBackendRequest($request)) {
            return new Response('', Response::HTTP_NO_CONTENT);
        }

        return parent::__invoke($request, $model, $section, $classes);
    }

    protected function getResponse(Template $template, ContentModel $model, Request $request): Response
    {
        $template->start = $this->getRelatedStart($model);
        $template->stop = $this->getRelatedStop($model);
        $template->separators = $this->getRelatedSeparators($model);

        $template->identifier = '';

        if (null !== ($relatedStart = $this->getRelatedStart($model))) {
            $template->identifier = sprintf(static::$IDENTIFIER, (string) $relatedStart->id);
        }

        $template->countItems = $this->countItems($model);
        $template->arrCount = range(0, $this->countItems($model) - 1);
        $template->carouselId = $this->getCarouselId($model);
        $template->carouselAutoplay = isset($model->carouselAutoplay) && $model->carouselAutoplay ? 'carousel' : 'false';
        $template->carouselReactToKeyboard = isset($model->carouselReactToKeyboard) && $model->carouselReactToKeyboard ? 'true' : 'false';
        $template->carouselPauseOnHover = isset($model->carouselPauseOnHover) && $model->carouselPauseOnHover ? 'hover' : 'false';
        $template->carouselInfiniteCycle = isset($model->carouselInfiniteCycle) && $model->carouselInfiniteCycle ? 'true' : 'false';
        $template->addIndicators = isset($model->addIndicators) && $model->addIndicators;
        $template->carouselFade = isset($model->carouselFade) && $model->carouselFade ? true : false;

        return $template->getResponse();
    }
}
