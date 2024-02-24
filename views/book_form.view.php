<?php require 'partials/head.php' ?>
<?php require 'partials/header.php' ?>
<?php require 'partials/show_signup_errors.php' ?>



<main class="book-new">
    <div class="container">
    <h1 class="book-new__heading">Create Books</h1>
    <form class="book-new__form" action="/books" method='post' enctype='multipart/form-data'>
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
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']?>">
        <input type="file" name='file' id='file'>
        <br>
        <!-- THUMBNAIL ARE MISSING -->
        <button class="book-new__submit" type="submit" >Submit</button>
    </form>        
    </div>

    <?php check_book_errors(); ?>

</main>
<?php require 'partials/footer.php' ?>