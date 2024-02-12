<?php require 'partials/head.php' ?>
    <h1> Title:  <?php echo htmlspecialchars($book['title']) ?></h1>
    <p> ISBN: <?php echo htmlspecialchars($book['isbn']) ?> </p>
    <img src="/public/thumbnail.jpg" alt="Book Thumbnail Image">
    <p> Author:  <?php echo htmlspecialchars($book['author']) ?> </p>
    <p> Publisher: <?php echo htmlspecialchars($book['publisher']) ?> </p>
    <p> Publish Year: <?php echo htmlspecialchars($book['publish_year']) ?> </p>
    <p> Synopsis:  <?php echo htmlspecialchars($book['synopsis']) ?> </p>


<?php require 'partials/footer.php' ?>