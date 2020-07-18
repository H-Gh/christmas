<?php
/**
 * The entrance file of app
 *
 * @category App
 * @package  Fox
 */

use Fox\App\Application;

require "../vendor/autoload.php";

Application::get()->run();