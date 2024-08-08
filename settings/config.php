<?php
define("DBHOST", "localhost");
define("DBNAME", "Ashesi IRB");
define("DBUSER", "root");
define("DBPASS", "");

// Create connection
$conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
