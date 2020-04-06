<?php

//check if button isgnup is pressed
if (isset($_POST['signup'])) {

    require '../classes/Database.php';
    require '../classes/Query.php';

    //fetching the items from the form
    $username = $_POST['uid'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];

    //check if the fields are empty
    if (empty($username) || empty($email) || empty($password) || empty($c_password)) {
        header("Location: ../signup.php?error=emptform&uid=" . $username . "&mail=" . $email);
        exit();
    }

    //validate email field
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=uidemailinvalid");
        exit();
    }
    //validate email field
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=emailinvalid&uid=" . $username);
        exit();
    }

    //validate username
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=uidinvalid&mail=" . $email);
        exit();
    }
    //validate password - check if password and confirm password match or not
    else if ($password !== $c_password) {
        header("Location: ../signup.php?error=matchpass&uid=" . $username . "&mail=" . $email);
        exit();
    } else {
        $dbcon = Database::getDb();

        $su = new Query($dbcon);
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $su->addUser($username, $email, $hash);
        header("Location: ../signup.php?signup=success");
        exit();
    }

} else {
    header("Location: ../signup.php");
    exit();
}
