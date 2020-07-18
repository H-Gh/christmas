<?php

namespace App\Library\Shapes;

use Fox\Collection\Collection;
use Fox\Collection\CollectionInterface;

/**
 * The abstract shape
 * PHP version >= 7.0
 *
 * @category Shapes
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 */
abstract class Shape
{
    /**
     * The height of the shape
     *
     * @var int
     */
    protected $height;

    /**
     * The collection that holds the rows data
     *
     * @var CollectionInterface
     */
    protected $rowsCharacters;

    /**
     * Shape constructor.
     */
    public function __construct()
    {
        $heights = [5, 7, 11, 15];
        $this->height = $heights[array_rand($heights)];
        $this->rowsCharacters = new Collection();
    }

    /**
     * Set the height of the shape
     *
     * @param int $height
     *
     * @return Shape
     */
    public function setHeight(?int $height): Shape
    {
        if (!empty($height)) {
            $this->height = $height;
        }
        return $this;
    }

    /**
     * Get the height of the shape
     *
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $rowIndex
     *
     * @return bool
     */
    protected function isFirstRow(int $rowIndex): bool
    {
        return $rowIndex == 0;
    }

    /**
     * @return int
     */
    protected function getMiddleIndex(): int
    {
        return (int)round($this->height / 2, 0, PHP_ROUND_HALF_DOWN);
    }

    /**
     * @param int $rowIndex
     *
     * @return bool
     */
    protected function isMiddleRow(int $rowIndex): bool
    {
        return $rowIndex == $this->getMiddleIndex();
    }

    /**
     * @param int $rowIndex
     *
     * @return bool
     */
    protected function isLastRow(int $rowIndex): bool
    {
        return $rowIndex == ($this->height - 1);
    }

    /**
     * Get the character of row
     *
     * @param int $rowIndex The row index
     *
     * @return array
     */
    abstract public function getRowCharacters(int $rowIndex): array;
}
