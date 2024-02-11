<?php

require_once './includes/dbh.inc.php';

function getAllBooks(object $pdo) {
    $query = "SELECT title, author, isbn FROM books";
    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}