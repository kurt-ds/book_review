<?php require 'partials/head.php' ?>
<?php require 'partials/show_signup_errors.php'?>

<div class="log-in__container">
    <div class="log-in__wrapper">
        <form action="/login" method='post'>
            <div class="log-in__input-box" id="log-in__header">
                <img src="public/logo/bookly-logo.png">
            </div><br><br>
            <div class="log-in__input-box">
                <input type="text" name='username' id='log-in__textbox' placeholder="USERNAME"
                required>
            </div>   
            <div class="log-in__input-box">
                <input type="password" name='pwd' id='log-in__textbox' placeholder="PASSWORD"
                required>
            </div>   
            <div class="log-in__input-box">
                <button class=log-in__btn type='submit'>LOG IN</button>
            </div>
            <div class="log-in__input-box">
                <p class='signup__txt'>DON'T HAVE AN ACCOUNT? <a class='signup__txt' href="/signup">SIGN UP</a></p>
            </div>
        </form>
    </div>
</div>

<?php  check_login_errors(); ?>

<?php require 'partials/footer.php' ?>