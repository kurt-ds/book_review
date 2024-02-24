<?php require 'partials/head.php' ?>
<?php require 'partials/header.php' ?>

<?php if (isset($_GET['signup']) && $_GET['signup'] === 'success') echo '<script> alert("SIGNUP SUCCESSFUL!") </script>'; ?>
<?php if (isset($_GET['login']) && $_GET['login'] === 'success') echo '<script> alert("LOGIN SUCCESSFUL!") </script>'; ?>

<main class="books">
    <div class="container">
        <div class="books-heading">
            <h1 class="books-heading__text">All books</h1>
            <a class="books-heading__create" href="/books/new">Create NEW BOOK</a>
        </div>
        <div class="books-grid">
            <?php
                foreach ($result as $book) { ?>
                    <a class="books-item" href="/books/<?php echo htmlspecialchars($book["isbn"]); ?>">
                    <img class="books-item__image" src="/<?php echo htmlspecialchars($book["thumbnail"]); ?>" alt="book thumbnail image">
                    <h3 class="books-item__heading">Title: " <?php echo htmlspecialchars($book["title"]); ?></h3>
                    <h4 class="books-item__author">Author: " <?php echo  htmlspecialchars($book["author"]); ?></h4> 
                    <p class="books-item__paragraph">ISBN: " <?php echo htmlspecialchars($book["isbn"]); ?></p>  
                </a>

                
            <?php } ?>
        </div>
    </div>
</main>
    <div>
    </div>

<?php require 'partials/footer.php' ?>