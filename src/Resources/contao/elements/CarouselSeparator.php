<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 01.02.2018
 * Time: 16:58
 */

namespace Markocupic\BootstrapCarousel;


class CarouselSeparator extends Carousel
{

    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_bootstrapCarouselSeparator';

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
            $this->Template->identifier = sprintf(self::$IDENTIFIER, $this->getRelatedStart($this)->id);
        }
    }
}