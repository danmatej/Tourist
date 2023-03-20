<?php
// storyCreate_process.php
session_start();
require_once 'db_connection.php';

// form data
$title = $_POST['title'];
$description = $_POST['description'];
$location = $_POST['location'];
$category = $_POST['category'];
$user_id = $_SESSION['user_id'];

// file should have same id as story - use last inserted id + 1
// if file is uploaded then insert into database
// if file is not uploaded then insert default image into database

$img_sql = "SELECT story_id FROM stories ORDER BY story_id DESC LIMIT 0, 1";
$img_sql = mysqli_query($db, $img_sql);
$img_sql = mysqli_fetch_assoc($img_sql);
$img_id = $img_sql['story_id'] + 1;




//file upload
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["img"][$img_id]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (!empty($title) && !empty($description) && !empty($location) && !empty($category)) {
    $sql = "SELECT * FROM stories WHERE title = '$title'";
    $result = mysqli_query($db, $sql);
    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {
        header("Location: ../storyCreate.php?error=Story with that title already exists");
        exit();
    } else {
        
        // Check if image file is an actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["img"]["tmp_name"]);

            if ($check === false) {
                header("Location: ../storyCreate.php?error=File is not an image.");
            } elseif (file_exists($target_file)) {
            header("Location: ../storyCreate.php?error=Sorry, file already exists.");
            } elseif ($_FILES["img"]["size"] > 5000000) {
            header("Location: ../storyCreate.php?error=Sorry, your file is too large.");
            } elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
            ) {
            header("Location: ../storyCreate.php?error=Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
            } else {
                move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
            }
        }
    }
    // if user did not upload a file then set the image to the default image
    if (isset($_FILES['img'])) {
        $img_url = $target_file;
    } else {
        $img_url = "images/default.jpg";
    }
    $sql = "INSERT INTO stories (title, description, location, category, img_url, user_id) VALUES ('$title', '$description', '$location', '$category', '$img_url', '$user_id')";
    $result = mysqli_query($db, $sql);
    if ($result) {
        header("Location: ../storyCreate.php?success=Story created successfully");
        exit();
    } else {
        header("Location: ../storyCreate.php?error=Something went wrong");
        exit();
    }
} else {
    header("Location: ../storyCreate.php?error=Please fill in all fields");
    exit();
}

// the code upload the default image to the database but not the image that i upload


//make all the errors the same => error=Story with that title already exists etc

?>
