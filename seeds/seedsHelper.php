<?php

require_once './includes/dbh.inc.php';

function set_book(object $pdo, array $data) {
    $query = "INSERT INTO books (isbn, author, title, publisher, publish_year, synopsis, thumbnail, user_id) VALUES (:isbn, :author, :title, :publisher, :publish_year, :synopsis, :thumbnail, :user_id);";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":isbn", $data['isbn']);
    $stmt->bindParam(":author", $data['author']);
    $stmt->bindParam(":title", $data['title']);
    $stmt->bindParam(":publisher", $data['publisher']);
    $stmt->bindParam(":publish_year", $data['publish_year']);
    $stmt->bindParam(":synopsis", $data['synopsis']);
    $stmt->bindParam(":thumbnail", $data['thumbnail']);
    $stmt->bindParam(":user_id", $data['user_id']);

    $stmt->execute();
}

function getRandomInt() {
	// Use mt_rand for better randomness
	return mt_rand(1, 5);
  }

$book1 = [
	"9780451524935",
	"George Orwell",
	"1984",
	"Signet Classics",
	"1949",
	"A dystopian novel set in a totalitarian society."
];

$book2 = [
	"9780061120084",
	"J.K. Rowling",
	"Harry Potter and the Sorcerer's Stone",
	"Scholastic",
	"1997",
	"The start of the magical journey of a young wizard."
];

$book3 = [
	"9780060558126",
	"Harper Lee",
	"To Kill a Mockingbird",
	"Harper Perennial Modern Classics",
	"1960",
	"A classic novel exploring racial injustice and moral growth."
];

$book4 = [
	"9780060917012",
	"Gabriel Garcia Marquez",
	"One Hundred Years of Solitude",
	"Harper Perennial Modern Classics",
	"1967",
	"A magical realist saga of the Buendía family in Macondo."
];

$book5 = [
	"9780141185070",
	"Jane Austen",
	"Pride and Prejudice",
	"Penguin Classics",
	"1813",
	"A timeless tale of love, class, and societal expectations."
];

$book6 = [
	"9780061124952",
	"Suzanne Collins",
	"The Hunger Games",
	"Scholastic Press",
	"2008",
	"A dystopian adventure where teenagers fight for survival."
];

$book7 = [
	"9780140441008",
	"Fyodor Dostoevsky",
	"Crime and Punishment",
	"Penguin Classics",
	"1866",
	"A psychological novel exploring morality and redemption."
];

$book8 = [
	"9780385504201",
	"Dan Brown",
	"The Da Vinci Code",
	"Anchor",
	"2003",
	"A gripping thriller involving art, religion, and secret codes."
];

$book9 = [
	"9780545010221",
	"J.R.R. Tolkien",
	"The Lord of the Rings",
	"Mariner Books",
	"1954",
	"An epic fantasy trilogy set in the world of Middle-earth."
];

$book10 = [
	"9780735219090",
	"Michelle Obama",
	"Becoming",
	"Crown Publishing Group",
	"2018",
	"A memoir of the former First Lady, reflecting on her life and experiences."
];

$allBooksData = [
    $book1,
    $book2,
    $book3,
    $book4,
    $book5,
    $book6,
    $book7,
    $book8,
    $book9,
    $book10,
];

$thumbnails = [
	"thumbnail1.png",
	"thumbnail2.png",
	"thumbnail3.png",
	"thumbnail4.png",
	"thumbnail5.png",
	"thumbnail6.jpg",
	"thumbnail7.jpg",
	"thumbnail8.jpg",
	"thumbnail9.png",
	"thumbnail10.jpeg",
];



?>    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seeds</title>
</head>
<body>
<?php


for($i = 0; $i < 10; $i++) {
	$currentBook = $allBooksData[$i];
    $randomBook = [
		"isbn" => $currentBook[0],
		"author" => $currentBook[1],
		"title" => $currentBook[2],
		"publisher" => $currentBook[3],
		"publish_year" => $currentBook[4],
		"synopsis" => $currentBook[5],
		"thumbnail" => "uploads/" . $thumbnails[$i],
		"user_id" => getRandomInt(),
	];
    set_book($pdo, $randomBook);
    var_dump($randomBook);
    echo '<br>';
}


?>
</body>
</html>
