<?php

namespace App\Library\RowsGenerator;

use App\Library\Shapes\Shape;
use Fox\Collection\Collection;
use Fox\Collection\CollectionInterface;

/**
 * The abstract class of shape generators
 * PHP version >= 7.0
 *
 * @category Row Generators
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 */
abstract class RowsGenerator
{
    /**
     * The collection to hold the rows
     *
     * @var CollectionInterface
     */
    protected $rows;

    /**
     * The most size of rows
     *
     * @var int
     */
    protected $mostSize = 0;

    /**
     * The shape
     *
     * @var Shape
     */
    protected $shape;

    /**
     * AlignCenterShapeGenerator constructor.
     *
     * @param Shape $shape The shape
     */
    public function __construct(Shape $shape)
    {
        $this->rows = new Collection();
        $this->shape = $shape;
        $this->setMostRowSize();
        $this->generateRows();
    }

    /**
     * Get the most size of rows
     *
     * @return void
     */
    private function setMostRowSize(): void
    {
        $loopIndex = 0;
        while ($loopIndex < $this->shape->getHeight()) {
            $rowCount = count($this->shape->getRowCharacters($loopIndex));
            $this->mostSize = $rowCount > $this->mostSize ? $rowCount : $this->mostSize;
            $loopIndex++;
        }
    }

    /**
     * Get the rows bag
     *
     * @return CollectionInterface
     */
    public function getRows(): CollectionInterface
    {
        return $this->rows;
    }

    /**
     * This method will process the bag and rebuild the rows of bag based on the biggest row size
     *
     * @return void
     */
    abstract protected function generateRows();
}
