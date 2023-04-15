<?php
include_once("header_main.php");
?>
<!-- Masthead-->
<header class="masthead">
    <div class="container px-4 px-lg-5 h-100">
        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end">
                <h1 class="text-white font-weight-bold">Get Inspired</h1>
                <hr class="divider" />
            </div>
            <div class="col-lg-8 align-self-baseline">
                <p class="text-white-75 mb-5">Start sharing your stories by logging in or creating an account!
                    <br /> Or let stories of others inspire you.
                </p>
                <a class="btn btn-secondary btn-xl m-1" href="register.php">Create an account</a>
                <a class="btn btn-secondary btn-xl m-1" href="stories.php">Browse Stories</a>
            </div>
            <a class="scroll-down" href="#stories">
                <p>Scroll down</p>
                <span class="scroll-down-arrow"></span>
            </a>
        </div>
    </div>
</header>
<!-- Call to action-->
<section class="page-section bg-dark text-white">
    <div class="container px-4 px-lg-5 text-center">
        <h2 class="mb-4">Have an account already?</h2>
        <a class="btn btn-light btn-xl" href="login.php">Login</a>
    </div>
</section>
<?php
include_once 'footer.php'; 
?>