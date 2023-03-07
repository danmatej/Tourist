<?php
$servername = "localhost";
$dbname='smdb';
$username = "root";
$password = "root";
// Create connection
$db = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($db->connect_error) {
die("Connection failed: " . $db->connect_error);
}
echo "success";
?>