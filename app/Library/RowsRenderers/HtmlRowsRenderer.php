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
class HtmlRowsRenderer implements RowsRendererInterface
{
    /**
     * Render a shape into output
     *
     * @param CollectionInterface $rows The rows collection to render
     *
     * @return string
     */
    public function render(CollectionInterface $rows): string
    {
        $outputString = "";
        foreach ($rows as $characters) {
            $outputString .= "<div style='font-family: Courier, \"Courier New\", \"Lucida Console\", Monaco,serif;'>";
            foreach ($characters as $character) {
                $outputString .= $this->convertToHtml($character);
            }
            $outputString .= "</div>";
        }
        return $outputString;
    }

    /**
     * Convert character to html
     *
     * @param string $character The character
     *
     * @return string
     */
    private function convertToHtml(string $character)
    {
        return preg_replace("/\s/", "&nbsp;", $character);
    }
}
