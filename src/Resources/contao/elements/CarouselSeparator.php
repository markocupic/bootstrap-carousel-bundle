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
 * Class CarouselSeparator
 * @package Markocupic\BootstrapCarousel
 */
class CarouselSeparator extends Carousel
{

    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_bootstrapCarouselSeparator';

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
        $this->Template->start = $this->getRelatedStart($this);
        $this->Template->stop = $this->getRelatedStop($this);
        $this->Template->separators = $this->getRelatedSeparators($this);


        $this->Template->start = $this->getRelatedStart($this);
        $this->Template->stop = $this->getRelatedStop($this);
        $this->Template->separators = $this->getRelatedSeparators($this);
        if ($this->getRelatedStart($this) !== null)
        {
            $this->Template->identifier = sprintf(static::$IDENTIFIER, $this->getRelatedStart($this)->id);
        }
    }
}