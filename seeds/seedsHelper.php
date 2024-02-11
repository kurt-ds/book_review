<?php

require_once './includes/dbh.inc.php';


function randomBook() {
    $firstname = array(
        'Johnathon',
        'Anthony',
        'Erasmo',
        'Raleigh',
        'Nancie',
        'Tama',
        'Camellia',
        'Augustine',
        'Christeen',
        'Luz',
        'Diego',
        'Lyndia',
        'Thomas',
        'Georgianna',
        'Leigha',
        'Alejandro',
        'Marquis',
        'Joan',
        'Stephania',
        'Elroy',
        'Zonia',
        'Buffy',
        'Sharie',
        'Blythe',
        'Gaylene',
        'Elida',
        'Randy',
        'Margarete',
        'Margarett',
        'Dion',
        'Tomi',
        'Arden',
        'Clora',
        'Laine',
        'Becki',
        'Margherita',
        'Bong',
        'Jeanice',
        'Qiana',
        'Lawanda',
        'Rebecka',
        'Maribel',
        'Tami',
        'Yuri',
        'Michele',
        'Rubi',
        'Larisa',
        'Lloyd',
        'Tyisha',
        'Samatha',
    );

    $lastname = array(
        'Mischke',
        'Serna',
        'Pingree',
        'Mcnaught',
        'Pepper',
        'Schildgen',
        'Mongold',
        'Wrona',
        'Geddes',
        'Lanz',
        'Fetzer',
        'Schroeder',
        'Block',
        'Mayoral',
        'Fleishman',
        'Roberie',
        'Latson',
        'Lupo',
        'Motsinger',
        'Drews',
        'Coby',
        'Redner',
        'Culton',
        'Howe',
        'Stoval',
        'Michaud',
        'Mote',
        'Menjivar',
        'Wiers',
        'Paris',
        'Grisby',
        'Noren',
        'Damron',
        'Kazmierczak',
        'Haslett',
        'Guillemette',
        'Buresh',
        'Center',
        'Kucera',
        'Catt',
        'Badon',
        'Grumbles',
        'Antes',
        'Byron',
        'Volkman',
        'Klemp',
        'Pekar',
        'Pecora',
        'Schewe',
        'Ramage',
    );

    $quote = array(
        "I wish I had",
        "Why Can't I have",
        "Can I have", 
        "Did you have",
        "Will you get",
        "When will I get"
        );  
        $rand_quote = array_rand($quote,1);
        $items = array(
        "Money", 
        "Time", 
        "Sex", 
        "Coffee", 
        "A Better Job", 
        "A Life", 
        "Better Programming Skills", 
        "Internet that was mine", 
        "More Beer", 
        "More Donuts", 
        "Candy", 
        "My Daughter",
        "Cable",
        "A Dining Room Table",
        "Better Couches",
        "A PS4",
        "A New Laptop",
        "A New Phone",
        "Water",
        "Rum",
        "Movies",
        "A Desktop Computer",
        "A Fish Tank",
        "My Socks",
        "My Jacket", 
        "More Coffee",
        "More Koolaid",
        "More Power",
        "A Truck",
        "Toolbox",
        "More fish for Fish Tank",
        "A Screwdriver",
        "A Projector",
        "More Pants"
        );
            $rand_keys = array_rand($items,1);
            $title = $quote[$rand_quote] ." ". $items[$rand_keys];

    $isbn = rand(1, 100000);
    $firstName = $firstname[rand ( 0 , count($firstname) -1)];
    $lastName = $lastname[rand ( 0 , count($lastname) -1)];
    $user_id = rand(1,5);
    $result = [
        'isbn' => $isbn,
        'author' => $firstName . " " . $lastName,
        'title' => $title,
        'publisher' => "OMF Literature Inc.",
        'synopsis' => '    Lorem ipsum dolor sit amet consectetur adipisicing elit. At laudantium aut ut quisquam eaque animi id, aspernatur nemo quos, autem ipsa, consequatur dolorum dolore quas laborum voluptatum ad? Debitis ex fugit laboriosam ad officiis voluptatibus provident necessitatibus perferendis fuga culpa cupiditate modi alias iure hic, repellendus iusto recusandae natus repudiandae!',
        'publish_year' => 1969,
        'user_id' => $user_id,
    ];
    return $result;
}

function set_book(object $pdo, array $obj) {
    $query = "INSERT INTO books (isbn, author, title, publisher, publish_year, synopsis, user_id) VALUES (:isbn, :author, :title, :publisher, :publish_year, :synopsis, :user_id);";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":isbn", $obj['isbn']);
    $stmt->bindParam(":author", $obj['author']);
    $stmt->bindParam(":title", $obj['title']);
    $stmt->bindParam(":publisher", $obj['publisher']);
    $stmt->bindParam(":publish_year", $obj['publish_year']);
    $stmt->bindParam(":synopsis", $obj['synopsis']);
    $stmt->bindParam(":user_id", $obj['user_id']);

    $stmt->execute();
}

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
    $randomBook = randomBook();
    set_book($pdo, $randomBook);
    var_dump($randomBook);
    echo '<br>';
}


?>
</body>
</html>
