<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Researcher Past Papers | Ashesi IRB</title>
    <link rel="stylesheet" href="../css/researcher_dash.css">
    
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
            <div class=" inner_menu_bar">
                <a href = "researcher_dash.php">Home</a>
                <a href = "#">About Us</a>
                <a href = "#">Reading</a>
                <a href = "#">Contact US</a>
            </div>
            <div id="User_profile">
                <span><p1>Name</p1></span>
                <span><img src="../assets/images/profile_img.png" alt="Ashesi Logo" height="30"></span>
            </div>
        </div>

    </header>
    <main id="prev_sub_page">
        <table id="prev_sub_table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Proposal Title</th>
                    <th>Date Created</th>
                    <th>Last Edited</th>
                    <th>Status</th>
                    <th>View more</th>
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
            <div class="little-wrap">
                <div class="score_box">
                    <span class="score_title">Total Score: </span><span class="score-percentage">90%</span>
                    <div class="bar">
                        <div class="score-per" per="90%" style="max-width: 90%;"></div>
                    </div>
                </div>
                <br>
    
                <span  id="plag_button"><a href="researcher_plagiarism_view.php">View Plagiarism Score</a></span>
            </div>
            
            
        

            <div id="view_prev">
                <h2 id="view_proposal_title">View Proposal</h2>
                <div id="view_proposal">query</div>
                <h2 id="view_comments_title">View Comments</h2>
                <div id="view_comments">query</div>
                <span id="collapse_button">COLLAPSE</span>
            </div>

        </div>
        

    </main>
    <footer>
        <a href="https://www.ashesi.edu.gh/">
            <span id="foot_logo"><img src="../assets/images/a.png" alt="Ashesi Logo"></span>
        </a>

        <div class="socials">
            <a href="https://www.facebook.com/Ashesi/"><img src="../assets/images/facebook_logo.png"></a>
            <a href="https://www.instagram/Ashesi/"><img src="../assets/images/ig_logo.png"></a>
            <a href="https://www.linkedin.com/school/ashesiuniversity/"><img src="../assets/images/linkedin_logo.png"></a>
            <a href="https://x.com/ashesi"><img src="../assets/images/x_logo.png"></a>
            <a href="https://www.youtube.com/ashesifoundation"><img src="../assets/images/youtube_logo.png"></a>
        </div>

        <div class="foot-message">
            1 University Avenue,
            Berekuso, Ghana.
        </div>

    </footer>
    
</body>

<script>
    document.querySelectorAll('.view_more').forEach(function(element) {
        element.addEventListener('click', function() {
            document.querySelector('.little-wrap').style.display = 'block';
            document.getElementById('view_prev').style.display = 'block';
        });
    });

    document.getElementById('collapse_button').addEventListener('click', function() {
        document.getElementById('view_prev').style.display = 'none';
        document.querySelector('.little-wrap').style.display = 'none';
    });


</script>
</html>