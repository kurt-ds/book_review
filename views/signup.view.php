<?php require 'partials/head.php' ?>
<?php require 'partials/show_signup_errors.php'?>

<p>This is where you sign up</p>

<h3>SIGN UP FORM</h3>
<form action="/signup" method='post'>
    <input type="text" name='username' id='username' placeholder='Username'>
    <br>
    <input type="text" name='firstname' id='firstname' placeholder='First name'>
    <br>
    <input type="text" name='lastname' id='lastname' placeholder='Last Name'>
    <br>
    <input type="password" name='pwd' id='pwd' placeholder='Password'>
    <br>
    <input type="email" name='email' id='email' placeholder='Email'>
    <br>
    <button type='submit' >Sign up</button>
</form>

<?php  check_signup_errors(); ?>

<?php require 'partials/footer.php' ?>