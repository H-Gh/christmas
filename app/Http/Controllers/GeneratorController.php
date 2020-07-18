<?php

namespace App\Http\Controllers;

use App\Library\RowGenerator\AlignCenterRowGenerator;
use App\Library\RowsRenderers\HtmlRowsRenderer;
use App\Library\Shapes\ShapeFactory;
use Fox\Controller\Controller;
use Fox\Helpers\Request;
use Throwable;

/**
 * The Controller to handle posts actions
 * PHP version >= 7.0
 *
 * @category Controllers
 * @package  Paper
 * @author   Hamed Ghasempour <hamedghasempour@gmail.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     null
 */
class GeneratorController extends Controller
{
    /**
     * @return void
     */
    public function index()
    {
        $this->render("/christmas/index");
    }

    /**
     * @return void
     * @throws Throwable
     */
    public function show()
    {
        $shape = ShapeFactory::create(Request::get("type"));
        $shape->setHeight(Request::get("height"));
        $rowGenerator = new AlignCenterRowGenerator($shape);
        $rows = $rowGenerator->getRows();
        $shapeRenderer = new HtmlRowsRenderer();
        $this->render("/christmas/render", [
            "shape" => $shapeRenderer->render($rows)
        ]);
    }
}