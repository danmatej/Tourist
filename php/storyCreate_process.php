<?php
// storyCreate_process.php
session_start();
require_once 'db_connection.php';

// check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

// Prepare the SQL statement
$stmt = $db->prepare("INSERT INTO stories (title, description, location, category, img_url, user_id) VALUES (?, ?, ?, ?, ?, ?)");

// Bind the parameters
$stmt->bind_param("ssssss", $title, $description, $location, $category, $img_url, $user_id);

// Set the parameters
$title = $_POST['title'];
$description = $_POST['description'];
$location = $_POST['location'];
$category = $_POST['category'];
$user_id = $_SESSION['user_id'];

// check if story already exists
$sql = "SELECT * FROM stories WHERE title = '$title'";
$result = mysqli_query($db, $sql);
$numRows = mysqli_num_rows($result);
if ($numRows > 0) {
    $error = "Story with that title already exists";
    header("Location: ../storyCreate.php?error=$error");
    exit();
}

if ($_FILES['img']['error'] == UPLOAD_ERR_OK) {
  // The user uploaded an image
  // issue with relative path to images folder
  $img_url = "images/" . basename($_FILES['img']['name']);
  $img_url_upload = "../images/" . basename($_FILES['img']['name']);
  move_uploaded_file($_FILES['img']['tmp_name'], $img_url_upload);
} else {
  // The user did not upload an image
  $img_url = "images/default.jpg";
}

// Execute the SQL statement
$stmt->execute();

// Close the statement and the connection
$stmt->close();
$db->close();
header("Location: ../stories.php?title=$title");
exit();
?>