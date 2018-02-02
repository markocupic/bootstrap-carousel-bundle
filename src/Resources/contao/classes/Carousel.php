<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 01.02.2018
 * Time: 16:58
 */

namespace Markocupic\BootstrapCarousel;


abstract class Carousel extends \ContentElement
{

    protected static $START = 'bootstrapCarouselStart';
    protected static $SEPARATOR = 'bootstrapCarouselSeparator';
    protected static $STOP = 'bootstrapCarouselStop';
    protected static $IDENTIFIER = 'BootstrapCarousel%s';

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
                ->execute($objContent->pid, '', self::$SEPARATOR, $objStart->sorting, $objStop->sorting);
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

        $objDb = \Database::getInstance()->prepare('SELECT * FROM tl_content WHERE pid = ? AND invisible=? AND type=? AND sorting <= ? ORDER BY sorting ASC')->limit(1)
            ->execute($objContent->pid, '', self::$START, $objContent->sorting);
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
            ->execute($objContent->pid, '', self::$STOP, $objContent->sorting);
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

