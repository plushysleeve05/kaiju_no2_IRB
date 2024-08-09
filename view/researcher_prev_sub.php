<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Researcher Past Papers | Ashesi IRB</title>
    <link rel="stylesheet" href="../css/researcher_dash.css">

    <link rel="apple-touch-icon" sizes="180x180" href="../images/url_logo/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/url_logo/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/url_logo/favicon-16x16.png">
    <link rel="manifest" href="../images/url_logo/site.webmanifest">

    <style>
        /* General Styling */
        body {
            font-family: "Sen Regular", sans-serif;
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

        /* Table Styling */
        #prev_sub_table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        #prev_sub_table th,
        #prev_sub_table td {
            padding: 12px 15px;
            text-align: left;
        }

        #prev_sub_table th {
            background-color: #B13635;
            color: white;
        }

        #prev_sub_table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #prev_sub_table tr:hover {
            background-color: #ddd;
        }

        .view_more {
            color: #B13635;
            cursor: pointer;
            text-decoration: underline;
        }

        .view_more:hover {
            color: #8B0000;
        }

        /* Details Section */
        .wrap {
            display: none;
            margin-top: 30px;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        #view_prev h2 {
            margin-top: 0;
            font-size: 24px;
            color: #333;
        }

        #collapse_button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #B13635;
            color: white;
            text-align: center;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        #collapse_button:hover {
            background-color: #8B0000;
        }

        /* Footer */
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
                <a href="researcher_dash.php">Back</a>
                <a href="researcher_plagiarism_view.php">Plagiarism checker</a>
                <a href="view_documents.php">Review Paper as reviewer</a>
            </div>
        </div>

        <!-- <div id="User_profile">
            <span>
                <p1>John Doe</p1>
            </span>
            <span><img src="../assets/images/profile_img.png" alt="Profile Image" height="30"></span>
        </div> -->
    </header>

    <main id="prev_sub_page" class="container">
        <h2>Researcher Past Papers</h2>
        <table id="prev_sub_table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Proposal Title</th>
                    <th>Date Created</th>
                    <th>Last Edited</th>
                    <th>Status</th>
                    <th>View More</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Proposal A</td>
                    <td>2024-01-01</td>
                    <td>2024-01-15</td>
                    <td>Approved</td>
                    <td><span class="view_more">View more</span></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Proposal B</td>
                    <td>2024-05-01</td>
                    <td>2024-07-15</td>
                    <td>Approved</td>
                    <td><span class="view_more">View more</span></td>
                </tr>
            </tbody>
        </table>

        <div class="wrap">
            <div id="view_prev">
                <h2 id="view_proposal_title">View Proposal</h2>
                <div id="view_proposal">Query</div>
                <h2 id="view_comments_title">View Comments</h2>
                <div id="view_comments">Query</div>
                <span id="collapse_button">COLLAPSE</span>
            </div>
        </div>
    </main>

    <!-- <footer>
        <a href="https://www.ashesi.edu.gh/">
            <span id="foot_logo"><img src="../assets/images/a.png" alt="Ashesi Logo"></span>
        </a>
        <div class="foot-message">
            1 University Avenue, Berekuso, Ghana. &nbsp;|&nbsp;
            <a href="https://www.ashesi.edu.gh/">Visit our website</a>
        </div>
    </footer> -->

    <script>
        document.querySelectorAll('.view_more').forEach(function(element) {
            element.addEventListener('click', function() {
                document.querySelector('.wrap').style.display = 'block';
            });
        });

        document.getElementById('collapse_button').addEventListener('click', function() {
            document.querySelector('.wrap').style.display = 'none';
        });
    </script>
</body>

</html>