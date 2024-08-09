<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include '../settings/config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate input
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
        echo "All fields are required.";
        exit;
    }

    // Check if the user already exists
    $stmt = $conn->prepare("SELECT user_id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "<script>alert('A user with this email already exists.'); window.location.href = '../index.php';</script>";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert the new user into the database
        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password, role_id) VALUES (?, ?, ?, ?, 3)");
        $stmt->bind_param("ssss", $first_name, $last_name, $email, $hashed_password);

        if ($stmt->execute()) {
            $_SESSION['user_id'] = $stmt->insert_id;
            $_SESSION['username'] = $first_name;
            $_SESSION['role_id'] = 3; // Default role is 'User'

            header("Location: ../index.php");
            exit;
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }

    $stmt->close();
    $conn->close();
}
?>
