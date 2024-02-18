<?php require 'partials/head.php' ?>
<?php require 'partials/show_signup_errors.php'?>

<p>This is where you log in</p>

<h3>Login Form</h3>

<form action="/login" method='post'>
    <br>
    <input type="text" name='username' placeholder='Username'>
    <br>
    <input type="password" name='pwd' placeholder='Password'>
    <br>
    <button type='submit' >Log in</button>
</form>

<?php  check_login_errors(); ?>

<?php require 'partials/footer.php' ?>