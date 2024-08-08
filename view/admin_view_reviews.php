<?
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
    // Get the sort-by option from the select dropdown
$sortBy = $_POST['sort_by'];

// Define the query based on the sort-by option
switch ($sortBy) {
    case "name":
        $query = "SELECT * FROM Proposals ORDER BY title ASC";
        break;
    case "rating":
        $query = "SELECT * FROM Proposals ORDER BY rating DESC";
        break;
    case "newest":
        $query = "SELECT * FROM Proposals ORDER BY submission_date DESC";
        break;
    case "oldest":
        $query = "SELECT * FROM Proposals ORDER BY submission_date ASC";
        break;
    default:
        $query = "SELECT * FROM Proposals";
        break;
}

// Execute the query
$result = mysqli_query($conn, $query);

// Display the results
if (mysqli_num_rows($result) > 0) {
    echo "<table id='prev_sub_table'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Proposal Title</th>";
    echo "<th>Date Created</th>";
    echo "<th>Last Edited</th>";
    echo "<th>Status</th>";
    echo "<th>View more</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['proposal_id'] . "</td>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['submission_date'] . "</td>";
        echo "<td>" . $row['last_edited'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "<td><span class='view_more'>View more</span></td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "No results found.";
}

    </main>
    
</body>
</html>