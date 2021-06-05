<?php

require __DIR__ . '/vendor/autoload.php';
require 'bootstrap.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;

$request = Request::createFromGlobals();

// Simple routing
$routes = new RouteCollection();
$routes->add('index', new Route('/', ['name' => 'index']));
$routes->add('add', new Route('/add', ['name' => 'add']));

$context = new RequestContext();
$context->fromRequest($request);
$matcher = new UrlMatcher($routes, $context);

try {
    $attributes = $matcher->match($request->getPathInfo());
} catch (ResourceNotFoundException $ex) {
    dd($ex->getMessage());
}

switch($attributes['name']) {
    case 'index': echo 'index';break;
    case 'add': echo 'add';break;
}