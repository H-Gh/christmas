<?php

namespace Unit\RowsRenderer;

use App\Library\RowGenerator\AlignCenterRowGenerator;
use App\Library\RowsRenderers\HtmlRowsRenderer;
use App\Library\Shapes\Star;
use PHPUnit\Framework\TestCase;

/**
 * The test for the html row renderer
 * Rows renderers are responsible to converting the rows in printable stuffs. So we can test the output of them.
 * PHP version >= 7.0
 *
 * @category
 * @author Hamed Ghasempour <hamedghasempour@gmail.com>
 */
class HtmlRowsRendererTest extends TestCase
{
    /**
     * The the output of a five row star
     */
    public function testFiveRowStar()
    {
        $star = new Star();
        $star->setHeight(5);
        $rowsGenerator = new AlignCenterRowGenerator($star);
        $rows = $rowsGenerator->getRows();
        $htmlRowsRenderer = new HtmlRowsRenderer();
        $html = "<div style='font-family: Courier, \"Courier New\", \"Lucida Console\", Monaco,serif;'>&nbsp;&nbsp;&nbsp;+&nbsp;&nbsp;&nbsp;</div><div style='font-family: Courier, \"Courier New\", \"Lucida Console\", Monaco,serif;'>&nbsp;&nbsp;&nbsp;X&nbsp;&nbsp;&nbsp;</div><div style='font-family: Courier, \"Courier New\", \"Lucida Console\", Monaco,serif;'>+XXXXX+</div><div style='font-family: Courier, \"Courier New\", \"Lucida Console\", Monaco,serif;'>&nbsp;&nbsp;&nbsp;X&nbsp;&nbsp;&nbsp;</div><div style='font-family: Courier, \"Courier New\", \"Lucida Console\", Monaco,serif;'>&nbsp;&nbsp;&nbsp;+&nbsp;&nbsp;&nbsp;</div>";
        $this->assertEquals($html, $htmlRowsRenderer->render($rows));
    }
}
