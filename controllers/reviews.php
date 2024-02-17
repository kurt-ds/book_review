<?php

$book_id = $params['book_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userID = $_POST['user_id'];
    $rating = $_POST['rating'];
    $review_text = $_POST['review_text'];

    echo "USER ID: " . $userID;
    echo "BOOK ID: " . $book_id;
    echo "Rating: " . $rating;
    echo "Review Text" . $review_text;

    
} else {
    echo "HTTP REQUEST METHOD NOT FOUND!";
}