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

#[AsContentElement(BootstrapCarouselSeparatorController::TYPE, category: 'bootstrap-carousel', template: 'content_element/bootstrap_carousel_separator')]
class BootstrapCarouselSeparatorController extends Carousel
{
    public const TYPE = 'bootstrapCarouselSeparator';

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

        return $template->getResponse();
    }
}
