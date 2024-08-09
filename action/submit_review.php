<?php
// Database connection
$conn = new mysqli('your_host', 'your_username', 'your_password', 'your_database');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the proposal ID and comments from the form
    $proposal_id = $_POST['proposal_id'];
    $comments = $conn->real_escape_string($_POST['comments']);

    // Insert the review into the reviews table
    $sql = "INSERT INTO reviews (proposal_id, comments) VALUES ('$proposal_id', '$comments')";

    if ($conn->query($sql) === TRUE) {
        echo "Review submitted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
