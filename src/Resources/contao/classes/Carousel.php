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
 * Class Carousel
 * @package Markocupic\BootstrapCarousel
 */
abstract class Carousel extends \ContentElement
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
     * @param $objContent
     * @return int
     */
    protected function countItems($objContent)
    {

        $objSeparators = $this->getRelatedSeparators($objContent);
        if ($objSeparators !== null)
        {
            return count($objSeparators) + 1;
        }
        return 1;

    }

    /**
     * @param $objContent
     * @return \Contao\ContentModel|null
     */
    protected function getRelatedSeparators($objContent)
    {
        $objContent = \ContentModel::findByPk($objContent->id);

        $objStart = $this->getRelatedStart($objContent);
        $objStop = $this->getRelatedStop($objContent);


        if ($objStart !== null && $objStop !== null)
        {
            $objDb = \Database::getInstance()->prepare('SELECT * FROM tl_content WHERE pid = ? AND invisible=? AND type=? AND sorting > ? AND sorting < ? ORDER BY sorting DESC')
                ->execute($objContent->pid, '', static::$SEPARATOR, $objStart->sorting, $objStop->sorting);
            if ($objDb->numRows)
            {
                $ids = $objDb->fetchEach('id');

                $objSeparators = \ContentModel::findMultipleByIds($ids);
                if ($objSeparators !== null)
                {
                    return $objSeparators;
                }
            }
        }

        return null;
    }

    /**
     * @param $objContent
     * @return \Contao\ContentModel|null
     */
    protected function getRelatedStart($objContent)
    {
        $objContent = \ContentModel::findByPk($objContent->id);

        $objDb = \Database::getInstance()->prepare('SELECT * FROM tl_content WHERE pid = ? AND invisible=? AND type=? AND sorting <= ? ORDER BY sorting DESC')->limit(1)
            ->execute($objContent->pid, '', static::$START, $objContent->sorting);
        if ($objDb->numRows)
        {
            $objStart = \ContentModel::findByPk($objDb->id);
            if ($objStart !== null)
            {
                return $objStart;
            }
        }
        return null;
    }

    /**
     * @param $objContent
     * @return \Contao\ContentModel|null
     */
    protected function getRelatedStop($objContent)
    {
        $objContent = \ContentModel::findByPk($objContent->id);

        $objDb = \Database::getInstance()->prepare('SELECT * FROM tl_content WHERE pid = ? AND invisible=? AND type=? AND sorting >= ? ORDER BY sorting DESC')->limit(1)
            ->execute($objContent->pid, '', static::$STOP, $objContent->sorting);
        if ($objDb->numRows)
        {
            $objStop = \ContentModel::findByPk($objDb->id);
            if ($objStop !== null)
            {
                return $objStop;
            }
        }
        return null;
    }

    /**
     * @param $objContent
     * @return int|null
     */
    protected function getCarouselId($objContent)
    {
        $objStart = $this->getRelatedStart($objContent);
        if ($objStart !== null)
        {
            return $objStart->id;
        }

        return null;
    }
}

