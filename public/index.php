<?php
namespace App;

require '/home/nlv/PhpstormProjects/hexlet-slim-example/vendor/autoload.php';

//$companies = Generator::generate(100);
$users = Generator::generate(100);
//var_dump($users);

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

$app = new \Slim\App($configuration);

$container = $app->getContainer();
$container['renderer'] = new \Slim\Views\PhpRenderer(__DIR__ . '/../templates');

// BEGIN (write your solution here)
// $app->get('/companies', function ($request, $response) use ($companies) {
//     $per = $request->getQueryParam('per', $per = 5);
//     $page = $request->getQueryParam('page', $page = 1);
//     var_dump($companies);
//     $result = array_slice($companies, ($page - 1) * $per, $per);
//     $response->write(json_encode($result));
//     return $response;
// });

// $app->get('/companies/{id}', function ($request, $response, array $args) use ($companies) {
//     $result = $companies[$args['id']-1];
//     $response->write(json_encode($result));
//     return $response;
// });

$app->get('/users', function ($request, $response) use ($users) {
    $per = $request->getQueryParam('per', 5);
    $page = $request->getQueryParam('page', 1);
    $term = $request->getQueryParam('term', '');
    $filtered_users = array_filter ($users, function ($user) use ($term) {
    	return \Stringy\create($user['firstName'])->startsWith($term, false);
    });
    //var_dump($filtered_users);
    $result = (array_slice($filtered_users, ($page - 1) * $per, $per));
    $params = ['users' => $result, 'per' => $per, 'page' => $page];
    //$response->write(json_encode($result));
    return $this->renderer->render($response, 'users/index.phtml', $params);
});

$app->get('/users/{id}', function ($request, $response, $args) use ($users) {
    $params = ['user' => $users[$args['id']-1]];
    return $this->renderer->render($response, 'users/show.phtml', $params);
});

$app->run();