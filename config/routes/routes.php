<?php
use App\Controller\DefaultController;

$routes
    ->route("/hello/:name/",[DefaultController::class,"hello"])
    ->params([
        "name" => "[a-zA-Z]+"
    ])
    ->name('hello')
;

$routes
    ->route("/",[DefaultController::class,"index"])
    ->name('home')
;