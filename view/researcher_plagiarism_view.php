<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plagiarism Checker | Ashesi IRB</title>
    <link rel="stylesheet" href="../css/researcher_dash.css">
    <style>
        .container {
            width: 60%;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
        }

        .header,
        .footer {
            background-color: #B13635;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .header a,
        .footer a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
        }

        h1 {
            color: #333333;
            margin-bottom: 30px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        textarea {
            width: 100%;
            height: 200px;
            padding: 15px;
            font-size: 16px;
            margin-top: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .submit-button {
            background-color: #B13635;
            color: #fff;
            padding: 15px 30px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            display: block;
            width: 100%;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .submit-button:hover {
            background-color: #8B0000;
        }

        .plagiarism-score {
            margin-top: 30px;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
        }

        .sources {
            margin-top: 20px;
            font-size: 18px;
        }

        .sources ul {
            list-style-type: none;
            padding: 0;
        }

        .sources li {
            padding: 10px;
            background-color: #f4f4f4;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .button {
            display: inline-block;
            background-color: #B13635;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            text-align: center;
            display: block;
            width: 150px;
            margin-left: auto;
            margin-right: auto;
        }

        .button:hover {
            background-color: #8B0000;
        }
    </style>
</head>

<body>
    <!-- Reusable Header -->
    <header>
        <div class="Logo_section">
            <a href="researcher_dash.php">
                <img src="../Images/ashesi_logo.png" alt="Ashesi Logo">
                <div class="IRB_title">
                    <h1>INSTITUTIONAL</h1>
                    <h1>REVIEW</h1>
                    <h1>BOARD</h1>
                </div>
            </a>
        </div>

        <div id="menu_bar">
            <div class="inner_menu_bar">
                <a href="lp.php">Home</a>
                <a href="researcher_plagiarism_view.php">Plagiarism checker</a>
                <a href="researcher_dash.php">Submit a paper</a>
            </div>
            <div id="User_profile">
                <span>
                    <p>Name</p>
                </span>
                <span><img src="../images/profile_img.png" alt="Profile Image" height="30"></span>
            </div>
        </div>
    </header>

    <!-- Main Content -->
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

    <footer>
        <!-- Footer content goes here -->
    </footer>
</body>

</html>