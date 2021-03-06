<?php

// Get container
$container = $app->getContainer();

//Eloquent setup
//set illuminate capsule
$capsule = new Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();
// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

$container['db'] = function ($container) use ($capsule) {
    return $capsule;
};
//END eloquent setup

//Register Twig View helper
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__ . '/../templates', [
        'cache' => false/**'path/to/cache'**/,
        'debug' => true,
    ]);

    // Instantiate and add Slim specific extension
    $view->addExtension(new \Slim\Views\TwigExtension(
        $container->router,
        $container->request->getUri()
    ));
    //enable dump
    $view->addExtension(new Twig_Extension_Debug());

    return $view;
};

$container['HomeController'] = function ($container) {
    return new App\Controllers\HomeController($container);
};
