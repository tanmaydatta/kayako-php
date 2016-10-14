<?php
// Routes
use Kayako\Controllers\TwitterApiController;

$app->get('/tweet', function ($request, $response, $args) {

    $param = $request->getQueryParams();
    //pass parameter as count
    $controller = new TwitterApiController();

    $result = $controller->fetchTweet($param);
    return $result;

});



