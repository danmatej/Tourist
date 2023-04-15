<?php
if (isset($_POST['story_id'])) {
    //check that user is logged in and is the owner of the story or an admin
    if (isset($_SESSION['user_id'])) {
        $story_id = $_POST['story_id'];
        $sql = "SELECT * FROM stories WHERE story_id=$story_id";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($row['user_id'] == $_SESSION['user_id'] || $_SESSION['is_admin'] == 1) {
            
            // check the database for the story
            $sql = "SELECT * FROM stories WHERE story_id=$story_id";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result);
            $story_id = $row['story_id'];
            $title = $row['title'];
            $location = $row['location'];
            $description = $row['description'];
            $category = $row['category'];

            if ($result) {
                header('Location: ../stories.php');
            } else {
                $error = "Error deleting story";
                header('Location: ../story_detail.php?story=' . $story_id . '&error=' . $error);
            }
        } else {
            $error = "You do not have permission to edit this story";
            header('Location: ../story_detail.php?story=' . $story_id . '&error=' . $error);
        }
    } else {
        $error = "You must be logged in to edit a story";
        header('Location: ../story_detail.php?story=' . $story_id . '&error=' . $error);
    }
}