<?php 
    // diplay a story detail page based on the story id passed in the url
    // include the header
    include_once("header_light.php");
    // get the story id from the url
    $story_id = $_GET['story'];
    // connect to the database
    include_once("php/db_connection.php");
    // get the story from the database
    $sql_stories = "SELECT * FROM stories WHERE story_id = $story_id";
    $result_stories = mysqli_query($db, $sql_stories);
    $row_stories = mysqli_fetch_assoc($result_stories);
    // get the user from the database
    $sql_user = "SELECT * FROM users WHERE user_id = " . $row_stories['user_id'];
    $result_user = mysqli_query($db, $sql_user);
    $row_user = mysqli_fetch_assoc($result_user);

    // display the story
    echo "<div class='container mt-5'>
            <div class='row mt-5'>
                <div class='col-md-12'>
                    <h1 class='mt-4'>" . $row_stories['title'] . "</h1>
                    <p class='lead'>
                        by
                        <a href='stories.php?user=". $row_stories['user_id'] ."'>" . $row_user['first_name']. " " .  $row_user['last_name'] . "</a>
                    </p>
                    <hr>
                    <img class='img-fluid rounded' src='" . $row_stories['img_url'] . "' alt=''>
                    <hr>
                    <p class='lead'>" . $row_stories['description'] . "</p>
                    <hr>
                </div>
            </div>
        </div>";
    // include the footer
    include_once("footer.php");
?>