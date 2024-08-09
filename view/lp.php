<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/lp.css" />
  <title>Ashesi Institutional Review Board</title>
</head>

<body>
  <header>
    <img src="../assets/images/Ashesi_University_Logo_Small_2cm__1_-removebg-preview.png" alt="Logo" class="logo-placeholder" />
    <h1 id="logo-text">INSTITUTIONAL<br />REVIEW<br />BOARD</h1>
  </header>
  <div class="navbar-container">
    <nav class="nav">
      <ul>
        <li><a href="lp.php">Home</a></li>
        <li><a href="researcher_plagiarism_view.php">Plagiarism checker</a></li>
        <li><a href="signup.php">Sign Up</a></li>
        <li><a href="researcher_dash.php">Submit a paper</a></li>
        </li>
        <li><a href="view_documents.php">Review Paper as reviewer</a></li> <!-- Added a link for completeness -->
      </ul>
    </nav>
    <div class="profile">
      <p id="username">John Doe</p>
    </div>
  </div>
  <main>
    <!-- HERO SECTION -->
    <section class="hero-sec">
      <div class="left-hero-sec">
        <div class="textbox-1">
          <h2 class="welcome-message">Welcome to the Ashesi <br>IRB Management <br>System</h2>
        </div>
        <!-- Action buttons -->
        <div class="hero-sec-buttons">
          <button onclick="window.location.href='researcher_dash.php';">
            Submit your proposal
          </button>
          <button onclick="window.location.href='view_documents.php';">
            Access Reviews
          </button>
        </div>

      </div>
      </div>
      <div class="svg2-container">
        <img src="../assets/images/hpimg.svg" alt="Decorative SVG" class="svg2-image" />
      </div>
    </section>
    <!-- INFO SECTION -->
    <section class="info-section">
      <div class="info-container">
        <h1 class="info-title">How It Works</h1>
        <div class="info-content">
          <img src="../assets/images/hiw.svg" alt="How It Works Image" class="info-image" />
          <ul class="info-list">
            <li>Submit Proposal: Researchers submit proposals with required documents.</li>
            <li>Automated Allocation: System assigns proposals to IRB members.</li>
            <li>Review Process: IRB members conduct thorough reviews.</li>
            <li>Decision and Feedback: Researchers receive decisions and feedback.</li>
            <li>Track Progress: Real-time tracking and status updates.</li>
          </ul>
        </div>
      </div>
    </section>
    <section class="sch-section"></section>
    <section class="footer-section">
      <div class="footer-overlay"></div>
      <div class="footer-content">
        <img src="../assets/images/Ashesi_University_Logo_6cm-removebg.png" alt="Ashesi University Logo" class="footer-logo" />
        <div class="footer-info">
          <p class="footer-title">ASHESI UNIVERSITY</p>
          <p>1 University Avenue, Berekuso, Ghana.</p>
          <p>Phone: +233 302 610 330</p>
          <p>Email: <a href="mailto:info@ashesi.edu.gh">info@ashesi.edu.gh</a></p>
        </div>
        <div class="footer-links">
          <a href="#">Apply to Ashesi</a>
          <a href="#">Join Our Faculty</a>
          <a href="#">Recruit Students</a>
        </div>
        <div class="footer-social">
          <a href="#" class="social-icon"><img src="../assets/images/facebook-icon.svg" alt="Facebook" /></a>
          <a href="#" class="social-icon"><img src="../assets/images/twitter-icon.svg" alt="Twitter" /></a>
          <a href="#" class="social-icon"><img src="../assets/images/instagram-icon.svg" alt="Instagram" /></a>
          <a href="#" class="social-icon"><img src="../assets/images/linkedin-icon.svg" alt="LinkedIn" /></a>
          <a href="#" class="social-icon"><img src="../assets/images/youtube-icon.svg" alt="YouTube" /></a>
        </div>
      </div>
    </section>
  </main>
</body>

</html>