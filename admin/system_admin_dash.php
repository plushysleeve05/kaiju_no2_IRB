<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Admin | Ashesi IRB</title>
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
    <main>
        <!--The Notification panel-->
        <div id="notification_panel">
            <h2>Notification  Panel</h2>
            <p>No notifications</p>
        </div>


        <div id="page_button_area">
                <span id="view_users_button"> 
                    <a href = "admin_manage_users.php">View Users</a>  
                </span>

                <span id="view_reviews_button">
                    <a href = "admin_view_reviews.php">View Reviews</a> 
                </span>

                <span id="configure_button">
                    <a href = "#">Configure System</a> 
                </span>
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
</html>