<?php
require_once('../settings/config.php');

$response = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['Proposal_Title'];
    $researcher_id = 1; // Example researcher ID, replace this with the actual logged-in user's ID

    // Handle file upload
    if (isset($_FILES['proposal_file'])) {
        $file_error = $_FILES['proposal_file']['error'];
        if ($file_error == UPLOAD_ERR_OK) {
            $upload_dir = '../uploads/';
            if (!is_dir($upload_dir)) {
                $response = "Upload directory does not exist: $upload_dir";
                echo $response;
                exit;
            }

            if (!is_writable($upload_dir)) {
                $response = "Upload directory is not writable: $upload_dir";
                echo $response;
                exit;
            }
            $file_name = basename($_FILES['proposal_file']['name']);
            $file_path = $upload_dir . $file_name;

            if (move_uploaded_file($_FILES['proposal_file']['tmp_name'], $file_path)) {
                // File uploaded successfully, save the proposal details in the database
                $stmt = $conn->prepare("INSERT INTO Proposals (title, description, researcher_id, file_path) VALUES (?, ?, ?, ?)");
                $description = ''; // Description is not provided in the form, so leave it empty
                $stmt->bind_param("ssis", $title, $description, $researcher_id, $file_path);

                if ($stmt->execute()) {
                    $response = 'success';
                } else {
                    $response = 'Database error: ' . $stmt->error;
                }

                $stmt->close();
            } else {
                $response = 'Error moving the uploaded file.';
            }
        } else {
            $response = 'File upload error: ' . $file_error;
        }
    } else {
        $response = 'No file uploaded.';
    }

    $conn->close();
    echo $response; // Output the response
} else {
    echo 'Invalid request method.';
}
