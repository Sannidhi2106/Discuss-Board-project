<div class="container">
  <h1 class="heading">Login</h1>

  <!-- Display error message if it exists in the session -->
  <?php if (isset($_SESSION['error_message'])): ?>
    <div class="alert alert-danger">
      <?php 
        echo $_SESSION['error_message']; // Display the error message
        unset($_SESSION['error_message']); // Clear the error message after displaying
      ?>
    </div>
  <?php endif; ?>

  <form action="./server/requests.php" method="post">
    <div class="col-6 offset-sm-3 margin-bottom-15">
      <label for="email" class="form-label">User Email</label>
      <input type="text" name="email" class="form-control" id="email" placeholder="enter user email" required>
    </div>

    <div class="col-6 offset-sm-3 margin-bottom-15">
      <label for="password" class="form-label">User Password</label>
      <input type="password" name="password" class="form-control" id="password" placeholder="enter user password" required>
    </div>

    <div class="col-6 offset-sm-3 margin-bottom-15">
      <button type="submit" name="login" class="btn btn-primary">Login</button>
    </div>
  </form>
</div>
