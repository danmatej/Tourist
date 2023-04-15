<?php
include_once("header_light.php");
?>
    <section class="page-section">
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
                    <form id="registerForm" action="php/register_process.php" method="post">
                        <!-- First Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="fName" name="fName" type="text" placeholder="First Name"
                                required />
                            <label for="fName">First name</label>
                        </div>
                        <!-- Last Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="lName" name="lName" type="text" placeholder="Last Name"
                                required />
                            <label for="lName">Last name</label>
                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" name="email" type="email" placeholder="Email"
                                required />
                            <label for="email">Email address</label>
                        </div>

                        <!-- Password input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="password" name="password" type="password"
                                placeholder="Password" required />
                            <label for="assword">Password</label>
                        </div>
                        <!-- Confirm Password input--> <!-- validate using js -->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="confirmPassword" type="password"
                                placeholder="Retype Password" />
                            <label for="confirmPassword">Retype Password</label>
                        </div>

                        <!-- JS Password Validation -->
                        <div id="errorMessage"></div>

                        <!-- Check if success flag is set in the header -->
                        <?php if (isset($_GET['sucess']) && $_GET['sucess'] == "true"): ?>
                            <div class="text-center alert alert-success" role="alert">
                                <div class="fw-bolder">Your account has been created successfully!</div>
                            </div>
                        <?php elseif ((isset($_GET['sucess']) && $_GET['sucess'] == "false" && isset($_GET['error']) && $_GET['error'] == "emailexists")): ?>
                            <div class="text-center alert alert-danger" role="alert">
                                <div class="fw-bolder">Email already registered!</div>
                            </div>
                        <?php elseif ((isset($_GET['sucess']) && $_GET['sucess'] == "false")): ?>
                            <div class="text-center alert alert-danger" role="alert">
                                <div class="fw-bolder">There was an error creating your account!</div>
                            </div>
                        <?php endif; ?>

                        <!-- Submit Button / Home Button-->
                        <?php if (isset($_GET['sucess']) && $_GET['sucess'] == "true"): ?>
                            <div class="d-grid"><a class="btn btn-primary btn-xl" id="submitButton"
                                    href="index.php">Home</a></div>
                        <?php else: ?>
                            <div class="d-grid"><button class="btn btn-primary btn-xl" id="submitButton"
                                    type="submit" disabled>Submit</button></div>
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
    <script src="js/custom-scripts.js"></script>
<!-- <script>
    // JS Password Validation
    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("confirmPassword");
    const errorMessage = document.getElementById("errorMessage");
    const submitButton = document.getElementById("submitButton");

    function validatePassword() {
        if (password.value != confirmPassword.value) {
            errorMessage.innerHTML = "Passwords do not match!";
            submitButton.disabled = true;
        } else {
            errorMessage.innerHTML = "";
            submitButton.disabled = false;
        }
    }

    password.addEventListener("change", validatePassword);
    confirmPassword.addEventListener("keyup", validatePassword);
</script> -->
<?php 
    include_once("footer.php");
?>