<?php
include_once("header_light.php");
include_once("php/db_connection.php");
?>

<?php
// get the number of stories from the database
$sql_stories = "SELECT * FROM stories";
$result_stories = mysqli_query($db, $sql_stories);
$stories_count = mysqli_num_rows($result_stories);
// get the number of users from the database
$sql_users = "SELECT * FROM users";
$result_users = mysqli_query($db, $sql_users);
$users_count = mysqli_num_rows($result_users);
?>

<!-- display the number of stories -->
<!-- display next to each other on the center of the page -->
<section class="page-section h-100">
    <div class="row">
        <div class="container px-4 px-lg-5 text-center">
            <h2 class="mb-4">Admin Panel</h2>
            <div class='col-6 mx-auto'>
                <div class='card bg-secondary text-white mb-4'>
                    <div class='card-body'>
                        <h3 class='card-title'>Stories</h3>
                        <p class='card-text'>
                            <?php echo $stories_count ?>
                        </p>
                    </div>
                </div>
            </div>
            <!-- display the number of users -->
            <div class='col-6 mx-auto'>
                <div class='card bg-secondary text-white mb-4'>
                    <div class='card-body'>
                        <h3 class='card-title'>Users</h3>
                        <p class='card-text'>
                            <?php echo $users_count ?>
                        </p>
                    </div>
                </div>
            </div>
            <div>
                <a href="stories.php" class="btn btn-primary">Manage User Stories</a>
            </div>
        </div>
</section>

<?php
include_once("footer.php");
?>