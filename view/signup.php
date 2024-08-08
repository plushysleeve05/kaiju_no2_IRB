<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IRB Management System - Login</title>
    <link rel="stylesheet" href="../css/signup.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="flex-container">
        <div class="svg-container">
            <svg width="500" height="500" xmlns="http://www.w3.org/2000/svg" style="transform: scaleX(-1);">
                <image href="../assets/images/signin-login.svg" width="100%" height="100%" />
            </svg>
        </div>
        <div class="main-container">
            <div class="login-container">
                <img src="../assets/images/Ashesi_University_Logo_Small_2cm__1_-removebg-preview.png" alt="Ashesi University IRB">
                <h2>Sign-up to the Institutional Review Board</h2>
                <form action="../action/process_signup.php" method="POST">
                    <input type="name" name="first_name" placeholder="Enter your first name" required>
                    <input type="name" name="last_name" placeholder="Enter your last name" required>
                    <input type="email" name="email" placeholder="abc123@airb.com" required>
                    <input type="password" name="password" placeholder="Enter your password" required>
                    <button type="submit">Sign up</button>
                    <div class="links">
                        <a href="login.php">Already have an account? Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>