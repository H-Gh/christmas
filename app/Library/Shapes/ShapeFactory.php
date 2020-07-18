<?php

namespace App\Library\Shapes;

use App\Exceptions\InvalidShapeException;

/**
 * The class to generate the shape
 * PHP version >= 7.0
 *
 * @category Shapes
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 */
class ShapeFactory
{
    /**
     * Create an instance of a shape
     *
     * @param string $shapeName The shape name
     *
     * @return Shape
     * @throws InvalidShapeException
     */
    public static function create(string $shapeName)
    {
        $namespace = "App\Library\Shapes\\" . ucfirst($shapeName);
        if (class_exists($namespace)) {
            return new $namespace();
        }
        throw new InvalidShapeException();
    }
}
