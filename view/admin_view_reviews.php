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
        <a href="system_admin_dash.php">
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
                <a href="#">Home</a>
                <a href="#">About Us</a>
                <a href="#">Reading</a>
                <a href="#">Contact Us</a>
            </div>
            <div id="User_profile">
                <span><p1>Name</p1></span>
                <span><img src="../assets/images/profile_img.png" alt="Ashesi Logo" height="30"></span>
            </div>
        </div>
    </header>

    <main id="view_reviews">
        <div class="sort-by">
            <form method="POST" action="admin_view_reviews.php">
                <select name="sort_by" onchange="this.form.submit()">
                    <option value="">Sort by</option>
                    <option value="name">Name (A-Z)</option>
                    <option value="newest">Newest</option>
                    <option value="oldest">Oldest</option>
                </select>
            </form>
        </div>

        <table id="prev_sub_table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Proposal Title</th>
                    <th>Date Created</th>
                    <th>Status</th>
                    <th>View more</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include the connection file
                include 'connection.php';

                // Get the sort-by option from the select dropdown
                $sortBy = isset($_POST['sort_by']) ? $_POST['sort_by'] : '';

                // Define the query based on the sort-by option
                switch ($sortBy) {
                    case "name":
                        $query = "SELECT * FROM Proposals ORDER BY title ASC";
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
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['proposal_id'] . "</td>";
                        echo "<td>" . $row['title'] . "</td>";
                        echo "<td>" . $row['submission_date'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo '<td><span class="view_more">View more</span></td>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No results found.</td></tr>";
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </main>
    
</body>
</html>