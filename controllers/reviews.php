<?php

declare(strict_types=1);

require_once "./model/reviews_model.php";
$book_id = $params['book_id'];

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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userID = $_POST['user_id'];
    $rating = $_POST['rating'];
    $review_text = $_POST['review_text'];

    $data = [
        'bookID' => $book_id,
        'userID' => $userID,
        'rating' => $rating,
        'review_text' => $review_text
    ];


    //ERROR HANDLERS
    $errors = [];

    if(is_input_empty($data)) {
        $errors["empty_input"] = "Fill in all fields!";
    }
    if(!is_bookID_number($data)) {
        $errors['invalid_bookID'] = "bookID should be a number!";
    }
    $data['bookID'] = intval($book_id);
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
    set_review($pdo, $data);

    
    header("Location: /books/{$data['bookID']}");
    die();

} else {
    echo "HTTP REQUEST METHOD NOT FOUND!";
}