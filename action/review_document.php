<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $document = $_POST['document'];
    $file_path = '../uploads/' . $document;

    // Check if the file exists
    if (!file_exists($file_path)) {
        echo "File does not exist.";
        exit;
    }

    // Send the file to the Flask AI
    $flask_api_url = 'http://localhost:5000/upload';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $flask_api_url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, [
        'file' => new CURLFile($file_path)
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $flask_response = curl_exec($ch);
    curl_close($ch);

    // Decode the JSON response from Flask
    $flask_response_data = json_decode($flask_response, true);
    // var_dump($flask_response_data);  // Add this line for debugging
    // exit;

    if ($flask_response_data) {
        // Store the Flask response data in a session variable
        session_start();
        $_SESSION['ai_results'] = $flask_response_data;
        $_SESSION['document'] = $document;
        header("Location: ../view/display_results.php");
        exit;
    } else {
        echo "Failed to get a valid response from the AI.";
    }
} else {
    echo "Invalid request method.";
}
