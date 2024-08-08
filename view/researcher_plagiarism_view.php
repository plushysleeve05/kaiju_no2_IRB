<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plagiarism Checker</title>
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

        .form-group {
            margin-bottom: 20px;
        }

        textarea {
            width: 100%;
            height: 200px;
            padding: 10px;
            font-size: 16px;
            margin-top: 10px;
        }

        .submit-button {
            background-color: #800000;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .plagiarism-score {
            margin-top: 20px;
            font-size: 24px;
            font-weight: bold;
        }

        .sources {
            margin-top: 20px;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="container">
            <a href="#">Home</a>
            <a href="#">Plagiarism checker</a>
            <a href="#">Submit a paper</a>
        </div>
    </div>
    <div class="container">
        <h1>Plagiarism Checker</h1>

        <form action="researcher_plagiarism_view.php" method="POST">
            <div class="form-group">
                <label for="text_to_check">Enter your text to check for plagiarism:</label>
                <textarea name="text_to_check" id="text_to_check" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="submit-button">Check Plagiarism</button>
            </div>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $text_to_check = $_POST['text_to_check'];

            // Set up cURL to call the Flask API
            $flask_api_url = 'http://localhost:5000/check_plagiarism';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $flask_api_url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
            ));
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array('text' => $text_to_check)));

            $response = curl_exec($ch);
            curl_close($ch);

            $response_data = json_decode($response, true);

            if (isset($response_data['plagiarism_score'])) {
                $plagiarism_score = $response_data['plagiarism_score'];
                $sources = $response_data['sources'];

                echo "<div class='plagiarism-score'>Plagiarism Score: {$plagiarism_score}%</div>";

                if ($sources) {
                    echo "<div class='sources'><h3>Sources:</h3><ul>";
                    foreach ($sources as $source => $percentage) {
                        echo "<li>{$source} - {$percentage}%</li>";
                    }
                    echo "</ul></div>";
                } else {
                    echo "<p>No sources found.</p>";
                }
            } else {
                echo "<p>Failed to check for plagiarism. Please try again.</p>";
            }
        }
        ?>

        <a href="index.php" class="button">Go back</a>
    </div>
</body>

</html>