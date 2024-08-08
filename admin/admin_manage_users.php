<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users Admin | Ashesi IRB</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <!--Resuable Header-->
    <header>
        <div class="Logo_section">
        <a href = "system_admin_dash.php">
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
                <a href = "#">Home</a>
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
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th></th>
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
                
                <br>
    
            </div>
            
            
        

            <div id="view_prev">
                <h2 id="view_proposal_title">About User</h2>
                <div id="view_proposal">
                    <p>First Name:</p>
                    <p>Last Name:</p>
                    <p>Email:</p>
                    <p> Date Created:</p>
                    <p>Role: <p> 


                </div>
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

    
