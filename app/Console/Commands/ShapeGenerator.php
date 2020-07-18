<?php

namespace App\Console\Commands;

use App\Library\RowGenerator\AlignCenterRowGenerator;
use App\Library\RowsRenderers\ConsoleRowsRenderer;
use App\Library\Shapes\ShapeFactory;
use Fox\Console\Console;
use Throwable;

/**
 * The command to generate the shape
 * PHP version >= 7.0
 *
 * @category Commands
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 */
class ShapeGenerator extends Console
{
    public const SIGNATURE = "shape:generate {shapeName} {?height}";

    private $availableHeights = [5, 7, 11, 15];

    /**
     * Render the shape
     *
     * @return void
     */
    public function run()
    {
        try {
            $shape = ShapeFactory::create($this->argument("shapeName"));
            $height = $this->getHeight();
            $shape->setHeight($height);
            $shapeGenerator = new AlignCenterRowGenerator($shape);
            $generatedShape = $shapeGenerator->getRows();
            $renderer = new ConsoleRowsRenderer();
            echo $renderer->render($generatedShape);
        } catch (Throwable $throwable) {
            echo $throwable->getMessage();
        }
    }

    /**
     * Get the height of the shape
     * In null case, the generator select a random height
     *
     * @return int
     */
    private function getHeight(): ?int
    {
        $height = (int)$this->argument("height");
        if (!empty($height) && !in_array((int)$height, $this->availableHeights)) {
            echo "The height must be in " . implode(",", $this->availableHeights) . PHP_EOL;
            echo "The generator select a random height" . PHP_EOL;
            return null;
        } else {
            return $height;
        }
    }
}
