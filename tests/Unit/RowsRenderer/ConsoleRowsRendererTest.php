<?php

namespace Unit\RowsRenderer;

use App\Library\RowGenerator\AlignCenterRowGenerator;
use App\Library\RowsRenderers\ConsoleRowsRenderer;
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
class ConsoleRowsRendererTest extends TestCase
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
        $consoleRowsRenderer = new ConsoleRowsRenderer();
        $html = "   +   
   X   
+XXXXX+
   X   
   +   
";
        $this->assertEquals($html, $consoleRowsRenderer->render($rows));
    }
}
