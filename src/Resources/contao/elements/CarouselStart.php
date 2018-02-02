<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 01.02.2018
 * Time: 16:58
 */

namespace Markocupic\BootstrapCarousel;


class CarouselStart extends Carousel
{


    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_bootstrapCarouselStart';

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
        $this->Template->identifier = sprintf(self::$IDENTIFIER, $this->getRelatedStart($this)->id);


        $this->Template->countItems = $this->countItems($this);
        $this->Template->carouselId = $this->getCarouselId($this);
        $this->Template->carouselAutoplay = $this->carouselAutoplay ? 'carousel' : 'false';
        $this->Template->carouselReactToKeyboard = $this->carouselReactToKeyboard ? 'true' : 'false';
        $this->Template->carouselPauseOnHover = $this->carouselPauseOnHover ? 'hover' : 'false';
        $this->Template->carouselInfiniteCycle = $this->carouselInfiniteCycle ? 'true' : 'false';


        // Slider configuration
        //$this->Template->config = $this->sliderDelay . ',' . $this->sliderSpeed . ',' . $this->sliderStartSlide . ',' . $this->sliderContinuous;
    }



}