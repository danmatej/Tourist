<?php
include('db_connection.php');
session_start();

if (isset($_GET['story_id'])) {
    //check that user is logged in and is the owner of the story or an admin
    if (isset($_SESSION['user_id'])) {
        $story_id = $_GET['story_id'];
        $sql = "SELECT * FROM stories WHERE story_id=$story_id";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($row['user_id'] == $_SESSION['user_id'] || $_SESSION['is_admin'] == 1) {
            $sql = "DELETE FROM stories WHERE story_id=$story_id";
            $result = mysqli_query($db, $sql);
            if ($result) {
                header('Location: ../stories.php');
            } else {
                $error = "Error deleting story";
                header('Location: ../story_detail.php?story=' . $story_id . '&error=' . $error);
            }
        } else {
            $error = "You do not have permission to delete this story";
            header('Location: ../story_detail.php?story=' . $story_id . '&error=' . $error);
        }
    } else {
        $error = "You must be logged in to delete a story";
        header('Location: ../story_detail.php?story=' . $story_id . '&error=' . $error);
    }
} else {
    $error = "No story id provided";
    header('Location: ../stories.php?error=' . $error);
}