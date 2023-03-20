<?php
include_once("header_light.php");
require_once('php/db_connection.php');
?>
<!-- make the stories div stretch until the footer -->

<div id="portfolio" class="h-100 bg-dark">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <?php
            $sql = "SELECT * FROM stories";
            $result = mysqli_query($db, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='col-lg-4 col-sm-6'>
                <a class='portfolio-box' href='story_detail.php?story=". $row['story_id'] ."'>
                    <img class='img-fluid' src=". $row['img_url'] ." alt='...' />
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