<?php

namespace Unit\Shape;

use App\Library\Shapes\Star;
use PHPUnit\Framework\TestCase;

/**
 * The unit test for the star shape
 * Shapes are the holder of data. So we can test getting the data. The data that are inside a shape are:
 * 1- Height of shape
 * 2- Characters of rows
 * PHP version >= 7.0
 *
 * @category Tests
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 */
class StarShapeTest extends TestCase
{
    /**
     * Test random height
     * Available heights for shapes are 5, 7, 11 and 15
     * If you not assign any height to shape, it will pick a random itself
     */
    public function testRandomHeight()
    {
        $star = new Star();
        $this->assertContains($star->getHeight(), [5, 7, 11, 15]);
    }

    /**
     * Test the wrong height set
     * Available heights for shapes are 5, 7, 11 and 15
     * Setting the wrong height to the shape, will cause nothing
     * So the height after setting wrong height must be same as before it
     */
    public function testSetWrongShapeHeight()
    {
        $star = new Star();
        $height = $star->getHeight();
        $star->setHeight(10);
        $this->assertEquals($height, $star->getHeight());
    }

    /**
     * Test the correct height set
     * Available heights for shapes are 5, 7, 11 and 15
     * Setting the correct height to the shape, will change the height of the shape
     * So the height after setting correct height must be changed
     */
    public function testSetCorrectShapeHeight()
    {
        $star = new Star();
        $star->setHeight(15);
        $this->assertEquals(15, $star->getHeight());
    }

    /**
     * Test the characters for a star with height of the 5
     * The point is here, the 3 character row for the stars that have less than 7 rows must not be considered
     */
    public function testFiveRowsCharacters()
    {
        $star = new Star();
        $star->setHeight(5);
        $this->assertEquals(["+"], $star->getRowCharacters(0));
        $this->assertEquals(["X"], $star->getRowCharacters(1));
        $this->assertEquals(["+", "X", "X", "X", "X", "X", "+"], $star->getRowCharacters(2));
        $this->assertEquals(["X"], $star->getRowCharacters(3));
        $this->assertEquals(["+"], $star->getRowCharacters(4));
    }

    /**
     * Test the characters for a star with height of the 7
     * The point is here, the 3 character row for the stars that have less than 7 rows must not be considered
     */
    public function testSevenRowsCharacters()
    {
        $star = new Star();
        $star->setHeight(7);
        $this->assertEquals(["+"], $star->getRowCharacters(0));
        $this->assertEquals(["X"], $star->getRowCharacters(1));
        $this->assertEquals(["X", "X", "X", "X", "X"], $star->getRowCharacters(2));
        $this->assertEquals(["+", "X", "X", "X", "X", "X", "X", "X", "X", "X", "+"], $star->getRowCharacters(3));
        $this->assertEquals(["X", "X", "X", "X", "X"], $star->getRowCharacters(4));
        $this->assertEquals(["X"], $star->getRowCharacters(5));
        $this->assertEquals(["+"], $star->getRowCharacters(6));
    }

    /**
     * Test the characters for a star with height of the 11
     * The point is here, the 3 character row for the stars that have less than 7 rows must be considered
     * All the character style for more than 7 rows is the same as this one
     * So we test just on case more than 7 rows
     */
    public function testElevenRowsCharacters()
    {
        $star = new Star();
        $star->setHeight(11);
        $this->assertEquals(["+"], $star->getRowCharacters(0));
        $this->assertEquals(["X"], $star->getRowCharacters(1));
        $this->assertEquals(["X", "X", "X"], $star->getRowCharacters(2));
        $this->assertEquals(["X", "X", "X", "X", "X", "X", "X"], $star->getRowCharacters(3));
        $this->assertEquals(["X", "X", "X", "X", "X", "X", "X", "X", "X", "X", "X"], $star->getRowCharacters(4));
        $characters = ["+", "X", "X", "X", "X", "X", "X", "X", "X", "X", "X", "X", "X", "X", "X", "X", "+"];
        $this->assertEquals($characters, $star->getRowCharacters(5));
        $this->assertEquals(["X", "X", "X", "X", "X", "X", "X", "X", "X", "X", "X"], $star->getRowCharacters(6));
        $this->assertEquals(["X", "X", "X", "X", "X", "X", "X"], $star->getRowCharacters(7));
        $this->assertEquals(["X", "X", "X"], $star->getRowCharacters(8));
        $this->assertEquals(["X"], $star->getRowCharacters(9));
        $this->assertEquals(["+"], $star->getRowCharacters(10));
    }
}
