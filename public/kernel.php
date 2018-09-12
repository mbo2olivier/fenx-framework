<?php

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../config/parameters.php";

use Fenxweb\Fenx\Application;
use Fenxweb\Fenx\Router\Router;
use Fenxweb\Fenx\Templating\Templating;
use Fenxweb\Fenx\Database\Database;
use Fenxweb\Fenx\Mailer\Mailer;
use Fenxweb\Fenx\PDF\PDF;
use Fenxweb\Fenx\Form\Formidable;
use Fenxweb\Fenx\Security\Security;
use Fenxweb\Fenx\Security\Firewall;

function getKernel() {
    $app = new Application(__DIR__."/../",true);
    # chargement des modules
    $app
        ->mount(Database::class)
        ->mount(Templating::class)
        ->mount(Mailer::class)
        ->mount(PDF::class)
        ->mount(Formidable::class)
        ->mount(Security::class)
    ;
    # mise en place des middlewares
    $app
        ->before(Router::class)
        ->before(Firewall::class)
    ;

    # renvoyer l'application
    return $app;
}