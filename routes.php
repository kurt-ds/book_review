<?php

return [
  '/' => function() {
      require 'controllers/index.php';
  },
  '/books' => function(array $params = []) {
      require 'controllers/books.php';
  },
  '/login' => function() {
      require 'controllers/login.php';
  },
  '/signup' => function() {
      require 'controllers/signup.php';
  },
  '/seed' => function() { 
    //THIS ROUTE WILL ADD 10 RANDOMLY GENERATED BOOKS TO THE DATABASE
    require 'seeds/seedsHelper.php';
},
];