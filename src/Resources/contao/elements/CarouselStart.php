<?php

/**
 * Bootstrap Carousel Bundle for Contao CMS
 *
 * Copyright (C) 2005-2018 Marko Cupic
 *
 * @package Bootstrap Carousel Bundle
 * @link    https://www.github.com/markocupic/bootstrap-carousel-bundle
 *
 */

namespace Markocupic\BootstrapCarousel;

use Contao\ContentModel;

/**
 * Class CarouselStart
 * @package Markocupic\BootstrapCarousel
 */
class CarouselStart extends Carousel
{

    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_bootstrapCarouselStart';

    /**
     * @return string
     */
    public function generate()
    {
        if (TL_MODE == 'BE')
        {
            $this->strTemplate = 'be_wildcard';

            /** @var BackendTemplate|object $objTemplate */
            $objTemplate = new \BackendTemplate($this->strTemplate);

            $this->Template = $objTemplate;
            $this->Template->title = $this->headline;
            return $this->Template->parse();
        }

        return parent::generate();
    }

    /**
     * Generate the content element
     */
    protected function compile()
    {
        /** @var ContentModel $model */
        $model = $this->getModel();

        $this->Template->start = $this->getRelatedStart($model);
        $this->Template->stop = $this->getRelatedStop($model);
        $this->Template->separators = $this->getRelatedSeparators($model);
        if ($this->getRelatedStart($model) !== null)
        {
            $this->Template->identifier = sprintf(static::$IDENTIFIER, $this->getRelatedStart($model)->id);
        }
        $this->Template->countItems = $this->countItems($model);
        $this->Template->carouselId = $this->getCarouselId($model);
        $this->Template->carouselAutoplay = $this->carouselAutoplay ? 'carousel' : 'false';
        $this->Template->carouselReactToKeyboard = $this->carouselReactToKeyboard ? 'true' : 'false';
        $this->Template->carouselPauseOnHover = $this->carouselPauseOnHover ? 'hover' : 'false';
        $this->Template->carouselInfiniteCycle = $this->carouselInfiniteCycle ? 'true' : 'false';
    }
}
