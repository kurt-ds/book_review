<?php if (isset($reviews)) { ?>
    <div class="book-review">
        <h3 class="book-review__heading">Reviews</h3>

        <div class="book-review__grid">
            <?php foreach($reviews as $review)  {
                $reviewer = get_review_owner_by_id($pdo, $review['user_id']);
                ?>
            <div class="book-review__item">  
                <div class="book-review__content">
                    <h5 class="book-review__title"> <strong>Rating:</strong> <?php echo $review['rating'] ?></h5>
                    <p class="book-review__message"> <strong>Message:</strong> <?php echo $review['review_text'] ?> </p>
                    <p class="book-review__user"> <strong>User:</strong> <?php echo $reviewer['username']; ?></p>
                </div>
                <div class="book-review__modifier">
                <form class="book-review__form" action="/books/<?php echo htmlspecialchars($book['isbn'])?>/reviews/<?php echo htmlspecialchars($review['review_id'])?>" method='post'>
                    <input type="hidden" name="_method" value="delete" />
                    <button class="book-review__delete" type='submit' >DELETE</button>
                </form>
                <a class="book-review__edit" href="/books/<?php echo htmlspecialchars($book['isbn'])?>/reviews/<?php echo htmlspecialchars($review['review_id'])?>/edit">EDIT</a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>