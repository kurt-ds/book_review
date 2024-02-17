<?php

declare(strict_types=1);

require_once './includes/dbh.inc.php';


function set_review(object $pdo, array $data) {
    $query = "INSERT INTO reviews (book_id, user_id, rating, review_text) VALUES (:bookID, :userID, :rating, :review_text);";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":bookID", $data['bookID']);
    $stmt->bindParam(":userID", $data['userID']);
    $stmt->bindParam(":rating", $data['rating']);
    $stmt->bindParam(":review_text", $data['review_text']);

    $stmt->execute();
}

function get_review_by_id(object $pdo, $reviewID) {
    $query = "SELECT * FROM reviews WHERE review_id  = :review_id";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":review_id", $reviewID);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function delete_review_by_id(object $pdo, array $data) {
    $query = "DELETE FROM reviews WHERE review_id = :review_id";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":review_id", $data['review_id']);

    $stmt->execute();
}

function update_review(object $pdo, array $data) {
    $query = "UPDATE reviews SET rating = :rating, review_text = :review_text WHERE review_id = :review_id;";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":rating", $data['rating']);
    $stmt->bindParam(":review_text", $data['review_text']);
    $stmt->bindParam(":review_id", $data['reviewID']);


    $stmt->execute();
}