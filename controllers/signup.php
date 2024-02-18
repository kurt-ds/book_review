<?php

require_once './model/users_model.php';

$heading = "Signup";

function is_input_empty(array $data) {
    forEach ($data as $key => $value) {
        if (empty($value)) {
            return true;
        }
    }
    return false;
}

function is_email_invalid(string $email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function is_email_registered(object $pdo, string $email) {
    if (get_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}

function is_username_taken(object $pdo, string $username) {
    if (get_username($pdo, $username)) {
        return true;
    } else {
        return false;
    }
}



if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    require 'views/signup.view.php';
    die();
} else if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $pwd = $_POST['pwd'];
    $email = $_POST['email'];

    $data = [
        'username' => $username,
        'firstname' => $firstname,
        'lastname' => $lastname,
        'pwd'=> $pwd,
        'email' => $email
    ];

    //ERROR HANDLERS
    $errors = [];

    if (is_input_empty($data)) {
        $errors['empty_input'] = "Fill in all fields!";
    }
    if (is_email_invalid($email)) {
        $errors['invalid_email'] = 'Invalid email input!';
    }
    if (is_username_taken($pdo, $username)) {
        $errors['username_taken'] = "Username already taken!";
    }
    if (is_email_registered($pdo, $email)) {
        $errors['email_registered'] = "Email already exist!";
    }
    if (strlen($pwd) < 8 || strlen($pwd) > 20) {
        $errors['invalid_password'] = "Password length is invalid!";
    }

    echo "Username: " . $username;
    echo '<br>';
    echo "First name: " . $firstname;
    echo '<br>';
    echo "Last name: " . $lastname;
    echo '<br>';
    echo "Password: " . $pwd;
    echo '<br>';
    echo "Email: " . $email;
    echo "<br>";

    if ($errors) {
        $_SESSION['errors_signup'] = $errors;
        header('Location: /signup?signup=failed');
        die();
    }

    //POSTING
    create_user($pdo, $data);

    header('Location: /books?signup=success');

    $pdo = null;
    $stmt = null;
    die();
}