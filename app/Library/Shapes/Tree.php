<?php

namespace App\Library\Shapes;

/**
 * The tree
 * PHP version >= 7.0
 *
 * @category Shapes
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 */
class Tree extends Shape
{
    /**
     * Generate the rows characters
     *
     * @return void
     */
    private function generateRowsCharacters()
    {
        $this->rowsCharacters->add(["+"]);
        $rowIndex = 1;
        while ($this->shapeIsNotComplete($rowIndex)) {
            $row = $this->getRow($rowIndex);
            $this->rowsCharacters->add($row);
            $rowIndex++;
        }
    }

    /**
     * Get the row characters
     *
     * @param int $rowIndex The row index
     *
     * @return array
     */
    public function getRowCharacters(int $rowIndex): array
    {
        if ($this->rowsCharacters->isEmpty()) {
            $this->generateRowsCharacters();
        }
        return $this->rowsCharacters->get($rowIndex);
    }

    /**
     * CHeck the condition of loop based on the row index of the shape
     *
     * @param int $rowIndex
     *
     * @return bool
     */
    private function shapeIsNotComplete(int $rowIndex)
    {
        return $rowIndex < $this->height;
    }

    /**
     * Get the row character array
     *
     * @param int $rowIndex The row index
     *
     * @return array
     */
    private function getRow(int $rowIndex)
    {
        return array_fill(0, (2 * ($rowIndex - 1)) + 1, "X");
    }
}
