<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IRB Management System - Login</title>
    <link rel="stylesheet" href="css/login.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="flex-container">
        <div class="svg-container">
            <svg width="500" height="500" xmlns="http://www.w3.org/2000/svg" style="transform: scaleX(-1);">
                <image href="assets/images/signin-login.svg" width="100%" height="100%" />
            </svg>
        </div>
        <div class="main-container">
            <div class="login-container">
                <img src="assets/images/Ashesi_University_Logo_Small_2cm__1_-removebg-preview.png" alt="Ashesi University IRB">
                <h2>Institutional Review Board</h2>
                <?php
                if (isset($_GET['error'])) {
                    echo '<div class="alert alert-danger">' . htmlspecialchars($_GET['error']) . '</div>';
                }
                ?>
                <form action="action/process_login.php" method="POST">
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <div class="links">
                        <label><input type="checkbox" name="remember"> Remember me</label>
                        <a href="#">Forgot Password?</a>
                    </div>
                    <button type="submit">Login</button>
                    <div class="links">
                        <a href="view/signup.php">New User? Sign up</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>