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

/**
 * Class CarouselStop
 * @package Markocupic\BootstrapCarousel
 */
class CarouselStop extends Carousel
{

    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_bootstrapCarouselStop';


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
        $this->Template->start = $this->getRelatedStart($this);
        $this->Template->stop = $this->getRelatedStop($this);
        $this->Template->separators = $this->getRelatedSeparators($this);
        if ($this->getRelatedStart($this) !== null)
        {
            $this->Template->identifier = sprintf(self::$IDENTIFIER, $this->getRelatedStart($this)->id);
        }

        // Labels
        $this->Template->carouselPrevious = $GLOBALS['TL_LANG']['MSC']['carouselPrev'];
        $this->Template->carouselNext = $GLOBALS['TL_LANG']['MSC']['carouselNext'];

    }
}