<?php require 'partials/head.php' ?>
<?php require 'partials/header.php' ?>

<main class="book-content">
    <div class="container">
        <div class="book-content__intro">
            <img class="book-content__image" src="/public/thumbnail.jpg" alt="Book Thumbnail Image">
            <div class="book-content__details">
                <h1 class="book-content__title"> <strong>Title:</strong> <?php echo htmlspecialchars($book['title']) ?></h1>
                <p> <strong>ISBN:</strong> <?php echo htmlspecialchars($book['isbn']) ?> </p>
                <p> <strong>Author:</strong>  <?php echo htmlspecialchars($book['author']) ?> </p>
                <p> <strong>Publisher:</strong> <?php echo htmlspecialchars($book['publisher']) ?> </p>
                <p> <strong>Publish Year:</strong> <?php echo htmlspecialchars($book['publish_year']) ?> </p>
                <p> <strong>Synopsis:</strong>  <?php echo htmlspecialchars($book['synopsis']) ?> </p>
            </div>
        </div>
        
        <!-- Star Rating Input -->
        <form class="book-content__form" action="/books/<?php echo htmlspecialchars($book['isbn'])?>/reviews" method="post">
            <div class="book-content__rating-wrapper">
            <h3 class="book-content__rating-title">Rate this book</h3>
                <div class="book-content__rating">
                <input type="radio" id="star5" name="rating" value="5" />
                <label for="star5" title="5 stars"></label>
                <input type="radio" id="star4" name="rating" value="4" />
                <label for="star4" title="4 stars"></label>
                <input type="radio" id="star3" name="rating" value="3" />
                <label for="star3" title="3 stars"></label>
                <input type="radio" id="star2" name="rating" value="2" />
                <label for="star2" title="2 stars"></label>
                <input type="radio" id="star1" name="rating" value="1" />
                <label for="star1" title="1 star"></label>
                </div>
            </div>
            <textarea class="book-content__rating-text" name="review_text" id="review_text" cols="30" rows="10" placeholder="Review Text"></textarea>
            <input type="hidden" name='user_id' id='user_id' value=<?php echo rand(1,5) ?>>
            <br>
            <button class="book-content__rating-submit" type='submit'>Submit</button>
            <!-- USER ID IS MISSING GOING TO BE RAND FOR NOW -->
        </form>
        <?php require 'partials/showReviews.php' ?>
    </div>
</main>

<?php require 'partials/footer.php' ?>