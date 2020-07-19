<?php

namespace App\Library\Facades;

use App\Library\RowsGenerator\RowsGenerator;
use App\Library\RowsRenderers\RowsRendererInterface;
use App\Library\Shapes\Shape;

/**
 * The facade for the shape
 * PHP version >= 7.0
 *
 * @category Facades
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 */
class RowRendererFacade
{
    /**
     * The rows generator
     *
     * @var RowsGenerator
     */
    private $rowsGenerator;

    /**
     * The rows renderer
     *
     * @var RowsRendererInterface
     */
    private $rowsRenderer;

    /**
     * Shape constructor.
     *
     * @param RowsGenerator         $rowsGenerator The rows generator
     * @param RowsRendererInterface $rowsRenderer  The rows renderer
     */
    public function __construct(RowsGenerator $rowsGenerator, RowsRendererInterface $rowsRenderer)
    {
        $this->rowsGenerator = $rowsGenerator;
        $this->rowsRenderer = $rowsRenderer;
    }

    /**
     * Render a shape as HTML
     *
     * @return string
     */
    public function render()
    {
        $rows = $this->rowsGenerator->getRows();
        return $this->rowsRenderer->render($rows);
    }
}
