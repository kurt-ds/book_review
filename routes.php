<?php

// Function to match routes and call corresponding functions
function route($uri, $callback) {
  $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

  if ($requestUri === $uri) {
    $callback();
  }
}

$isFound = false;

// Define routes
route('/books', function() {
  // Show all books
  global $isFound;
  $isFound = true;
  echo 'List of all books';
});

route('/books/create', function() {
  // Show form to create a new book
  global $isFound;
  $isFound = true;
  echo 'Form to create a book';
});

route('/books/:id', function() {
  // Get book ID from the URL
  global $isFound;
  $isFound = true;
  $id = $_GET['id'];

  // Show specific book details
  echo "Book details for ID: $id";
});

route('/books/:id/reviews/:reviewId', function() {
  // Get book ID and review ID from the URL
  global $isFound;
  $isFound = true;
  $bookId = $_GET['id'];
  $reviewId = $_GET['reviewId'];

  // Show specific review for the book
  echo "Review ID: $reviewId for book ID: $bookId";
});

route('/login', function() {
  // Show login form
  global $isFound;
  $isFound = true;
  echo 'Login form';
});

route('/signup', function() {
  // Show signup form
  global $isFound;
  $isFound = true;
  echo 'Signup form';
});

// Check if any route matched
if (!$isFound && (!isset($requestUri) || empty($requestUri))) {
  echo '404 Not Found';
}

?>