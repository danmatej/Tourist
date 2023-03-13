<?php
$servername = "localhost";
$dbname='tourist_db';
$username = "root";
$password = "";
// Create connection
$db = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    echo "Connection to DB failed";
}
?>