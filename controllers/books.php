<?php

require_once "./model/books_model.php";

$heading = "All Books";
$result = getAllBooks($pdo);

require 'views/books.view.php';