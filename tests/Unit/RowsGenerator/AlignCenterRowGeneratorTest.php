<?php

namespace Unit\RowsGenerator;

use App\Library\RowGenerator\AlignCenterRowGenerator;
use App\Library\Shapes\Star;
use PHPUnit\Framework\TestCase;

/**
 * The row generator test
 * There are two scenario on generating the rows. Imagine a 5 rows shape. So the maximum column number of the shape
 * will be 7. So all the rows must contain 7 characters. Some visible and some hidden.
 * The first row have only one visible character but the middle row will have 7 visible characters. So the two
 * scenarios:
 * 1- Rows with hidden rows
 * 2- Rows without hidden rows
 * PHP version >= 7.0
 *
 * @category Tests
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 */
class AlignCenterRowGeneratorTest extends TestCase
{
    /**
     * Test rows with hidden rows
     */
    public function testRowWithHiddenRows()
    {
        $star = new Star();
        $star->setHeight(5);
        $rowGenerator = new AlignCenterRowGenerator($star);
        $rows = $rowGenerator->getRows();
        $this->assertEquals([" ", " ", " ", "+", " ", " ", " "], $rows->get(0));
    }

    /**
     * Test rows without hidden rows
     */
    public function testRowsWithoutHiddenRows()
    {
        $star = new Star();
        $star->setHeight(5);
        $rowGenerator = new AlignCenterRowGenerator($star);
        $rows = $rowGenerator->getRows();
        $this->assertEquals(["+", "X", "X", "X", "X", "X", "+"], $rows->get(2));
    }
}
