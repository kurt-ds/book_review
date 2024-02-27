<?php

declare(strict_types=1);

require_once "./model/reviews_model.php";
require_once "./model/books_model.php";


$bookID = $params['book_id'];
$reviewID = $params['review_id'];

function is_input_empty(array $data): bool {
    forEach ($data as $key => $value) {
        if (!isset($data[$key]) || strlen($data[$key]) === 0) {
            return true;
        }
    }
    return false;
}

function is_bookID_number(array $data):bool {
    if (ctype_digit($data['bookID'])) {
        return true;
    } else {
        return false;
    }
}

function is_userID_number(array $data):bool {
    if (ctype_digit($data['userID'])) {
        return true;
    } else {
        return false;
    }
}

function is_rating_number(array $data): bool {
    if (ctype_digit($data['rating'])) {
        return true;
    } else {
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        require_once "./model/reviews_model.php";
        require_once "./model/books_model.php";
        $book = get_book_by_id($pdo, $bookID);
        $review = get_review_by_id($pdo, $reviewID);

        if (!$book || !$review) {
            http_response_code(404);
            echo "Something went wrong! <br>";
            echo "Book ID or REVIEW ID is not found!";
        } else {
            $heading = "EDITING REVIEW TO";
            require 'views/review_edit.php';
        }
        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die("Query failed:" . $e->getMessage());
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['_method'] === 'delete') {
    try {
        require_once "./model/reviews_model.php";
        require_once "./model/books_model.php";
        $review = get_review_by_id($pdo, $reviewID);
        delete_review_by_id($pdo, $review);
        header("Location: /books/" . $bookID);
        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }    
} else if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['_method'] === 'put') {
    try {
        require_once "./model/reviews_model.php";
        require_once "./model/books_model.php";
        $book = get_book_by_id($pdo, $bookID);
        $review = get_review_by_id($pdo, $reviewID);
        if (!$book || !$review) {
            http_response_code(404);
            echo "Something went wrong! <br>";
            echo "Book ID or REVIEW ID is not found!";
            die();
        }

        $userID = $_POST['user_id'];
        $rating = $_POST['rating'];
        $review_text = $_POST['review_text'];

        $data = [
            'reviewID' => "" . $review['review_id'],
            'bookID' => $bookID,
            'userID' => $userID,
            'rating' => $rating,
            'review_text' => $review_text,
        ];



        //ERROR HANDLERS
        $errors = [];

        if(is_input_empty($data)) {
            $errors["empty_input"] = "Fill in all fields!";
        }
        $data['reviewID'] = intval($data['reviewID']);
        if(!is_bookID_number($data)) {
            $errors['invalid_bookID'] = "bookID should be a number!";
        }
        $data['bookID'] = intval($bookID);
        if(!is_userID_number($data)) {
            $errors['invalid_userID'] = "userID should be a number!";
        }
        $data['userID'] = intval($userID);
        if(!is_rating_number($data)) {
            $errors['invalid_rating'] = "rating should be a number!";
        }
        $data['rating'] = intval($rating);
        if($rating > 5 || $rating < 1) {
            $errors['invalid_rating'] = "rating should be between 1 and 5 only!";
        }



        if ($errors) {
            $_SESSION["errors_signup"] = $errors;

            $_SESSION["signup_data"] = $data;

            header("Location: /books/{$data['bookID']}");
            die();
        }
        //Uploading Review
        update_review($pdo, $data);

        
        header("Location: /books/{$data['bookID']}");
        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
