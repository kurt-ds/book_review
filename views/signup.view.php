<?php require 'partials/head.php' ?>
<?php require 'partials/header.php' ?>
<?php require 'partials/show_signup_errors.php'?>

<div class = "sign-up_page"> 
<div class="sign-up_container">
        <h3>CREATE ACCOUNT</h3>
        
        <form action="/signup" method='post'>
        <div class="sign-up_inputs">
          <div class="sign-up-name_inputs">
            <input type="text" name='firstname' id='firstname' placeholder='First name' required>
            <input type="text" name='lastname' id='lastname' placeholder='Last Name' required>
          </div>
          <input type="text" name='username' id='username' placeholder='Username' required>
          <input type="password" name='pwd' id='pwd' placeholder='Password' required>
          <input type="email" name='email' id='email' placeholder='Email' require>
        </div>
      
        <button type ="submit" class="sign-up_button">Create Account</button>
      
        <p>Already have an account? <a href="/login" class="login-link">Login</a></p>
      
      </div>
</form>
</div>
</div>

<?php  check_signup_errors(); ?>

<?php require 'partials/footer.php' ?>