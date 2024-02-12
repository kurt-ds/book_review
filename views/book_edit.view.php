<?php require 'partials/head.php' ?>

<h3>Edit book data</h3>

<form action="/books/<?php echo htmlspecialchars($book['isbn']); ?>" method='post'>
        <input type="hidden" name="_method" value="put" />
        <label for="isbn">ISBN</label>
        <input type="number" name='isbn' value="<?php echo $book['isbn']; ?>">
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
        <input type="number" name="user_id" placeholder="Uploaded by: " value='<?php echo htmlspecialchars($book['user_id']); ?>'>
        <br>
        <!-- THUMBNAIL ARE MISSING -->
        <button type="submit" >UPDATE</button>
    </form>

<?php require 'partials/footer.php' ?>