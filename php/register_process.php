<?php
include 'db_connection.php';
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];



if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($db, $sql);
    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {
        $showError = "Account with that email already exists";
    } else {
        $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$fname', '$lname', '$email', '$password')";
        $result = mysqli_query($db, $sql);
        if ($result) {
            $showAlert = true;
            header("Location: ../register.php?registersuccess=true");
            exit();
        }
    }
} else {
    //implement error message
    header("Location: ../register.php?registersuccess=false");
    exit();
}
?>