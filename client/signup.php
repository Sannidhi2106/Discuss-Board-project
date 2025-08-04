<div class="container">
    <h1 class="heading">Signup</h1>

    <form method="post" action="./server/requests.php" onsubmit="return validateSignup(event)"> 
        <div class="col-6 offset-sm-3 margin-bottom-15">
            <label for="username" class="form-label">User Name</label>
            <input type="text" name="username" class="form-control" id="username" placeholder="Enter user name" required>
        </div>

        <div class="col-6 offset-sm-3 margin-bottom-15">
            <label for="email" class="form-label">User Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter user email" required>
        </div>

        <div class="col-6 offset-sm-3 margin-bottom-15">
            <label for="password" class="form-label">User Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Enter user password" required minlength="6">
        </div>

        <div class="col-6 offset-sm-3 margin-bottom-15">
            <label for="address" class="form-label">User Address</label>
            <input type="text" name="address" class="form-control" id="address" placeholder="Enter user address" required>
        </div>

        <div class="col-6 offset-sm-3 margin-bottom-15">
            <button type="submit" name="signup" class="btn btn-primary">Signup</button>
        </div>
    </form>
</div>

<script>
function validateSignup(event) {
    let username = document.getElementById("username").value.trim();
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value.trim();
    let address = document.getElementById("address").value.trim();

    let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;  // Email regex pattern

    if (username === "" || email === "" || password === "" || address === "") {
        alert("All fields are required.");
        event.preventDefault();
        return false;
    }

    if (!email.match(emailPattern)) {
        alert("Enter a valid email address.");
        event.preventDefault();
        return false;
    }

    if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        event.preventDefault();
        return false;
    }

    return true;
}
</script>
