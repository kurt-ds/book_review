<?php

return [
    '/' => function() {
        require 'controllers/index.php';
    },
    '/test' => function() {
        echo "Test";
    },
    '/books' => function() {
        require 'controllers/books.php';
    },
    '/login' => function() {
        require 'controllers/login.php';
    },
    '/signup' => function() {
        require 'controllers/signup.php';
    },
];