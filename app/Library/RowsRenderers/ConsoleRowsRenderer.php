<?php

namespace App\Library\RowsRenderers;

use Fox\Collection\CollectionInterface;

/**
 * The class to generate the shape
 * PHP version >= 7.0
 *
 * @category Shapes
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 */
class ConsoleRowsRenderer implements RowsRendererInterface
{
    /**
     * Render a shape into output
     *
     * @param CollectionInterface $rows The rows collection
     *
     * @return string
     */
    public function render(CollectionInterface $rows): string
    {
        $outputString = "";
        foreach ($rows as $characters) {
            foreach ($characters as $character) {
                $outputString .= $character;
            }
            $outputString .= PHP_EOL;
        }
        return $outputString;
    }
}
