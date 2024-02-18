<?php require 'partials/head.php' ?>
<?php if (isset($_GET['logout']) && $_GET['logout'] === 'success') echo '<script> alert("LOGOUT SUCCESSFUL!") </script>'; ?>


<p>This is the landing page</p>

<a href="/books">BOOKS</a>
<br>
<a href="/login">LOGIN</a>
<br>
<a href="/signup">SIGN UP</a>

<?php require 'partials/footer.php' ?>