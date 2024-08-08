<?php
// Enable error reporting for debugging purposes
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include '../settings/config.php';


// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form inputs
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email and password are provided
    if (empty($email) || empty($password)) {
        die("Email and password are required.");
    }

    // Prepare a SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT user_id, password, first_name, role_id FROM Users WHERE email = ?");
    if (!$stmt) {
        die("Prepare statement failed: " . $conn->error);
    }

    // Bind parameters and execute the statement
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // Check if a user with the provided email exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $hashed_password, $first_name, $role_id);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Password is correct, set session variables
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $first_name;  // Using first_name as a placeholder for username
            $_SESSION['role_id'] = $role_id;

            // Redirect to lp.php upon successful login
            header("Location: ../view/lp.php");
            exit;
        } else {
            // Invalid password
            die("Invalid email or password.");
        }
    } else {
        // No user found with the provided email
        die("Invalid email or password.");
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If the form was not submitted, redirect to the login page
    header("Location: ../login.php");
    exit;
}
?>
