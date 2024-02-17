
<?php if (isset($reviews)) { ?>

    <h3>Reviews</h3>

    <?php foreach($reviews as $review)  {
        $reviewer = get_review_owner_by_id($pdo, $review['user_id']);
        ?>
        <div>
            <h5>Rating: <?php echo $review['rating'] ?></h5>
            <p>Text: <?php echo $review['review_text'] ?> </p>
            <p>User: <?php echo $reviewer['username']; ?></p>
        </div>
    <?php } ?>


<?php } ?>