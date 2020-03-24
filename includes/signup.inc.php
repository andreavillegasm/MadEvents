<?php

if (isset($_POST['signup'])) {

    require 'database.php';

    $username = $_POST['uid'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];

    if (empty($username) || empty($email) || empty($password) || empty($c_password)) {
        header("Location: ../signup.php?error=emptform&uid=".$username."&mail=".$email);
        exit();
    } 

    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=uidemailinvalid");
        exit();
    }
    
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=emailinvalid&uid=".$username);
        exit();
    } 
    
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=uidinvalid&mail=".$email);
        exit();
    }
    else if ($password !== $c_password) {
        header("Location: ../signup.php?error=matchpass&uid=".$username."&mail=".$email);
        exit();
    }
    else {
        $query = "SELECT username FROM users WHERE username=?";
        $statement = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($statement, $query)) {
            header("Location: ../signup.php?error=databaseerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($statement, "s", $username);
            mysqli_stmt_execute($statement);
            mysqli_stmt_store_result($statement);

            //check how many result got from the database
            $check = mysqli_stmt_num_rows($statement);

            if ($check > 0) {
                header("Location: ../signup.php?error=usernametaken&mail=".$email);
                exit();
            }
            else {
                $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
                $statement = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($statement, $query)) {
                    header("Location: ../signup.php?error=databaseerror");
                    exit();
                } else {
                    //safer than md5 or sha
                    $hash = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($statement, "sss", $username, $email, $hash);
                    mysqli_stmt_execute($statement);

                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
    }
    //just to close the connection to save resource :)
    mysqli_stmt_close($statement);
    mysqli_close($conn);

}

else {
    header("Location: ../signup.php");
    exit();
}
