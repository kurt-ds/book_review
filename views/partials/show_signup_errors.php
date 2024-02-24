<?php

function check_signup_errors() {
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p>'. $error .  '</p>';
            echo "<br>";
        }

        unset($_SESSION['errors_signup']);
    }
}

function check_login_errors() {
    if (isset($_SESSION['errors_login'])) {
        $errors = $_SESSION['errors_login'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p>'. $error .  '</p>';
            echo "<br>";
        }

        unset($_SESSION['errors_login']);
    }
}


function check_book_errors() {
    if (isset($_SESSION['errors'])) {
        $errors = $_SESSION['errors'];

        echo "<br>";

        foreach ($errors as $error) {
            echo '<p>'. $error .  '</p>';
            echo "<br>";
        }

        unset($_SESSION['errors']);
    }
}