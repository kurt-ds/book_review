<?php require 'partials/head.php' ?>
    <p>Welcome <?php echo ucfirst($params['name'] ?? 'guest') ?> !</p>
    <ul>
        <li><a href="/login">Login</a></li>
        <li><a href="/signup">Signup</a></li>
    </ul>
    <ul>
        <li><a href="views/book.view.php'">Single Book</a></li>
    </ul>
    <form action="/books" method="post">
        <button>Submit</button>
    </form>

<?php require 'partials/footer.php' ?>