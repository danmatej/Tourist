<?php
include_once("header_light.php");
?>
<section class="page-section h-90">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 col-xl-6 text-center">
                <h2 class="mt-0">Let's Get Logged In!</h2>
                <hr class="divider" />
                <p class="text-muted mb-5">Once logged in, you can share a new story with others. <br>
                    And keep track of how many people have have seen your stories so far!</p>
            </div>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center mb-4">
            <div class="col-lg-6">
                <form id="loginForm" action="php/login_process.php" method="post">
                    <!-- Email address input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" name="email" type="email"
                            placeholder="name@example.com" />
                        <label for="email">Email address</label>
                    </div>

                    <!-- Password input-->
                    <div class="form-floating mb-3">
                        <input class="form-control" id="password" name="password" type="password"
                            placeholder="Password" />
                        <label for="password">Password</label>
                    </div>

                    <!-- Check if success flag is set in the header -->
                    <?php if (isset($_GET['error'])): ?>
                        <div class="text-center alert alert-danger" role="alert">
                            <div class="fw-bolder">
                                <?php echo $_GET['error'] ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- Submit Button-->
                    <div class="d-grid"><button class="btn btn-primary btn-xl" id="submitButton"
                            type="submit">Submit</button></div>
                </form>
            </div>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-4 text-center mb-lg-0">
                <p class="text-muted">
                    Don't have an account?</p>
                <a class="btn btn-secondary btn-xl" href="#about">Create an account</a>
            </div>
        </div>
    </div>
</section>

<?php
include_once("footer.php");
?>