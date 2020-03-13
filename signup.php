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
                <h5 class="card-title text-center">Sign Up</h5>
                <form action="">
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" id="firstname"
                               placeholder="Your first name">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="lastname"
                               placeholder="Your last name">
                    </div>
                    <div class="form-group">
                        <label for="emailAddress">Email Address</label>
                        <input type="email" class="form-control" id="emailAddress" aria-describedby="emailHelp"
                               placeholder="Your email">
                    </div>
                    <div class="form-group">
                        <label for="userPassword">Password</label>
                        <input type="password" class="form-control" id="userPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="userRetypePassword">Retype Password</label>
                        <input type="password" class="form-control" id="userRetypePassword" placeholder="Retype Password">
                    </div>
                </form>

                <button type="submit" class="btn btn-general-sign">Sign Up</button><span> Already have an account? <a
                        href="">Sign In</a></span>

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