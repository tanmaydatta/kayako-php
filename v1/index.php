<?php
// use \Psr\Http\Message\ServerRequestInterface as Request;
// use \Psr\Http\Message\ResponseInterface as Response;

// require '../vendor/autoload.php';

// $app = new \Slim\App;
// $app->get('/hello', function (Request $request, Response $response) {
//     // $name = $request->getAttribute('name');
//     $response->getBody()->write("Hello");

//     return $response;
// });
// $app->run();
// echo "hello";
// <!-- $app = new \Slim\Slim(); -->



    require 'Slim/Slim.php';

    $app = new \Slim\Slim();

    //GET route
    $app->get('/hello/:name', function ($name)     {
		echo "Hello, $name";
    });

    //POST route
    $app->post('/person', function () {
        //Create new Person
    });

    //PUT route
    $app->put('/person/:id', function ($id) {
        //Update Person identified by $id
    });

    //DELETE route
    $app->delete('/person/:id', function ($id) {
        //Delete Person identified by $id
    });     


    $app->run();
?>
