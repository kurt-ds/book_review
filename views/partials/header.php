<?php $loggedIn = isset($_SESSION['user_id']); ?>


<header class="header">
  <div class="container">
    <div class="header-wrapper">
      <a href="/">
        <img src="/public/logo/bookly-logo.png" alt="bookly logo" class="header-nav__image">
      </a>
      <nav class="header-nav">
        <ul class="header-nav__list">
          <?php if ($loggedIn) { ?>
            <li><a href="/books" class="header-nav__link">Books</a></li>
            <li><a href="/logout" class="header-nav__link --primary">Logout</a></li>
          <?php } else { ?>
            <li><a href="login" class="header-nav__link --primary">Login</a></li>
          <?php } ?>
          <?php if ($loggedIn) { ?>
            <li>
              <p class="header-nav__welcome">Welcome, <?php echo ucfirst($_SESSION['user_username'] ?? 'guest') ?> !</p>
            </li>
          <?php } ?>
        </ul>
      </nav>
    </div>
  </div>
</header>