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

use Contao\ContentElement;
use Contao\ContentModel;
use Contao\Model\Collection;

/**
 * Class Carousel
 * @package Markocupic\BootstrapCarousel
 */
abstract class Carousel extends ContentElement
{
    /**
     * @var string
     */
    protected static $START = 'bootstrapCarouselStart';

    /**
     * @var string
     */
    protected static $SEPARATOR = 'bootstrapCarouselSeparator';

    /**
     * @var string
     */
    protected static $STOP = 'bootstrapCarouselStop';

    /**
     * @var string
     */
    protected static $IDENTIFIER = 'bootstrap-carousel-%s';

    /**
     * @param ContentModel $objContent
     * @return Collection|null
     */
    protected function getRelatedSeparators(ContentModel $objContent): ?Collection
    {
        $objStart = $this->getRelatedStart($objContent);
        $objStop = $this->getRelatedStop($objContent);

        if ($objStart !== null && $objStop !== null)
        {
            return ContentModel::findBy(
                ['tl_content.pid=?', 'tl_content.invisible=?', 'tl_content.type=?', 'tl_content.sorting>?', 'tl_content.sorting<?'],
                [$objContent->pid, '', static::$SEPARATOR, $objStart->sorting, $objStop->sorting],
                ['order' => 'tl_content.sorting DESC']
            );
        }

        return null;
    }

    /**
     * @param ContentModel $objContent
     * @return ContentModel|null
     */
    protected function getRelatedStart(ContentModel $objContent): ?ContentModel
    {
        return ContentModel::findOneBy(
            ['tl_content.pid=?', 'tl_content.invisible=?', 'tl_content.type=?', 'tl_content.sorting<=?'],
            [$objContent->pid, '', static::$START, $objContent->sorting],
            [
                'order' => 'tl_content.sorting DESC',
            ]
        );
    }

    /**
     * @param ContentModel $objContent
     * @return ContentModel|null
     */
    protected function getRelatedStop(ContentModel $objContent): ?ContentModel
    {
        return ContentModel::findOneBy(
            ['tl_content.pid=?', 'tl_content.invisible=?', 'tl_content.type=?', 'tl_content.sorting>=?'],
            [$objContent->pid, '', static::$STOP, $objContent->sorting],
            [
                'order' => 'tl_content.sorting ASC',
            ]
        );
    }

    /**
     * @param ContentModel $objContent
     * @return int
     */
    protected function countItems(ContentModel $objContent)
    {
        $objSeparators = $this->getRelatedSeparators($objContent);
        if ($objSeparators !== null)
        {
            return count($objSeparators) + 1;
        }
        return 1;
    }

    /**
     * @param ContentModel $objContent
     * @return int|null
     */
    protected function getCarouselId(ContentModel $objContent)
    {
        $objStart = $this->getRelatedStart($objContent);
        if ($objStart !== null)
        {
            return $objStart->id;
        }

        return null;
    }
}

