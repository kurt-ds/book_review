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
    if (false === array_key_exists($path, $routes)) {
        http_response_code(404);
        echo "404-NOT FOUND";
        return;
    }

    $callback = $routes[$path];
    $params = [];
    if (!empty($uri['query'])){
        parse_str($uri['query'], $params);
    }

    $callback($params);
}