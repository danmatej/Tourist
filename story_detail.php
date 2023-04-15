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
echo
"<div class='container mt-5 pt-5'>";
if (isset($_GET['error'])){
    echo '<div class="text-center alert alert-danger" role="alert">
        <div class="fw-bolder">
            <?php echo $_GET["error"]
        </div>
    </div>';}
echo "
    <div class='row'>
        <div class='col-md-12'>
        
            <a href='stories.php' class='btn btn-primary mx-1'>Back to Stories</a>";
            if (isset($_SESSION['user_id']) && ($_SESSION['user_id'] == $row_stories['user_id'] || $_SESSION['is_admin'] == 1)) {
                echo
                "<a href='php/delete_story.php?story_id=" . $row_stories['story_id'] . "' class='btn btn-danger mx-1'>Delete Story</a>";
            }
            if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $row_stories['user_id']) {
                echo
                "<a href='storyEdit.php?story_id=" . $row_stories['story_id'] . "' class='btn btn-warning mx-1'>Edit Story</a>";
            }
            echo "
        </div>
            <div class='row mt-3 mb-5'>
                <div class='col-md-6'>
                    <p class='lead'>Location: <strong>" . $row_stories['location'] . "</strong></p>
                    <h1 class='mt-4'>" . $row_stories['title'] . "</h1>
                    <p class='lead'>
                        by
                        <a href='stories.php?user_id=" . $row_stories['user_id'] . "'>" . $row_user['first_name'] . " " . $row_user['last_name'] . "</a>
                    </p>
                </div>
                <div class='col-md-6'>
                    <img class='img-fluid rounded mx-auto d-block' src='" . $row_stories['img_url'] . "' alt=''>
                </div>
            </div>
            <div class='row mt-3'>
                <hr>
                <div class='col-md-12'>
                    <p class='lead'>" . $row_stories['description'] . "</p>
                <hr>
            </div>
        </div>
    </div>
</div>";
// include the footer
include_once("footer.php");
