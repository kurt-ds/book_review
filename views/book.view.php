<?php require 'partials/head.php' ?>
    <h1> Title:  <?php echo htmlspecialchars($book['title']) ?></h1>
    <p> ISBN: <?php echo htmlspecialchars($book['isbn']) ?> </p>
    <img src="/public/thumbnail.jpg" alt="Book Thumbnail Image">
    <p> Author:  <?php echo htmlspecialchars($book['author']) ?> </p>
    <p> Publisher: <?php echo htmlspecialchars($book['publisher']) ?> </p>
    <p> Publish Year: <?php echo htmlspecialchars($book['publish_year']) ?> </p>
    <p> Synopsis:  <?php echo htmlspecialchars($book['synopsis']) ?> </p>

    <br>
    <p><a href='/books/<?php echo htmlspecialchars($book['isbn'])?>/edit'>EDIT</a></p>

    <form action="/books/<?php echo htmlspecialchars($book['isbn'])?>" method='post'>
        <input type="hidden" name="_method" value="delete" />
        <button type='submit' >DELETE</button>
    </form>

    <h3>Create a Review</h3>
    <form action="/books/<?php echo htmlspecialchars($book['isbn'])?>/reviews" method="post">
        <input type="number" name='rating' id='rating' max=5 min=1 placeholder=1>
        <br>
        <textarea name="review_text" id="review_text" cols="30" rows="10" placeholder="Review Text "></textarea>
        <br>
        <input type="hidden" name='user_id' id='user_id' value=<?php echo rand(1,5) ?>>
        <br>
        <button type='submt' >Submit</button>
        <!-- USER ID IS MISSING GOING TO BE RAND FOR NOW -->
    </form>
    <?php require 'partials/showReviews.php' ?>

<?php require 'partials/footer.php' ?>