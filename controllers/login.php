<?php


$heading = "Login";

function is_input_empty($username, $pwd) {
    if (empty($username) ||  empty($pwd)) {
        return true;
    } else {
        return false;
    }
}
function is_username_wrong(bool|array $result) {
    if (!$result){
        return true;
    } else {
        return false;
    }
}
function is_password_wrong(string $pwd, string $hashedPwd) {
    if (!password_verify($pwd, $hashedPwd)){
        return true;
    } else {
        return false;
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    require 'views/login.view.php';
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
    try {
        require_once './model/users_model.php';
        //Error handlers
        $errors = [];
        if (is_input_empty($username, $pwd)) {
            $errors['empty_input'] = "Please fill in all fields!";
        }
        //Getting result
        $result = get_user($pdo, $username);
        if (is_username_wrong($result)) {
            $errors['login_incorrect'] = "Incorrect login info!";
        }
        if (!is_username_wrong($result) && is_password_wrong($pwd, $result['pwd'])) {
            $errors['login_incorrect'] = "Incorrect login info!";
        }

        foreach ($errors as $error) {
            echo $error;
            echo '<br>';
        }

        if ($errors) {
            $_SESSION['errors_login'] = $errors;
            header('Location: /login?login=failed');
            die();
        }

        $newSessionID = session_create_id();
        $sessionID = $newSessionID . "_" . $result['user_id'];
        session_id($sessionID);

        $_SESSION['user_id'] = $result['user_id'];
        $_SESSION['user_username'] = htmlspecialchars($result['username']);
        $_SESSION['last_regeneration'] = time();

        header('Location: /books?login=success');
        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    echo "ERROR 405: REQUEST METHOD DOESNT EXIST!";
}