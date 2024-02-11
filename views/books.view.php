<?php require 'partials/head.php' ?>
    <p>Welcome <?php echo ucfirst($params['name'] ?? 'guest') ?> !</p>
    <ul>
        <li><a href="/login">Login</a></li>
        <li><a href="/signup">Signup</a></li>
    </ul>
    <ul>
    <?php
        foreach ($result as $book) { ?>
        <img src="./public/thumbnail.jpg" alt="book thumbnail image">
        <li>Title: " <?php echo $book["title"]; ?></li>
        <li>Author: " <?php echo $book["author"]; ?></li> 
        <li>ISBN: " <?php echo $book["isbn"]; ?></li>  
        <br>
    <?php } ?>


  ?>
    </ul>
    <form action="/books" method="post">
        <button>Submit</button>
    </form>

<?php require 'partials/footer.php' ?>