<?php
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM users WHERE user_id = $user_id";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['user_id'];
    echo '<li class="nav-item">
              <a class="nav-link" href="account_detail.php?user_id=' . $user_id . '">Profile</a>
              </li>';

    echo '<li class="nav-item">
              <a class="nav-link" href="storyCreate.php">Add Story</a>
              </li>';

    echo '<li class="nav-item">
              <a class="nav-link" href="stories.php?user_id=' . $user_id . '">My Stories</a>
              </li>';

    echo '<li class="nav-item">
              <a class="nav-link" href="php/logout.php">Logout</a>
              </li>';
} else {
    echo '<li class="nav-item">
            <a class="nav-link" href="stories.php">Stories</a>
            </li>';

    echo '<li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>
              </li>';

    echo '<li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
              </li>';
}
// maybe change the code above to separate the bussiness logic from the view

?>