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

namespace Markocupic\BootstrapCarouselBundle;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\Model\Collection;

abstract class Carousel extends AbstractContentElementController
{
    protected static string $START = 'bootstrapCarouselStart';
    protected static string $SEPARATOR = 'bootstrapCarouselSeparator';
    protected static string $STOP = 'bootstrapCarouselStop';
    protected static string $IDENTIFIER = 'bootstrap-carousel-%s';

    protected function getRelatedSeparators(ContentModel $objContent): Collection|null
    {
        $objStart = $this->getRelatedStart($objContent);
        $objStop = $this->getRelatedStop($objContent);

        if (null !== $objStart && null !== $objStop) {
            return ContentModel::findBy(
                ['tl_content.pid = ?', 'tl_content.invisible = ?', 'tl_content.type = ?', 'tl_content.sorting > ?', 'tl_content.sorting < ?'],
                [$objContent->pid, '', static::$SEPARATOR, $objStart->sorting, $objStop->sorting],
                ['order' => 'tl_content.sorting DESC']
            );
        }

        return null;
    }

    protected function getRelatedStart(ContentModel $objContent): ContentModel|null
    {
        return ContentModel::findOneBy(
            ['tl_content.pid = ?', 'tl_content.invisible = ?', 'tl_content.type = ?', 'tl_content.sorting <= ?'],
            [$objContent->pid, '', static::$START, $objContent->sorting],
            [
                'order' => 'tl_content.sorting DESC',
            ]
        );
    }

    protected function getRelatedStop(ContentModel $objContent): ContentModel|null
    {
        return ContentModel::findOneBy(
            ['tl_content.pid = ?', 'tl_content.invisible = ?', 'tl_content.type = ?', 'tl_content.sorting >= ?'],
            [$objContent->pid, '', static::$STOP, $objContent->sorting],
            [
                'order' => 'tl_content.sorting ASC',
            ]
        );
    }

    protected function countItems(ContentModel $objContent): int
    {
        $objSeparators = $this->getRelatedSeparators($objContent);

        if (null !== $objSeparators) {
            return \count($objSeparators) + 1;
        }

        return 1;
    }

    protected function getCarouselId(ContentModel $objContent): int|null
    {
        $objStart = $this->getRelatedStart($objContent);

        if (null !== $objStart) {
            return (int) $objStart->id;
        }

        return null;
    }
}
