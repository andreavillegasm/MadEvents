<?php
session_start();
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
    <div class="header-navigation">
        <div class="header-nav-content">
            <div class="d-flex justify-content-between align-items-center">
                <div class="nav-link">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a class="nav-link text-light" href="index.php">Home</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="nav-link text-light" href="new_event.php">Create Event</a>
                        </li>
                        <li class="list-inline-item">
                            <div class="dropdown">
                                <button style="color: white;" class="btn dropdown-toggle" type="button" id="dropdownMenuNav"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Gallery
                                    <span class="caret"></span>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="admin_gallery.php">My Profile</a>
                                    <a class="dropdown-item" href="public_gallery.php">All Images</a>
                                </div>
                            </div>
                        </li>
                        <li class="list-inline-item">
                            <div class="dropdown">
                                <button style="color: white;" class="btn dropdown-toggle" type="button" id="dropdownMenuNav"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Events
                                    <span class="caret"></span>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="event_dashboard.php">My Events</a>
                                    <a class="dropdown-item" href="#">Popular Events</a>
                                </div>
                            </div>
                        </li>
                        <li class="list-inline-item">
                            <div class="dropdown">
                                <button style="color: white;" class="btn dropdown-toggle" type="button" id="dropdownMenuNav"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Feedback
                                    <span class="caret"></span>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="feedback.php">Feedback</a>
                                    <a class="dropdown-item" href="feedback_admin.php">Feedback-admin</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="logo">MAD<span>EVENTS</span></div>

                <div class="login-btn">

                    <?php
                    if (isset($_SESSION['userId'])) {
                        echo '<form action="includes/logout.inc.php" method="post">
                                <button type="submit" name="logout">Sign Out</button>
                            </form>';
                    } else {
                        echo '<a href="login.php" class="btn btn-outline-light">Sign In</a>
                                <a href="signup.php" class="btn btn-outline-light">Sign Up</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
</header>


