<?php
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $first_name = $_SESSION['first_name'];
    $is_admin = $_SESSION['is_admin'];

    if ($is_admin) {
        echo '<li class="nav-item">
              <a class="nav-link" href="admin_panel.php">Admin Panel</a>
              </li>';
        echo '<li class="nav-item">
        <a class="nav-link" href="stories.php?"> Manage Stories</a>
        </li>';
        echo '<li class="nav-item">
        <a class="nav-link" href="php/logout.php">Logout</a>
        </li>';
    } elseif (!$is_admin) {
    echo '<li class="nav-item">
              <a class="nav-link" href="storyCreate.php">Add Story</a>
              </li>';
    echo '<li class="nav-item">
              <a class="nav-link" href="stories.php?">Stories</a>
              </li>';
    echo '<li class="nav-item">
              <a class="nav-link" href="php/logout.php">Logout</a>
              </li>';
    }
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
?>