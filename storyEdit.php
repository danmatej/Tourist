<?php
include_once("php/db_connection.php");
include_once("header_light.php");

if (isset($_GET['story_id'])) {
    $story_id = $_GET['story_id'];
} else {
    $error = "No story id provided";
    header('Location: ../stories.php?error=' . $error);
}
$sql = "SELECT * FROM stories WHERE story_id=$story_id";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);
$story_id = $row['story_id'];
$title = $row['title'];
$location = $row['location'];
$description = $row['description'];
$category = $row['category'];
?>

<section class="page-section">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 col-xl-6 text-center">
                <h2 class="mt-0">Edit your story!</h2>
                <hr class="divider" />
                <p class="text-muted mb-5">Want to make your story even better? <br> Just hit the submit button when
                    you're ready!</p>
            </div>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center mb-4">
            <div class="col-lg-6">
                <form id="storyEditForm" action="php/storyEdit_process.php" method="post">
                    <input type="hidden" name="story_id" value="<?php echo $story_id ?>">
                    <!-- Title input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="title" name="title" type="text" placeholder="Title" required
                            value="<?php echo $title ?>" />
                        <label for="title">Title</label>
                    </div>

                    <!-- Description input-->
                    <div class="form-floating mb-3">
                            <textarea class="form-control" id="description" name="description" type="text"
                                placeholder="Description" required><?php echo $description ?><</textarea>
                            <label for="description">Description</label>
                    </div>
                    <!-- Location input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="location" name="location" type="text" placeholder="Location"
                            required value="<?php echo $location ?>" />
                        <label for="location">Location</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="category" name="category" required
                            value="<?php echo $category ?>">
                            <option>Adventure</option>
                            <option>Culture</option>
                            <option>Food</option>
                            <option>Nature</option>
                            <option>City</option>
                            <option>Other</option>
                        </select>
                        <label for="category">Category</label>
                    </div>

                    <?php
                    if (isset($_GET['error'])) {
                        echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                ' . $_GET['error'] . '
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                    }
                    if (isset($_GET['success'])) {
                        echo '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                                ' . $_GET['success'] . '
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                    }
                    ?>

                    <!-- Submit Button-->
                    <div class="d-grid"><button class="btn btn-primary btn-xl" id="submitButton"
                            type="submit">Submit</button></div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
include_once 'footer.php';
?>