<?php
include('db_connection.php');
session_start();

if(isset($_POST['story_id'])){
    $story_id = $_POST['story_id'];
    $title = $_POST['title'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $sql = "UPDATE stories SET title='$title', location='$location', description='$description', category='$category' WHERE story_id=$story_id";
    $result = mysqli_query($db, $sql);
    if($result){
        header('Location: ../story_detail.php?story=' . $story_id);
    } else {
        $error = "Error updating story";
        header('Location: ../story_detail.php?story=' . $story_id . '&error=' . $error);
    }
} else {
    $error = "No story id provided";
    header('Location: ../stories.php?error=' . $error);
}
?>