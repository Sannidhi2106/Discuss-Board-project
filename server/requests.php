<?php
session_start();
include("../common/db.php");

// Handle user signup


if (isset($_POST['signup'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $address = trim($_POST['address']);

    // Backend Validation
    if (empty($username) || empty($email) || empty($password) || empty($address)) {
        echo "All fields are required.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    if (strlen($password) < 6) {
        echo "Password must be at least 6 characters.";
        exit;
    }

    // Hash password for security
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, address) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $hashedPassword, $address);
    
    if ($stmt->execute()) {
        $_SESSION["user"] = ["username" => $username, "email" => $email, "user_id" => $stmt->insert_id];
        header("location: /discuss");
    } else {
        echo "New user not registered.";
    }

    $stmt->close();
    $conn->close();
}


// Handle user login




if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Make sure to hash the password before comparing
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($query);
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Redirect if credentials are correct
            $_SESSION['user'] = [
                'username' => $user['username'],
                'email' => $user['email'],
                'user_id' => $user['id']
            ];
            header("Location: /discuss"); // Make sure this URL is correct
        } else {
            echo "Incorrect password";
        }
    } else {
        echo "User not found";
    }
}







// Handle logout
else if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: /discuss");
    exit();
}

// Handle asking a question
else if (isset($_POST["ask"])) {
    if (!isset($_SESSION['user']['user_id'])) {
        echo "You must be logged in to ask a question.";
        exit();
    }

    $title = $_POST['title'];
    $description = $_POST['description'];
    $category_id = $_POST['category'];
    $user_id = $_SESSION['user']['user_id'];

    $stmt = $conn->prepare("INSERT INTO questions (title, description, category_id, user_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssii", $title, $description, $category_id, $user_id);

    if ($stmt->execute()) {
        header("Location: /discuss");
        exit();
    } else {
        echo "Question is not added to the website.";
    }
}

// Handle submitting an answer
else if (isset($_POST["answer"])) {
    if (!isset($_SESSION['user']['user_id'])) {
        echo "You must be logged in to submit an answer.";
        exit();
    }

    $answer = $_POST['answer'];
    $question_id = $_POST['question_id'];
    $user_id = $_SESSION['user']['user_id'];

    $stmt = $conn->prepare("INSERT INTO answers (answer, question_id, user_id) VALUES (?, ?, ?)");
    $stmt->bind_param("sii", $answer, $question_id, $user_id);

    if ($stmt->execute()) {
        header("Location: /discuss?q-id=$question_id");
        exit();
    } else {
        echo "Answer is not submitted.";
    }
}

// Handle deleting a question
else if (isset($_GET["delete"])) {
    $qid = $_GET["delete"];

    $stmt = $conn->prepare("DELETE FROM questions WHERE id = ?");
    $stmt->bind_param("i", $qid);

    if ($stmt->execute()) {
        header("Location: /discuss");
        exit();
    } else {
        echo "Question not deleted.";
    }
}
?>
