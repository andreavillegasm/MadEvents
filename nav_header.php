<?php
if (!isset($_SESSION)) {
    session_start();
    session_regenerate_id();
}
?>

<link src="css/bootstrap.min.css"/>

<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/css?family=Marck+Script&display=swap" rel="stylesheet">

<script src="https://kit.fontawesome.com/c7c508e324.js" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark shadow">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="img/logo-white.png" style="
                height: 3em;"alt="" srcset="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-white" href="index.php">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="new_event.php">Create Event</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Gallery
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="admin_gallery.php">My profile</a>
                    <a class="dropdown-item" href="public_gallery.php">All Images</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Events
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="event_dashboard.php">My Events</a>
                    <a class="dropdown-item" href="#">Popular Events</a>
                    <a class="dropdown-item" href="reservation.php">Join an event</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Feedbacks
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="feedback.php">Feedback</a>
                    <a class="dropdown-item" href="feedback_admin.php">Feedback Admin</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="#">Contact Us</a>
            </li>

                <?php
if (isset($_SESSION['userId'])) {
    echo '<li class="nav-item login-btn">
                            <form action="includes/logout.inc.php" method="post">
                                <button type="submit" name="logout">Sign Out</button>
                            </form>
                        </li>';
} else {
    echo '
                    <li class="nav-item login-btn">
                        <a href="login.php" class="btn btn-outline-light">Sign In</a>
                    </li>
                    <li class="nav-item login-btn">
                        <a href="signup.php" class="btn btn-outline-light">Sign Up</a>
                    </li>';
}
?>
        </ul>
        </div>
    </div>
    </nav>
</header>


