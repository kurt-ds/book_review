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

    $regex_bookID_reviewID = "/\/books\/\d+\/reviews\/\d+/";
    $regex_bookID_review = "/\/books\/\d+\/reviews/";
    $regex_bookID_edit = "/\/books\/\d+\/edit/";
    $regex_bookID = "/\/books\/\d+/";
    $bookID = 0;
    $reviewID = 0;
    $path2 = '';

    if (preg_match($regex_bookID_reviewID, $path, $matches) && count($path_array) === 5) {
        $path = '/' . $path_array[1];
        $bookID = $path_array[2];
        $reviewID = $path_array[4];
        print_r($matches);
        echo "<br>";
        echo("SHOWING /books/:id/reviews/:id URL");
        echo "<br>";
        echo "BOOK ID:" . $bookID;
        echo "<br>";
        echo "REVIEW ID: " . $reviewID;
        die();
    } else if ((preg_match($regex_bookID_review, $path, $matches) && count($path_array) === 4)) {
        $path = '/' . $path_array[1];
        $bookID = $path_array[2];
        $path2 = 'reviews';
    } else if ((preg_match($regex_bookID_edit, $path, $matches) && count($path_array) === 4)) {
        $path = '/' . $path_array[1];
        $bookID = $path_array[2];
        $path2 = 'edit';
    } else if ((preg_match($regex_bookID, $path, $matches) && count($path_array) === 3)) {
        $path = '/' . $path_array[1];
        $bookID = $path_array[2];
    }

    
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
    $params['book_id'] = $bookID;
    $params['path2'] = $path2;
    $callback($params);
}