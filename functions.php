<?php

declare(strict_types=1);

function dd($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function urlLs($value) {
    return $_SERVER["REQUEST_URI"] === $value;
}

function run(string $url, array $routes): void
{
    $uri = parse_url("$url");
    $path = $uri['path'];

    $path_array = explode('/', $path);
    $path = '/' . $path_array[1];
    $id = 0;
    $path2 = '';
    if (count($path_array) === 3) {
        if ($path_array[2] === 'new') {
            $path .= '/new';
        } else {
            $id = $path_array[2];
        }
    } else if (count($path_array) === 4) {
        $id = $path_array[2];
        if ($path_array[3] === 'edit') {
            $path2 = 'edit';
        }
    }
    
    if (false === array_key_exists($path, $routes) || (count($path_array) > 3 && $path2 !== 'edit') ) {
        http_response_code(404);
        echo "404-NOT FOUND";
        return;
    }

    $callback = $routes[$path];
    $params = [];
    if (!empty($uri['query'])){
        parse_str($uri['query'], $params);
    }
    $params['book_id'] = $id;
    $params['path2'] = $path2;
    $callback($params);
}