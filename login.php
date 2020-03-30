<?php
require_once 'classes/Database.php';
require_once  'classes/Query.php';
$dbcon = Database::getDb();
$gallery_users = new Query($dbcon);
$users= $gallery_users->admin_gallery();
//var_dump($users);
$error ="";
if(isset($_POST['login'])){
    $userinput = $_POST['username'];
    $passinput = $_POST['password'];
    foreach($users as $user){
        if($userinput == $user->user_name && $passinput == $user->password){
            session_start();
            $_SESSION['username'] = $userinput;
            $_SESSION['password'] = $passinput;
            header('Location:admin_gallery.php');
        }
        else{
            $error = "Your username and password doest not match.";
        }
    }

}
?>
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
    <title>Login</title>
</head>

<body>

<?php include "nav_header.php" ?>

<main>
    <div class="container">
        <div class="login-container">
            <div class="card-body">
                <h5 class="card-title text-center text-white">Sign In</h5>
                <form action="includes/login.inc.php" method="post">
                    <div class="form-group text-white">
                        <label for="mailorusername">Email Address Or Username</label>
                        <input type="text" class="form-control" name="mailorusername" id="mailorusername"
                               placeholder="Your email or Username">
                    </div>

                    <div class="form-group text-white">
                        <label for="userPassword">Password</label>
                        <input type="password" class="form-control" name="password" id="userPassword" placeholder="Password">
                    </div>

                    <div class="form-check mb-4">
                        <input type="checkbox" class="form-check-input" id="rememberme">
                        <label class="form-check-label text-white" for="rememberme">Remember Password</label>
                    </div>

                    <button type="submit" name="login " class="btn btn-general-sign btn-light">Sign In</button>
                </form>

                    <span class="text-white"> -- Don't have an account? <a href="signup.php" class="btn btn-general-sign btn-light">Sign Up</a></span>

                    

                <hr class="my-4">

                <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i
                            class="fab fa-google mr-2"></i> Sign in with Google
                </button>
                <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i
                            class="fab fa-facebook-f mr-2"></i> Sign in with Facebook
                </button>
            </div>
        </div>
    </div>
</main>

<?php include "nav_footer.php" ?>

</body>

</html>