<?php require 'partials/head.php' ?>
<?php require 'partials/header.php' ?>

<main class="book-edit">
    <div class="container">
    <h3 class="book-edit__title">Edit book data</h3>

    <form class="book-edit__form" action="/books/<?php echo htmlspecialchars($book['isbn']); ?>" method='post' enctype='multipart/form-data'>
        <input type="hidden" name="_method" value="put" />
        <label class="book-edit__isbn" for="isbn">ISBN: <?php echo $book['isbn']; ?></label>
        <input type="hidden" name='isbn' value="<?php echo $book['isbn']; ?>">
        <br>
        <input type="text" name='title' placeholder="Title: " value="<?php echo htmlspecialchars($book['title']); ?>">
        <br>
        <input type="text" name='author' placeholder="Author: " value='<?php echo htmlspecialchars($book['author']); ?>'>
        <br>
        <input type="text" name='publisher' placeholder='Publisher' value='<?php echo htmlspecialchars($book['publisher']); ?>' >
        <br>
        <input type="number" name="publish_year" placeholder='Publish Year' value='<?php echo htmlspecialchars($book['publish_year']); ?>'>
        <br>
        <textarea name="synopsis" id="synopsis" cols="30" rows="10" placeholder="Synopsis: "> <?php echo htmlspecialchars($book['synopsis']); ?> </textarea>
        <br>
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']?>">
        <input type="file" name='file' id='file'>
        <br>
        <!-- THUMBNAIL ARE MISSING -->
        <button class="book-edit__submit" type="submit" >UPDATE</button>
    </form>
    </div>
</main>

<?php require 'partials/footer.php' ?>