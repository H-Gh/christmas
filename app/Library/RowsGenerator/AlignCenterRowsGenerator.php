<?php

namespace App\Library\RowsGenerator;

/**
 * The row generator that generate the single line per row
 * PHP version >= 7.0
 *
 * @category Row Generators
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 */
class AlignCenterRowGenerator extends RowGenerator
{
    /**
     * This method will process the bag and build the rows based on the biggest row size
     * As the name of class says, It aligns the rows center
     *
     * @return void
     */
    protected function generateRows()
    {
        $loopIndex = 0;
        while ($loopIndex < $this->shape->getHeight()) {
            $row = $this->shape->getRowCharacters($loopIndex);
            if ($this->rowIsNotComplete($row)) {
                $row = $this->extendRow($row);
            }
            $this->rows->add($row);
            $loopIndex++;
        }
    }

    /**
     * Check what if the size of row is maximum or not
     *
     * @param array $characters The characters array
     *
     * @return bool
     */
    protected function rowIsNotComplete(array $characters): bool
    {
        return count($characters) != $this->mostSize;
    }

    /**
     * Add spaces to row
     *
     * @param array $characters the characters array
     *
     * @return array
     */
    protected function extendRow(array $characters): array
    {
        $numberOfEmptyCells = $this->getNumberOfEmptyCells($characters);
        $arrayOfSpaces = $this->getSpaceArray($numberOfEmptyCells);
        $characters = array_merge($arrayOfSpaces, $characters, $arrayOfSpaces);
        return $characters;
    }

    /**
     * Get the number of the empty cells
     *
     * @param array $characters The characters array
     *
     * @return int
     */
    private function getNumberOfEmptyCells(array $characters)
    {
        return ($this->mostSize - count($characters)) / 2;
    }

    /**
     * Get an array with elements of space character
     *
     * @param int $size The size of array
     *
     * @return array
     */
    private function getSpaceArray(int $size)
    {
        return array_fill(0, $size, " ");
    }
}
