<?php
session_start();
include 'db_connection.php';
// get user name and password from login form
$email = $_POST['email'];   
$password = $_POST['password'];


//if user name or password is empty redirect to login page with error message
if (empty($email)) {
    header("Location: ./login.php?error=Email is required");
    exit();
} else if (empty($password)) {
    header("Location: ../login.php?error=Password is required");
    exit();
}
// check input against database
// if user name and password match redirect to todopage.html
// if user name and password do not match redirect to login page with error message
$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($db, $sql);
if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if ($row['email'] === $email && $row['password'] === $password) {
        $_SESSION['email'] = $row['email'];
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['is_admin'] = $row['is_admin'];
        header("Location: ../stories.php");
        exit();
    } else {
        header("Location: ../login.php?error=Incorect username or password");
        exit();
    }
} else {
    header("Location: ../login.php?error=Incorect username or password");
    exit();
}
?>