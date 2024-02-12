<?php

declare(strict_types=1);

require_once "./model/books_model.php";


$heading = "Single Books";
$book_id = $params['book_id'];

$book = get_book_by_id($pdo, $book_id);

if (!$book) {
    http_response_code(404);
    echo "Something went wrong! <br>";
    echo "Book ID is not found!";
} else {
    require 'views/book.view.php';
}

