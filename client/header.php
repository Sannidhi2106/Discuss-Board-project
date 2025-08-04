<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <!-- Logo -->
    <a class="navbar-brand" href="./">
      <img src="./public/logo.png" alt="Logo" />
    </a>

    <!-- Navbar Toggle Button for Mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar Links -->
    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
      <ul class="navbar-nav flex-row gap-3">  
        <li class="nav-item">
          <a class="nav-link active" href="./">Home</a>
        </li>

        <?php
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['user']['username']) && !empty($_SESSION['user']['username'])): ?>
          <li class="nav-item">
            <a class="nav-link" href="./server/requests.php?logout=true">Logout(<?php echo $_SESSION['user']['username'] ?>)</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?ask=true">Ask a Question</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?u-id=<?php echo $_SESSION['user']['user_id'] ?>">My Questions</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="?login=true">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?signup=true">SignUp</a>
          </li>
        <?php endif; ?>

        
        <li class="nav-item">
          <a class="nav-link" href="?latest=true">Latest Questions</a>
        </li>
      </ul>

      <!-- Search Form -->
      <form class="d-flex">
        <input class="form-control me-2" name="search" type="search" placeholder="Search questions">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
