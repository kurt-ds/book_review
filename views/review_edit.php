<?php require 'partials/head.php' ?>
<?php require 'partials/header.php' ?>

<main class="review-edit">
    <div class="container">
        <h3 class="review-edit__title">EDITING REVIEW TO: <span><?php echo htmlspecialchars($book['title']); ?></span> </h3>
        <form class="review-edit__form" action="/books/<?php echo htmlspecialchars($book['isbn'])?>/reviews/<?php echo htmlspecialchars($review['review_id'])?>" method="post">
            <input type="hidden" name='_method' value='put'>
            <input type="number" name='rating' id='rating' max=5 min=1 value=<?php echo $review['rating']; ?>>
            <textarea name="review_text" id="review_text" placeholder="Review Text"><?php echo htmlspecialchars($review['review_text']); ?></textarea>
            <input type="hidden" name='user_id' id='user_id' value=<?php echo rand(1,5) ?>>
            <button class="review-edit__submit" type='submit'>Submit</button>
        </form>
    </div>
</main>

<?php require 'partials/footer.php' ?>