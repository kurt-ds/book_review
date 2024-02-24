<?php


return [
  '/' => function (array $params = []) {
    require 'controllers/index.php';
  },
  '/books' => function(array $params = []) {
      if ($params['book_id'] === 0) {
        require 'controllers/books.php';
      } else {
        if ($params['path2'] === 'edit') {
          require 'controllers/book_edit.php';
        } else if ($params['path2'] === 'reviews') {
          if ($params['review_id'] === 0) {
            require 'controllers/reviews.php';
          } else {
            require 'controllers/review.php';
          }
        } else if ($params['path2'] === 'reviews_edit') {
           require 'controllers/review.php';
        }else {
          require 'controllers/book.php';
        }
      }
  },
  '/books/new' => function(array $params = []) {
    require 'controllers/book_form.php';
  },
  '/login' => function(array $params = []) {
      require 'controllers/login.php';
  },
  '/signup' => function(array $params = []) {
      require 'controllers/signup.php';
  },
  '/logout' => function(array $params = []) {
    require 'controllers/logout.php';
  },
  '/seed' => function(array $params = []) { 
    //THIS ROUTE WILL ADD 10 RANDOMLY GENERATED BOOKS TO THE DATABASE
    require 'seeds/seedsHelper.php';
},
];