<<<<<<< HEAD
=======
<?php
session_start();
?>

<link src="css/bootstrap.min.css"/>

>>>>>>> 721e905b4c86d0d034d400f5c5e0ef449e4a67f6
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
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="#">MadEvents</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="event_dashboard.php">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="new_event.php">Create Events</a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuNav"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Others
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuNav">
                            <li>
                                <a href="feedback.php">Feedback</a>
                            </li>
                            <li>
                                <a href="feedback_admin.php">Feedback-admin</a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <div class="login-btn">
                        <a href="signup.php" class="btn btn-outline-light">Sign In</a>
                        <a href="login.php" class="btn btn-outline-light">Sign Up</a>
                    </div>
                </li>
            </ul>

<<<<<<< HEAD
=======
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
>>>>>>> 721e905b4c86d0d034d400f5c5e0ef449e4a67f6
        </div>
    </nav>
</header>


