<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == 'admin' && $password == 'YouShallPass') {
        $_SESSION['username'] = $username;

        header('Location: protected.php');
        exit;
    } else {
        // Display an error message if the credentials are invalid
        $error = 'Invalid username or password.';
    }
}
?>

<!-- Display the login form and any error messages -->
<form method="post" action="login.php">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username"><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password"><br>

    <input type="submit" value="Login">
</form>

<?php if (isset($error)): ?>
    <p><?php echo $error; ?></p>
<?php endif; ?>
