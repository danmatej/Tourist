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
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
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
                    <!-- <li class="nav-item"><a class="nav-link" href="#about">About</a></li> -->
                    <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="page-section" id="register">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 col-xl-6 text-center">
                    <h2 class="mt-0">Let's Get You An Account!</h2>
                    <hr class="divider" />
                    <p class="text-muted mb-5">Ready to start sharing your life's adventures with others? <br>
                        An account will allow you to post stories and see how many people have seen them!</p>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center mb-4">
                <div class="col-lg-6">
                    <form id="contactForm" action="php/register_process.php" method="post">
                        <?php
                        if (isset($_GET['error'])) { ?>
                            <p class="alert">
                                <?php echo $_GET['error']; ?>
                            </p>
                        <?php } ?>
                        <!-- First Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="fname" name="fname" type="text"
                                placeholder="Enter your first name..." data-sb-validations="required" />
                            <label for="fname">First name</label>
                            <!-- <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div> -->
                        </div>
                        <!-- Last Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="lname" name="lname" type="text"
                                placeholder="Enter your name..." />
                            <label for="lname">Last name</label>
                            <!-- <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div> -->
                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" name="email" type="email"
                                placeholder="name@example.com" />
                            <label for="email">Email address</label>
                            <!-- <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div> -->
                        </div>

                        <!-- Password input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="password" name="password" type="password"
                                placeholder="Password" />
                            <label for="email">Password</label>
                            <!-- <div class="invalid-feedback" data-sb-feedback="password:required">A password is required.
                            </div>
                            <div class="invalid-feedback" data-sb-feedback="password:password">Password is not valid.
                            </div> -->
                        </div>
                        <!-- Confirm Password input--> <!-- validate using js -->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="passconf" type="password" placeholder="Retype Password" />
                            <label for="phone">Retype Password</label>
                        </div>
                        <!-- Check if signup success flag is set in the header -->

                        <?php if (isset($_GET['registersuccess']) && $_GET['registersuccess'] == "true"): ?>
                            <div class="text-center alert alert-success" role="alert">
                                <div class="fw-bolder">Your account has been created successfully!</div>
                            </div>
                        <?php endif; ?>

                        <!-- Submit error message-->
                        <!---->
                        <!-- This is what your users will see when there is-->
                        <!-- an error submitting the form-->
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">Error sending message!</div>
                        </div>
                        <!-- Submit Button / Home Button-->
                        <?php if (isset($_GET['registersuccess']) && $_GET['registersuccess'] == "true"): ?>
                            <div class="d-grid"><a class="btn btn-primary btn-xl" id="submitButton"
                                    href="index.php">Home</a></div>
                        <?php else: ?>
                            <div class="d-grid"><button class="btn btn-primary btn-xl" id="submitButton"
                                    type="submit">Submit</button></div>
                        <?php endif; ?>

                    </form>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-4 text-center mb-lg-0">
                    <p class="text-muted">
                        Already have an account?</p>
                    <a class="btn btn-secondary btn-xl" href="login.php">Login</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="bg-light py-3 fixed-bottom">
        <div class="container px-4 px-lg-5">
            <div class="small text-center text-muted">Copyright &copy; 2023 - Tourist</div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>