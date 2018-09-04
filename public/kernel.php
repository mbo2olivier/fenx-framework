<?php

require_once __DIR__."/../vendor/autoload.php";

use Fenxweb\Fenx\Application;
use Fenxweb\Fenx\Router\Router;
use Fenxweb\Fenx\Templating\Templating;
use Fenxweb\Fenx\Database\Database;
use Fenxweb\Fenx\Mailer\Mailer;
use Fenxweb\Fenx\PDF\PDF;
use Fenxweb\Fenx\Form\Formidable;


function getKernel() {
    $app = new Application(__DIR__."/../",true);
    # chargement des modules
    $app
        ->mount(Database::class)
        ->mount(Templating::class)
        ->mount(Mailer::class)
        ->mount(PDF::class)
        ->mount(Formidable::class)
    ;
    # mise en place des middleware
    $app
        ->before(Router::class)
    ;

    # renvoyer l'application
    return $app;
}