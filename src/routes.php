<?php
// Routes
use Kayako\Controllers\TwitterApiController;

$app->get('/tweet', function ($request, $response, $args) {

    $param = $request->getQueryParams();
    //pass parameter as count
    $controller = new TwitterApiController();

    // echo $param['count'];
    $result = $controller->fetchTweet($param['count']);
    return $result;

});



