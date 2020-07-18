<?php

namespace App\Library\RowsRenderers;

use Fox\Collection\CollectionInterface;

/**
 * The interface for the shape renderers
 * PHP version >= 7.0
 *
 * @category Shapes
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 */
interface RowsRendererInterface
{
    /**
     * Render a shape into output
     *
     * @param CollectionInterface $rows The rows collection to render
     *
     * @return string
     */
    public function render(CollectionInterface $rows): string;
}
