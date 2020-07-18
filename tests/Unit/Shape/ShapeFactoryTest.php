<?php

namespace Unit\Shape;

use App\Exceptions\InvalidShapeException;
use App\Library\Shapes\ShapeFactory;
use App\Library\Shapes\Star;
use App\Library\Shapes\Tree;
use PHPUnit\Framework\TestCase;

/**
 * The unit test for the start shape
 * The factories are in charge of creating objects. So we can test creating objects.
 * PHP version >= 7.0
 *
 * @category Tests
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 */
class ShapeFactoryTest extends TestCase
{
    /**
     * @throws InvalidShapeException
     */
    public function testCreateStarShape()
    {
        $shape = ShapeFactory::create("star");
        $this->assertInstanceOf(Star::class, $shape);
    }

    /**
     * @throws InvalidShapeException
     */
    public function testCreateTreeShape()
    {
        $shape = ShapeFactory::create("tree");
        $this->assertInstanceOf(Tree::class, $shape);
    }

    /**
     * @throws InvalidShapeException
     */
    public function testWrongShapeName()
    {
        $this->expectException(InvalidShapeException::class);
        ShapeFactory::create("test");
    }
}
