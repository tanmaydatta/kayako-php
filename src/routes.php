<?php
// Routes
use Kayako\Controllers\TwitterApiController;

$app->get('/tweet', function ($request, $response, $args) {

    $param = $request->getQueryParams();
    //pass parameter as count
    $controller = new TwitterApiController();

    $result = $controller->fetchTweet($param);
    return $response->withStatus(200)
        ->withHeader('Content-Type', 'application/json')
        ->write($result);
});

$app->get('/', function ($request, $response, $args) use ($app) {
	$view = new \Slim\Views\PhpRenderer('templates');
	return $view->render($response, '/index.html');
});


