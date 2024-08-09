<?php
// Database connection
include '../settings/config.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch documents with their titles from the database
$sql = "SELECT title, file_path FROM Proposals WHERE status = 'Submitted'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviewer Dashboard | Ashesi IRB</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #B13635;
            color: #fff;
            padding: 20px 35px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-section {
            display: flex;
            align-items: center;
        }

        .logo-section img {
            height: 50px;
            margin-right: 15px;
        }

        .IRB_title {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .IRB_title h1 {
            margin: 0;
            font-size: 20px;
            color: #fff;
            text-transform: uppercase;
            font-weight: bold;
        }

        #menu_bar {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
        }

        .inner_menu_bar a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }

        .inner_menu_bar a:hover {
            text-decoration: underline;
        }

        #User_profile {
            display: flex;
            align-items: center;
            color: white;
        }

        #User_profile p1 {
            margin-right: 10px;
            font-weight: bold;
        }

        .container {
            width: 90%;
            margin: 40px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .notification-panel {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card h3 {
            margin-bottom: 15px;
            font-size: 20px;
            color: #333;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .buttons a {
            display: block;
            flex-grow: 1;
            margin: 0 10px;
            text-align: center;
            padding: 15px;
            background-color: #800000;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .buttons a:hover {
            background-color: #a00000;
        }

        .results {
            text-align: center;
            margin-bottom: 20px;
        }

        .results select {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 60%;
            margin-right: 10px;
        }

        .results button {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            background-color: #800000;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .results button:hover {
            background-color: #a00000;
        }

        .comments-section {
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .comments-section textarea {
            width: 100%;
            padding: 15px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            resize: vertical;
        }

        .submit-comments {
            text-align: center;
        }

        .submit-comments button {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            background-color: #800000;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-comments button:hover {
            background-color: #a00000;
        }

        footer {
            background-color: #B13635;
            color: white;
            padding: 20px 35px;
            text-align: center;
        }

        footer a {
            color: white;
            text-decoration: underline;
        }

        footer a:hover {
            color: #f2f2f2;
        }

        /* Add this for overall score */
        #overall_score {
            font-size: 24px;
            color: #333;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <!-- Reusable Header -->
    <header>
        <div class="logo-section">
            <img src="../assets/images/ashesi_logo.png" alt="Ashesi Logo">
            <div class="IRB_title">
                <h1>INSTITUTIONAL REVIEW BOARD</h1>
            </div>
        </div>

        <div id="menu_bar">
            <div class="inner_menu_bar">
                <a href="researcher_dash.php">Home</a>
            </div>
        </div>
    </header>

    <div class="container">
        <div id="overall_score">Overall Score: 0%</div> <!-- Add this element for overall score -->

        <div class="notification-panel card">
            <h2>Notification Panel</h2>
            <p>Failed to load notifications.</p>
        </div>

        <div class="buttons">
            <a href="researcher_dash.php">Submit A Proposal</a>
        </div>

        <div class="results card">
            <h3>Select a Document to Review</h3>
            <form action="../action/review_document.php" method="POST">
                <select name="document" required>
                    <?php
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['file_path'] . "'>" . $row['title'] . " - " . basename($row['file_path']) . "</option>";
                        }
                    } else {
                        echo "<option>No documents found</option>";
                    }
                    ?>
                </select>
                <button type="submit">Review</button>
            </form>
        </div>

        <div class="comments-section card">
            <h3>Comments</h3>
            <form id="reviewForm" action="submit_review.php" method="POST">
                <!-- Hidden input to store proposal_id -->
                <input type="hidden" id="proposal_id" name="proposal_id">

                <textarea name="comments" placeholder="Enter your comments here..."></textarea>
                <div class="submit-comments">
                    <button type="submit">Submit Comments</button>
                </div>
            </form>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const documentSelect = document.querySelector('select[name="document"]');
                const proposalIdInput = document.getElementById('proposal_id');

                // Assume this is a map of file paths to proposal IDs (fetched from the server)
                const proposalMap = {
                    <?php
                    // Fetch the mapping of file_path to proposal_id from the database
                    $sql = "SELECT proposal_id, file_path FROM Proposals";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "'" . $row['file_path'] . "': " . $row['proposal_id'] . ",";
                        }
                    }
                    ?>
                };


                // Update the hidden field when the document selection changes
                documentSelect.addEventListener('change', function() {
                    const selectedFilePath = documentSelect.value;
                    if (proposalMap[selectedFilePath]) {
                        proposalIdInput.value = proposalMap[selectedFilePath];
                    }
                });
            });
        </script>

        <?php
        // Close the database connection
        $conn->close();
        ?>
</body>

</html>