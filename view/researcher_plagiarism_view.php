<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Researcher Plagiarism Score | Ashesi IRB</title>
    <link rel="stylesheet" href="../css/researcher_dash.css">
            <!--  -->

    <link rel="apple-touch-icon" sizes="180x180" href="../images/url_logo/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/url_logo//favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/url_logo//favicon-16x16.png"> 
    <link rel="manifest" href="../images/url_logo//site.webmanifest">
</head>
<body>
     <!--Resuable Header-->
     <header>
        <div class="Logo_section">
        <a href = "researcher_dash.php">
            <img src="../assets/images/ashesi_logo.png" alt="Ashesi Logo">
            

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
                <span><p1>Name</p1></span>
                <span><img src="../assets/images/profile_img.png" alt="Ashesi Logo" height="30"></span>
            </div>
        </div>

    </header>
    <main>
        <br><br>
        <div class="wrap">
            <div class="score_box">
                <span class="score_title">Plagiarism Score: </span><span class="score-percentage">50%</span>
                <div class="bar">
                    <div class="score-per" per="50%" style="max-width: 50%;"></div>
                </div>
            </div>


            <div id="view_prev_plag">
                <h2 id="view_proposal_title">View Proposal</h2>
                <div id="view_proposal">query</div>

                <span id="back_button"> <a href="researcher_prev_sub.php">Go back</span>
            </div>
        </div>

        
    </main>
    
</body>
</html>