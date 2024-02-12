<?php

declare(strict_types=1);

require_once './includes/dbh.inc.php';

function getAllBooks(object $pdo) {
    $query = "SELECT title, author, isbn FROM books";
    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function get_user_by_id(object $pdo, array $data) {
    $query = "SELECT * FROM users WHERE user_id = :user_id;";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":user_id", $data['user_id']);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_book_by_id($pdo, $isbn) {
    $query = "SELECT * FROM books WHERE isbn = :isbn;";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":isbn", $isbn);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_book(object $pdo, array $data) {
    $query = "INSERT INTO books (isbn, author, title, publisher, publish_year, synopsis, user_id) VALUES (:isbn, :author, :title, :publisher, :publish_year, :synopsis, :user_id);";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":isbn", $data['isbn']);
    $stmt->bindParam(":author", $data['author']);
    $stmt->bindParam(":title", $data['title']);
    $stmt->bindParam(":publisher", $data['publisher']);
    $stmt->bindParam(":publish_year", $data['publish_year']);
    $stmt->bindParam(":synopsis", $data['synopsis']);
    $stmt->bindParam(":user_id", $data['user_id']);

    $stmt->execute();
}