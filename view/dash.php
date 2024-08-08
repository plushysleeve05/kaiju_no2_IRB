<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Researcher Dashboard | Ashesi IRB</title>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>
    <!--Reusable Header-->
    <header>
        <div class="Logo_section">
            <a href="dash.php">
                <img src="../Images/ashesi_logo.png" alt="Ashesi Logo">
                <link rel="stylesheet" href="../css/researcher_dash.css">
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
                <a href="#">Contact US</a>
            </div>
            <div id="User_profile">
                <span><p>Name</p></span>
                <span><img src="../images/profile_img.png" alt="Profile Image" height="30"></span>
            </div>
        </div>
    </header>
    <main>
        <!--Notification panel-->
        <div id="notification_panel">
            <h2>Notification Panel</h2>
            <p id="notification_content">Loading notifications...</p>
        </div>

        <div id="page_button_area">
            <span id="prev_sub_button"> 
                <a href="researcher_prev_sub.php">View Previous Submissions</a> 
            </span>
            <span id="sub_proposal_button">
                <a href="#">Submit A Proposal</a> 
            </span>
        </div>
        <div id="sub_a_prosal_form" style="display: none;">
            <h3>Upload your Proposal</h3>
            
            <form id="title_form" enctype="multipart/form-data">
                <label for="Proposal_Title">Proposal Title</label><br>
                <input type="text" id="Proposal_Title" name="Proposal_Title" placeholder="Enter the title of your proposal" required><br>
                <input type="file" id="proposal_file" name="proposal_file" required><br>
                <input id="submit_form" type="submit" value="Submit">
            </form>
            <p id="close_sub_form">Close</p>
        </div>
    </main>
    <footer>
    </footer>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <script>
        // Display the submission form when clicking the submit proposal button
        document.getElementById('sub_proposal_button').addEventListener('click', function() {
            document.getElementById('sub_a_prosal_form').style.display = 'block';
        });

        // Hide the submission form when clicking close
        document.getElementById('close_sub_form').addEventListener('click', function() {
            document.getElementById('sub_a_prosal_form').style.display = 'none';
        });

        // Handle form submission using AJAX
        document.getElementById('title_form').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            const formData = new FormData(this);

            fetch('../action/process_proposal.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                if (data === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Proposal Submitted',
                        text: 'Your proposal has been submitted successfully!',
                        confirmButtonText: 'OK'
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Submission Error',
                        text: data,
                        confirmButtonText: 'OK'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Submission Error',
                    text: 'There was an error submitting your proposal. Please try again.',
                    confirmButtonText: 'OK'
                });
            });
        });

        // Fetch notifications for the user
        fetch('../action/fetch_notifications.php')
        .then(response => response.json())
        .then(data => {
            const notificationContent = document.getElementById('notification_content');
            if (data.length > 0) {
                notificationContent.innerHTML = data.map(notification => `<p>${notification.message}</p>`).join('');
            } else {
                notificationContent.textContent = 'No notifications.';
            }
        })
        .catch(error => {
            console.error('Error fetching notifications:', error);
            document.getElementById('notification_content').textContent = 'Failed to load notifications.';
        });
    </script>
</body>
</html>
