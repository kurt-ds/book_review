<?php require 'partials/head.php' ?>
    <p>Welcome <?php echo ucfirst($params['name'] ?? 'guest') ?> !</p>
    <ul>
        <li><a href="views/book.view.php'">Single Book</a></li>
    </ul>

<?php require 'partials/footer.php' ?>