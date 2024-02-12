<?php require 'partials/head.php' ?>
    <h3>Create Books</h3>
    <form action="/books" method='post'>
        <label for="isbn">ISBN</label>
        <input type="number" name='isbn'>
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
        <button type="submit" >Submit</button>
    </form>
<?php require 'partials/footer.php' ?>