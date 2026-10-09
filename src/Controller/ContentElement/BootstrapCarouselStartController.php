<?php

declare(strict_types=1);

/*
 * This file is part of Contao Bootstrap Carousel Bundle.
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
use Contao\CoreBundle\Twig\FragmentTemplate;
use Markocupic\BootstrapCarouselBundle\Carousel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#[AsContentElement(BootstrapCarouselStartController::TYPE, category: 'bootstrap-carousel', template: 'content_element/bootstrap_carousel_start')]
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

    protected function getResponse(FragmentTemplate $template, ContentModel $model, Request $request): Response
    {
        $template->set('carousel_id', $this->getCarouselHtmlId($model));
        $template->set('slide_count', $this->countItems($model));
        $template->set('fade', (bool) $model->carouselFade);
        $template->set('interval', (int) $model->carouselInterval);
        $template->set('autoplay', (bool) $model->carouselAutoplay);
        $template->set('keyboard', (bool) $model->carouselReactToKeyboard);
        $template->set('pause_on_hover', (bool) $model->carouselPauseOnHover);
        $template->set('wrap', (bool) $model->carouselInfiniteCycle);
        $template->set('indicators', (bool) $model->carouselAddIndicators);

        return $template->getResponse();
    }
}
