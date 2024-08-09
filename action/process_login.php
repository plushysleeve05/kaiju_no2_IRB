<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include '../settings/config.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        header("Location: ../login.php?error=Please fill in all fields.");
        exit;
    }

    $stmt = $conn->prepare("SELECT user_id, password, first_name, role_id FROM Users WHERE email = ?");
    if (!$stmt) {
        header("Location: ../login.php?error=Database error. Please try again later.");
        exit;
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $hashed_password, $first_name, $role_id);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $first_name;
            $_SESSION['role_id'] = $role_id;

            header("Location: ../view/lp.php");
            exit;
        } else {
            header("Location: ../login.php?error=Incorrect password. Please try again.");
        }
    } else {
        header("Location: ../login.php?error=No user found with this email.");
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../login.php?error=Invalid request.");
}
