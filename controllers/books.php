<?php

declare(strict_types=1);

require_once "./model/books_model.php";

function is_input_empty($data): bool {
    forEach ($data as $key => $value) {
        if (!isset($data[$key]) || strlen($data[$key]) === 0) {
            return true;
        }
    }
    return false;
}

function is_isbn_taken(object $pdo, int $isbn) {
    if (get_book_by_id($pdo, $isbn)) {
        return true;
    } else {
        return false;
    }
}
function is_isbn_number($data) {
    if (ctype_digit($data['isbn'])) {
        return true;
    } else {
        return false;
    }
}
function is_user_id_number($data) {
    if (ctype_digit($data['user_id'])) {
        return true;
    } else {
        return false;
    }
}
function is_publish_year_number($data) {
    if (ctype_digit($data['publish_year'])) {
        return true;
    } else {
        return false;
    }
}
function is_userid_available($pdo, $data) {
    if (get_user_by_id($pdo, $data)) {
        return true;
    } else {
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $heading = "All Books";
    $result = getAllBooks($pdo);
    require 'views/books.view.php';
}
else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Collection of Data
    $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $publish_year = $_POST['publish_year'];
    $synopsis = $_POST['synopsis'];
    $user_id = $_POST['user_id'];

    //Compiling Data into single array
    $data = [
        'isbn' => $isbn,
        'title' => $title,
        'author' => $author,
        'publisher' => $publisher,
        'publish_year' => $publish_year,
        'synopsis' => $synopsis,
        'user_id' => $user_id
    ];

    //Error Handlers
    $errors = [];

    if (is_input_empty($data)) {
        $errors["empty_input"] = "Fill in all fields!";
    }
    if (!is_isbn_number($data)) {
        $errors['invalid_isbn'] = 'ISBN should be a number';
    }
    $data['isbn'] = intval($isbn);
    if (!is_user_id_number($data)) {
        $errors['invalid_userID'] = 'User ID should be a number';
    }
    $data['user_id'] = intval($user_id);
    if (!is_publish_year_number($data)) {
        $errors['invalid_publishYear'] = 'Publish Year should be a number';
    }
    $data['publish_year'] = intval($publish_year);

    if(!($data['publish_year'] > 1000 && $data['publish_year'] < 2025)) {
        $errors['invalid_publish_year'] = "Invalid publish year!";
    }
    if (!is_userid_available($pdo, $data)) {
        $errors['userid_unavailable'] = 'USER_ID does not exist!';
    }

    if (is_isbn_taken($pdo, $data['isbn'])) {
        $errors['isbn_taken'] = "ISBN is already taken!";
    }


    if ($errors) {
        $_SESSION["errors_signup"] = $errors;

        $_SESSION["signup_data"] = $data;

        header("Location: /books/new");
        die();
    }

    //Inserting data into the database
    set_book($pdo, $data);


    echo "Data has been submitted!";
} 