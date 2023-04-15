<?php
include_once("header_light.php");
require_once('php/db_connection.php');
?>

<div>
    <!-- a subnav that will allow the user to filter category, search titles and sort by created_on -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top py-1 mt-5">
        <div class="container px-4 px-lg-5">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <a class="nav-link" href="stories.php">All</a>
                    <a class="nav-link" href="stories.php?category=Adventure">Adventure</a>
                    <a class="nav-link" href="stories.php?category=Culture">Culture</a>
                    <a class="nav-link" href="stories.php?category=Food">Food</a>
                    <a class="nav-link" href="stories.php?category=Nature">Nature</a>
                    <a class="nav-link" href="stories.php?category=City">City</a>
                    <a class="nav-link" href="stories.php?category=Other">Other</a>
                    <!-- <a class="nav-link active" href="stories.php?user_id='<?php //echo $_SESSION['user_id'] ?>'">My Stories</a> -->
                </div>
            </div>
            <div class="d-flex">
                <form class="collapse navbar-collapse" action="stories.php" method="get">
                    <input class="form-control me-2" id="search" type="search" placeholder="Search by title or location" name="search">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
</div>
<div id="portfolio" class="h-100 bg-dark pt-5 mt-5">
    <div class="container-fluid p-0">
        <div class="row g-0" id="stories-container">
            <?php
            $sql = "SELECT * FROM stories";
            if (isset($_GET['category'])) {
                $category = $_GET['category'];
                $sql = "SELECT * FROM stories WHERE category = '$category'";
            }
            // if (isset($_GET['user_id'])) {
            //     $user_id = $_GET['user_id'];
            //     $sql = "SELECT * FROM stories WHERE user_id = '$user_id'";
            // }
            if (isset($_GET['search'])) {
                $search = $_GET['search'];
                $sql = "SELECT * FROM stories WHERE title LIKE '%$search%' OR location LIKE '%$search%'";
            }
            $result = mysqli_query($db, $sql);
            if (mysqli_num_rows($result) == 0) {
                // no stories found
                echo "<div class='col-12 mt-5'>
                <h2 class='text-center text-white'>No stories found. Add your story!</h2>
            </div>";
            }

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='col-lg-4 col-sm-6'>
                <a class='portfolio-box' href='story_detail.php?story=" . $row['story_id'] . "'>
                    <img class='img-fluid' src=" . $row['img_url'] . " alt='...' />
                    <div class='portfolio-box-caption'>
                        <div class='story-category text-white-50'>" . $row['category'] . "</div>
                        <div class='story-title'>" . $row['title'] . "</div>
                    </div>
                </a>
            </div>";
            }
            ?>
        </div>
    </div>
</div>

<?php
include_once("footer.php");
?>