<?php
include_once("header_light.php");
include_once("php/db_connection.php");
session_start();
?>
    <section class="page-section">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 col-xl-6 text-center">
                    <h2 class="mt-0">Share your story!</h2>
                    <hr class="divider" />
                    <p class="text-muted mb-5">You're one click away from sharing your story with the millions of people
                        who will visit this site!</p>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center mb-4">
                <div class="col-lg-6">
                    <form id="storyCreateForm" action="php/storyCreate_process.php" method="post"
                        enctype="multipart/form-data">
                        <!-- Title input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="title" name="title" type="text" placeholder="Title" required/>
                            <label for="title">Title</label>
                        </div>

                        <!-- Description input-->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="description" name="description" type="text"
                                placeholder="Description" required></textarea>
                            <label for="description">Description</label>
                        </div>
                        <!-- Location input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="location" name="location" type="text"
                                placeholder="Location" required/>
                            <label for="location">Location</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="category" name="category" required>
                                <option>Adventure</option>
                                <option>Culture</option>
                                <option>Food</option>
                                <option>Nature</option>
                                <option>City</option>
                                <option>Other</option>
                            </select>
                            <label for="category">Category</label>
                        </div>
                        <!-- img upload-->
                        <div class="mb-3">
                            <label for="img">Select image to upload:</label>
                            <input class="form-control" id="img" name="img" type="file" placeholder="Image" />
                        </div>

                        <?php
                            if(isset($_GET['error'])){
                                echo '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                '.$_GET['error'].'
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                            }
                            if(isset($_GET['success'])){
                                echo '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                                '.$_GET['success'].'
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