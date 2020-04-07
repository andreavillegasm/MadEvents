<?php

//check if the button login is pressed
if (isset($_POST['login'])) {
    require_once '../classes/Database.php';
    require_once '../classes/Query.php';

    //fetch username and password from user
    $mailorusername = $_POST['mailorusername'];
    $password = $_POST['password'];

    //check if username or password is empty
    if (empty($mailorusername) || empty($password)) {
        header("Location: ../index.php?error=emptform");
        exit();
    } else {

        $dbcon = Database::getDb();
        $lu = new Query($dbcon);
        $users = $lu->getUsers($mailorusername, $mailorusername);
        // var_dump($users);

        // echo $password;
        // echo $mailorusername;

        $usernameinput = $users->username;
        $passwordinput = $users->password;
        $userid = $users->userid;

        // echo $usernameinput;
        // echo $passwordinput;

        $check = password_verify($password, $passwordinput);

        if ($check == false) {
            header("Location: ../index.php?error=wrongpassword");
            exit();
        } else if ($check == true) {
            //start session to log in the user
            session_start();
            $_SESSION['userId'] = $userid;
            $_SESSION['username'] = $usernameinput;

            header("Location: ../index.php?login=success");
            exit();
        } else {
            header("Location: ../index.php?error=wrongpassword");
            exit();
        }
    }
} else {
    header("Location: ../index.php");
    exit();
}
