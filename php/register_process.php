<?php
include 'db_connection.php';
$fName = $_POST['fName'];
$lName = $_POST['lName'];
$email = $_POST['email'];
$password = $_POST['password'];



if (!empty($fName) && !empty($lName) && !empty($email) && !empty($password)) {
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($db, $sql);
    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {
        header("Location: ../register.php?sucess=false&error=emailexists");
        exit();
    } else {
        $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$fName', '$lName', '$email', '$password')";
        $result = mysqli_query($db, $sql);
        if ($result) {
            header("Location: ../register.php?sucess=true");
            exit();
        }
    }
} else {
    //implement error message
    header("Location: ../register.php?sucess=false");
    exit();
}
?>