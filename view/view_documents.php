<?php
// Fetch uploaded documents
$uploaded_files = glob('../uploads/*');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviewer Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header,
        .footer {
            background-color: #800000;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        .header a,
        .footer a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }

        .notification-panel {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 20px;
        }

        .buttons {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
        }

        .buttons a {
            display: block;
            width: 200px;
            text-align: center;
            padding: 15px;
            background-color: #800000;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .results,
        .comments-section {
            margin: 20px 0;
        }

        .results h3,
        .comments-section h3 {
            margin-bottom: 10px;
        }

        .section {
            margin-bottom: 20px;
        }

        .comments {
            background-color: #f9f9f9;
            padding: 10px;
            border: 1px solid #ddd;
        }

        .comments textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            margin-top: 10px;
        }

        .submit-comments {
            text-align: center;
        }

        .submit-comments button {
            background-color: #800000;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="container">
            <a href="#">Home</a>
            <a href="#">About Us</a>
            <a href="#">Reading</a>
            <a href="#">Contact Us</a>
        </div>
    </div>
    <div class="container">
        <div class="notification-panel">
            <h2>Notification Panel</h2>
            <p>Failed to load notifications.</p>
        </div>
        <div class="buttons">
            <a href="#">View Previous Submissions</a>
            <a href="#">Submit A Proposal</a>
        </div>
        <div class="results">
            <h3>Select a Document to Review</h3>
            <form action="../action/review_document.php" method="POST">
                <select name="document" required>
                    <?php foreach ($uploaded_files as $file): ?>
                        <option value="<?php echo basename($file); ?>"><?php echo basename($file); ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit">Review</button>
            </form>
        </div>
    </div>
</body>

</html>