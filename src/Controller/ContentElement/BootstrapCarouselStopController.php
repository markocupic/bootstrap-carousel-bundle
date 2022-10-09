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
use Symfony\Contracts\Translation\TranslatorInterface;

#[AsContentElement(BootstrapCarouselStopController::TYPE, category: 'bootstrap-carousel')]
class BootstrapCarouselStopController extends Carousel
{
    public const TYPE = 'bootstrapCarouselStop';

    protected ScopeMatcher $scopeMatcher;
    protected TranslatorInterface $translator;

    public function __construct(ScopeMatcher $scopeMatcher, TranslatorInterface $translator)
    {
        $this->scopeMatcher = $scopeMatcher;
        $this->translator = $translator;
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
            $template->identifier = sprintf(self::$IDENTIFIER, (string) $relatedStart->id);
        }

        // Labels
        $template->carouselPrevious = $this->translator->trans('MSC.carouselPrev', [], 'contao_default');
        $template->carouselNext = $this->translator->trans('MSC.carouselNext', [], 'contao_default');

        return $template->getResponse();
    }
}
