<?php
session_start();
if (!isset($_SESSION['ai_results']) || !isset($_SESSION['document'])) {
    echo "No results to display.";
    exit;
}

$ai_results = $_SESSION['ai_results'];
$document = $_SESSION['document'];

// Fetch existing reviewer comments from the database (if any)
require_once('../settings/config.php');
$stmt = $conn->prepare("SELECT comments FROM reviews WHERE proposal_id = ?");
$stmt->bind_param("s", $document);
$stmt->execute();
$stmt->bind_result($reviewer_comments);
$stmt->fetch();
$stmt->close();

// Handle new reviewer comments submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reviewer_comments'])) {
    $new_comments = $_POST['reviewer_comments'];

    if ($reviewer_comments) {
        // Update existing comments
        $stmt = $conn->prepare("UPDATE reviews SET comments = ?, review_date = NOW() WHERE proposal_id = ?");
        $stmt->bind_param("ss", $new_comments, $document);
    } else {
        // Insert new comments
        $stmt = $conn->prepare("INSERT INTO reviews (proposal_id, reviewer_id, review_date, comments) VALUES (?, ?, NOW(), ?)");
        $reviewer_id = 1; // Assuming the reviewer's ID is 1; this should be dynamic
        $stmt->bind_param("sis", $document, $reviewer_id, $new_comments);
    }
    $stmt->execute();
    $stmt->close();

    // Update the variable
    $reviewer_comments = $new_comments;
}

$scores = $ai_results['scores'];
$overall_score = $ai_results['overall_score'];
$comments = $ai_results['comments'];
$overall_comment = $ai_results['overall_comment'];
$detailed_comments = $ai_results; // Adding detailed comments

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Evaluation Results</title>
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
        .comments-section,
        .detailed-comments-section {
            margin: 20px 0;
        }

        .results h3,
        .comments-section h3,
        .detailed-comments-section h3 {
            margin-bottom: 10px;
        }

        .section {
            margin-bottom: 20px;
        }

        .comments,
        .detailed-comments {
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

        .detailed-comments-section h4 {
            margin-top: 20px;
        }

        .detailed-comments p {
            margin-bottom: 10px;
            white-space: pre-wrap;
            /* Preserve formatting */
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
            <h3>AI Evaluation Results</h3>
            <div class="section">
                <h4>Overall Score</h4>
                <p><?php echo htmlspecialchars($overall_score); ?></p>
            </div>
            <div class="section">
                <h4>Overall Comment</h4>
                <p><?php echo htmlspecialchars($overall_comment); ?></p>
            </div>
            <div class="section">
                <h4>Section Scores and Comments</h4>
                <?php foreach ($scores as $section => $score): ?>
                    <div class="section">
                        <h4><?php echo ucfirst(htmlspecialchars($section)); ?> (Score: <?php echo htmlspecialchars($score); ?>)</h4>
                        <div class="comments">
                            <?php echo nl2br(htmlspecialchars($comments[$section])); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="comments-section">
            <h3>Reviewer Comments</h3>
            <div class="comments">
                <form action="display_results.php" method="POST">
                    <textarea name="reviewer_comments" placeholder="Add your comments here..."><?php echo htmlspecialchars($reviewer_comments); ?></textarea>
                    <div class="submit-comments">
                        <button type="submit">Submit Comments</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="detailed-comments-section">
            <h3>Detailed AI Comments</h3>
            <div class="detailed-comments">
                <?php foreach ($detailed_comments as $key => $value): ?>
                    <h4><?php echo ucfirst(htmlspecialchars($key)); ?>:</h4>
                    <?php if (is_array($value)): ?>
                        <?php foreach ($value as $sub_key => $sub_value): ?>
                            <p><strong><?php echo ucfirst(htmlspecialchars($sub_key)); ?>:</strong> <?php echo nl2br(htmlspecialchars($sub_value)); ?></p>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p><?php echo nl2br(htmlspecialchars($value)); ?></p>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>

</html>