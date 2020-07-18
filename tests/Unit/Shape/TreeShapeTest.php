<?php

namespace Unit\Shape;

use App\Library\Shapes\Tree;
use PHPUnit\Framework\TestCase;

/**
 * The unit test for the tree shape
 * Shapes are the holder of data. So we can test getting the data. The data that are inside a shape are:
 * 1- Height of shape
 * 2- Characters of rows
 * PHP version >= 7.0
 *
 * @category Tests
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 */
class TreeShapeTest extends TestCase
{

    /**
     * Test random height
     * Available heights for shapes are 5, 7, 11 and 15
     * If you not assign any height to shape, it will pick a random itself
     */
    public function testRandomHeight()
    {
        $star = new Tree();
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
        $tree = new Tree();
        $height = $tree->getHeight();
        $tree->setHeight(10);
        $this->assertEquals($height, $tree->getHeight());
    }

    /**
     * Test the correct height set
     * Available heights for shapes are 5, 7, 11 and 15
     * Setting the correct height to the shape, will change the height of the shape
     * So the height after setting correct height must be changed
     */
    public function testSetCorrectShapeHeight()
    {
        $tree = new Tree();
        $tree->setHeight(15);
        $this->assertEquals(15, $tree->getHeight());
    }

    /**
     * Test the characters for a tree with height of the 5
     */
    public function testFiveRowsCharacters()
    {
        $tree = new Tree();
        $tree->setHeight(5);
        $this->assertEquals(["+"], $tree->getRowCharacters(0));
        $this->assertEquals(["X"], $tree->getRowCharacters(1));
        $this->assertEquals(["X", "X", "X"], $tree->getRowCharacters(2));
        $this->assertEquals(["X", "X", "X", "X", "X"], $tree->getRowCharacters(3));
        $this->assertEquals(["X", "X", "X", "X", "X", "X", "X"], $tree->getRowCharacters(4));
    }

    /**
     * Test the characters for a tree with height of the 7
     */
    public function testSevenRowsCharacters()
    {
        $tree = new Tree();
        $tree->setHeight(7);
        $this->assertEquals(["+"], $tree->getRowCharacters(0));
        $this->assertEquals(["X"], $tree->getRowCharacters(1));
        $this->assertEquals(["X", "X", "X"], $tree->getRowCharacters(2));
        $this->assertEquals(["X", "X", "X", "X", "X"], $tree->getRowCharacters(3));
        $this->assertEquals(["X", "X", "X", "X", "X", "X", "X"], $tree->getRowCharacters(4));
        $this->assertEquals(["X", "X", "X", "X", "X", "X", "X", "X", "X"], $tree->getRowCharacters(5));
        $this->assertEquals(["X", "X", "X", "X", "X", "X", "X", "X", "X", "X", "X"], $tree->getRowCharacters(6));
    }

    /**
     * Test the characters for a tree with height of the 11
     * All the character style for the tree shape follows same structure
     * So we test up to eleven rows
     */
    public function testElevenRowsCharacters()
    {
        $tree = new Tree();
        $tree->setHeight(11);
        $this->assertEquals(["+"], $tree->getRowCharacters(0));
        $this->assertEquals(["X"], $tree->getRowCharacters(1));
        $this->assertEquals(["X", "X", "X"], $tree->getRowCharacters(2));
        $this->assertEquals(["X", "X", "X", "X", "X"], $tree->getRowCharacters(3));
        $this->assertEquals(["X", "X", "X", "X", "X", "X", "X"], $tree->getRowCharacters(4));
        $this->assertEquals(["X", "X", "X", "X", "X", "X", "X", "X", "X"], $tree->getRowCharacters(5));
        $this->assertEquals(["X", "X", "X", "X", "X", "X", "X", "X", "X", "X", "X"], $tree->getRowCharacters(6));
        $characters = ["X", "X", "X", "X", "X", "X", "X", "X", "X", "X", "X", "X", "X"];
        $this->assertEquals($characters, $tree->getRowCharacters(7));
        $characters = ["X", "X", "X", "X", "X", "X", "X", "X", "X", "X", "X", "X", "X", "X", "X"];
        $this->assertEquals($characters, $tree->getRowCharacters(8));
        $characters = ["X", "X", "X", "X", "X", "X", "X", "X", "X", "X", "X", "X", "X", "X", "X", "X", "X"];
        $this->assertEquals($characters, $tree->getRowCharacters(9));
        $characters = ["X", "X", "X", "X", "X", "X", "X", "X", "X", "X", "X", "X", "X", "X", "X", "X", "X", "X", "X"];
        $this->assertEquals($characters, $tree->getRowCharacters(10));
    }
}
