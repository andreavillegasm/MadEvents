
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Sign Up</title>
</head>

<body>

<?php include "nav_header.php" ?>

<main>
    <div class="container">
        <div class="login-container">
            <div class="card-body">
                <h5 class="card-title text-center text-white">Sign Up</h5>

                <!-- error and success messages for signing up! -->
                <?php

                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == "emptform") {
                            echo '<div class="alert alert-danger" role="alert">
                                    Fields cannot be empty!
                                </div>';
                        } else if ($_GET['error'] == "firstnameinvalid") {
                            echo '<div class="alert alert-danger" role="alert">
                                    Invalid first name
                                </div>';
                        } else if ($_GET['error'] == "lastnameinvalid") {
                            echo '<div class="alert alert-danger" role="alert">
                                    Invalid last name
                                </div>';
                        } else if ($_GET['error'] == "usernameemailinvalid") {
                            echo '<div class="alert alert-danger" role="alert">
                                    Invalid username and email
                                </div>';
                        } else if ($_GET['error'] == "matchpass") {
                            echo '<div class="alert alert-danger" role="alert">
                                    Your Passwords do not match!
                                </div>';
                        } else if ($_GET['error'] == "usernametaken") {
                            echo '<div class="alert alert-danger" role="alert">
                                    Username is already taken!
                                </div>';
                        } else if ($_GET['error'] == "adminerror") {
                            echo '<div class="alert alert-danger" role="alert">
                                    You cannot use the username Admin!
                                </div>';
                        }
                    } 
                    
                    if (isset($_GET['signup'])) {
                        if ($_GET["signup"] == "success")
                        echo '<div class="alert alert-success" role="alert">
                                Sign up successful!
                            </div>';
                    }
                ?>
                <form action="includes/signup.inc.php" method="post">
                    <div class="form-group text-white">
                        <label for="firstname">First Name</label>
                        <input type="text" name="firstname" class="form-control" id="firstname" placeholder="First Name">
                    </div>
                    <div class="form-group text-white">
                        <label for="lastname">Last Name</label>
                        <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Last Name">
                    </div>
                    <div class="form-group text-white">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                    </div>
                    <div class="form-group text-white">
                        <label for="emailAddress">Email Address</label>
                        <input type="email" name="email" class="form-control" id="emailAddress" aria-describedby="emailHelp" placeholder="Your email">
                    </div>
                    <div class="form-group text-white">
                        <label for="userPassword">Password</label>
                        <input type="password" name="password" class="form-control" id="userPassword" placeholder="Password">
                    </div>
                    <div class="form-group text-white">
                        <label for="userRetypePassword">Retype Password</label>
                        <input type="password" name="c_password" class="form-control" id="userRetypePassword" placeholder="Retype Password">
                    </div>
                    <button type="submit" name="signup" class="btn btn-general-sign btn-light">Sign Up</button><span class="text-white" > Already have an account? <a
                            href="login.php">Sign In</a></span>
                </form>


                <hr class="my-4">

                <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i
                        class="fab fa-google mr-2"></i> Sign Up with Google</button>
                <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i
                        class="fab fa-facebook-f mr-2"></i> Sign Up with Facebook</button>
            </div>
        </div>
    </div>
</main>

<?php include "nav_footer.php" ?>

</body>

</html>