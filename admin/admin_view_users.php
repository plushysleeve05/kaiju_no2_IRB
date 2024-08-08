<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users-Admin | Ashesi IRB</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
     <!--Resuable Header-->
     <header>
        <div class="Logo_section">
        <a href = "system_admin_dash">
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
    <main id="view_reviews">
        <div class="sort-by">
            <select>
                <option value="">Sort by</option>
                <option value="name">Name (A-Z)</option>
                <option value="rating">Score (High-Low)</option>
                <option value="newest">Newest</option>
                <option value="oldest">Oldest</option>
            </select>
        </div>
    
    </main>
    
</body>
</html>
