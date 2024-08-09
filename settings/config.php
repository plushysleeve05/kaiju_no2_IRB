<?php
define("DBHOST", "localhost");
define("DBNAME", "ashesi_irb");
define("DBUSER", "root");
define("DBPASS", "Irbsystem_2025");

// Create connection
$conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
