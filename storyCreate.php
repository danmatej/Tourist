<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tourist - Share Your Story</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
        rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/custom-styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top py-2">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.php">Tourist</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="stories.php">Stories</a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
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
                            <input class="form-control" id="title" name="title" type="text" placeholder="Title" />
                            <label for="title">Title</label>
                        </div>

                        <!-- Description input-->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="description" name="description" type="text"
                                placeholder="Description"></textarea>
                            <label for="description">Description</label>
                        </div>
                        <!-- Location input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="location" name="location" type="text"
                                placeholder="Location" />
                            <label for="location">Location</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="category" name="category">
                                <option value="1">Adventure</option>
                                <option value="2">Culture</option>
                                <option value="3">Food</option>
                                <option value="4">Nature</option>
                                <option value="5">City</option>
                                <option value="6">Other</option>
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