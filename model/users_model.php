<?php

declare(strict_types=1);

require_once './includes/dbh.inc.php';

function create_user(object $pdo, array $data) {
    $query = "INSERT INTO users (username, firstname, lastname, pwd, email) VALUES (:username, :firstname, :lastname, :pwd, :email);";
    $stmt = $pdo->prepare($query);

    $options = [
        'cost'=> 12
    ];

    $hashedPwd = password_hash($data['pwd'], PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":username", $data['username']);
    $stmt->bindParam(":firstname", $data['firstname']);
    $stmt->bindParam(":lastname", $data['lastname']);
    $stmt->bindParam(":pwd", $hashedPwd);
    $stmt->bindParam(":email", $data['email']);

    $stmt->execute();
}

function get_username(object $pdo, string $username) {
    $query = "SELECT username FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":username", $username);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email(object $pdo, string $email) {
    $query = "SELECT email FROM users WHERE email = :email;";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":email", $email);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_user(object $pdo, string $username) {
    $query = "SELECT * FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":username", $username);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}