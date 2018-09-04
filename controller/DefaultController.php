<?php
namespace App\Controller;

use Fenxweb\Fenx\Controller;
use Fenxweb\Fenx\Templating\Engine;
use Fenxweb\Fenx\Annotation as Fenx;

class DefaultController extends Controller {

    /**
     * @Fenx\Inject(var="view",service="templating")
     */
    public function hello(Engine $view, $name) {
        return $view->render("hello.php",["name" => $name]);
    }

    /**
     * @Fenx\Inject(var="view",service="templating")
     */
    public function index(Engine $view) {
        return $view->render("index.php");
    }
}