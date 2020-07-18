<?php

namespace App\Library\Shapes;

/**
 * The star
 * PHP version >= 7.0
 *
 * @category Shapes
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 */
class Star extends Shape
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
        $rowCharacterCount = 1;
        while ($this->shapeIsNotComplete($rowIndex)) {
            $row = $this->getRow($rowIndex, $rowCharacterCount);
            $this->rowsCharacters->add($row);
            $rowCharacterCount = $this->updateCharacterCount($rowIndex, $rowCharacterCount);
            $rowIndex++;
        }
        $this->rowsCharacters->add(["+"]);
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
        return $rowIndex < $this->height - 1;
    }

    /**
     * get the row array
     *
     * @param int $rowCharacterCount The row character count
     * @param int $rowIndex          The row index
     *
     * @return array|string[]
     */
    private function getRow(int $rowIndex, int $rowCharacterCount)
    {
        $row = array_fill(0, $rowCharacterCount, "X");
        if ($this->isMiddleRow($rowIndex)) {
            array_unshift($row, "+");
            $row[] = "+";
        }
        return $row;
    }

    /**
     * Update the character count of row based on previous row
     *
     * @param int $rowIndex          The row index
     * @param int $rowCharacterCount The previous character count
     *
     * @return int
     */
    private function updateCharacterCount(int $rowIndex, int $rowCharacterCount)
    {
        if ($rowIndex < $this->getMiddleIndex()) {
            $rowCharacterCount = $rowCharacterCount + 4;
        } else {
            $rowCharacterCount = $rowCharacterCount - 4;
        }
        if ($this->height > 7 && ($rowIndex == 1 || $rowIndex == $this->height - 2)) {
            $rowCharacterCount = $rowCharacterCount - 2;
        }
        return $rowCharacterCount < 1 ? 1 : $rowCharacterCount;
    }

    /**
     * Get the characters of row
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

}
