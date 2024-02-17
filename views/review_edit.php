<?php require 'partials/head.php' ?>

<h3>EDITING REVIEW TO <?php echo htmlspecialchars($book['title']); ?></h3>


<h3>Edit a Review</h3>
    <form action="/books/<?php echo htmlspecialchars($book['isbn'])?>/reviews/<?php echo htmlspecialchars($review['review_id'])?>" method="post">
        <input type="hidden" name='_method' value='put'>
        <input type="number" name='rating' id='rating' max=5 min=1 value=<?php echo $review['rating']; ?>>
        <br>
        <textarea name="review_text" id="review_text" cols="30" rows="10" placeholder="Review Text ">
            <?php echo htmlspecialchars($review['review_text']); ?>
        </textarea>
        <br>
        <input type="hidden" name='user_id' id='user_id' value=<?php echo rand(1,5) ?>>
        <br>
        <button type='submt' >Submit</button>
        <!-- USER ID IS MISSING GOING TO BE RAND FOR NOW -->
    </form>
<?php require 'partials/footer.php' ?>