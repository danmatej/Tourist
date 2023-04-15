<?php
// storyCreate_process.php
session_start();
require_once 'db_connection.php';

// check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

// story form data
$title = $_POST['title'];
$description = $_POST['description'];
$location = $_POST['location'];
$category = $_POST['category'];
$user_id = $_SESSION['user_id'];

// file should have same id as story - use last inserted id + 1
// $img_sql = "SELECT MAX(story_id) FROM stories";
// $result = mysqli_query($db, $img_sql);
// $row = mysqli_fetch_assoc($result);
// $img_id = $row['MAX(story_id)'] + 1;

// file upload
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["img"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
echo "Error:1";
// check if user clicked submit

if (isset($_POST['submit'])) {
    // check if story already exists
    $sql = "SELECT * FROM stories WHERE title = '$title'";
    $result = mysqli_query($db, $sql);
    $numRows = mysqli_num_rows($result);
    echo "Error: ";
    if ($numRows > 0) {
        $error = "Story with that title already exists";
        header("Location: ../storyCreate.php?error=$error");
        exit();
    } else {
        // check if user uploaded a file
        // if user uploaded a file then check if it is an image
        // if user uploaded a file then check if it is the correct file type
        // if user uploaded a file then check if it is the correct file size
        // if all checks pass then upload the file and set $img_url to the file path
        // if the user did not upload a file then set the $img_url to the default image
        // if the user did not upload a file then set $uploadOK to 1

        // check if user uploaded a file
        if (isset($_FILES['img'])) {
            // check if file is an image
            $check = getimagesize($_FILES["img"]["tmp_name"]);
            if ($check == false) {
                $error = "File is not an image.";
                header("Location: ../storyCreate.php?error=$error");
                exit();
            } else {
                // check if file is the correct file type
                if (
                    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif"
                ) {
                    $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    header("Location: ../storyCreate.php?error=$error");
                    exit();
                } else {
                    // check if file is the correct file size
                    if ($_FILES["img"]["size"] > 5000000) {
                        $error = "Sorry, your file is too large.";
                        header("Location: ../storyCreate.php?error=$error");
                        exit();
                    } else {
                        // upload file and set $img_url to the file path
                        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                        } else {
                            $error = "Sorry, there was an error uploading your file.";
                            header("Location: ../storyCreate.php?error=$error");
                            exit();
                        }
                    }
                }
            }
        } else {
            // set $img_url to the default image
            $img_url = "images/default.jpg";
        }
        // set $img_url to the default image
        $img_url = "images/default.jpg";
        // insert story into database
        $sql = "INSERT INTO stories (title, description, location, category, img_url, user_id) VALUES ('$title', '$description', '$location', '$category', '$img_url', '$user_id')";
        $result = mysqli_query($db, $sql);
        if ($result) {
            $success = "Story created successfully";
            // get highest story add one to it and redirect to story.php with story_id as a get variable
            // $story_sql = "SELECT MAX(story_id) FROM stories";
            // $story_result = mysqli_query($db, $story_sql);
            // $story_row = mysqli_fetch_assoc($story_result);
            // $story_id = $story_row['MAX(story_id)'];
            // $story_id = $story_id + 1;
            header("Location: ../stories.php?success=$success");
            exit();
        } else {
            $error = "Something went wrong";
            header("Location: ../storyCreate.php?error=$error");
            exit();
        }
    }
}

exit();
?>