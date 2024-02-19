<?php require 'partials/head.php' ?>
<?php require 'partials/header.php' ?>

<main class="book-new">
    <div class="container">
    <h1 class="book-new__heading">Create Books</h1>
    <form class="book-new__form" action="/books" method='post'>
        <input type="number" name='isbn' placeholder="ISBN">
        <br>
        <input type="text" name='title' placeholder="Title: ">
        <br>
        <input type="text" name='author' placeholder="Author: ">
        <br>
        <input type="text" name='publisher' placeholder='Publisher'>
        <br>
        <input type="number" name="publish_year" placeholder='Publish Year'>
        <br>
        <textarea name="synopsis" id="synopsis" cols="30" rows="10" placeholder="Synopsis: "></textarea>
        <br>
        <input type="number" name="user_id" placeholder="Uploaded by: ">
        <br>
        <!-- THUMBNAIL ARE MISSING -->
        <button class="book-new__submit" type="submit" >Submit</button>
    </form>        
    </div>
</main>
<?php require 'partials/footer.php' ?>