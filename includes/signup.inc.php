<?php

//check if button isgnup is pressed
if (isset($_POST['signup'])) {

    require 'database.php';


    //fetching the items from the form
    $username = $_POST['uid'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];


    //check if the fields are empty
    if (empty($username) || empty($email) || empty($password) || empty($c_password)) {
        header("Location: ../signup.php?error=emptform&uid=".$username."&mail=".$email);
        exit();
    } 

    //validate email field
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=uidemailinvalid");
        exit();
    }
    //validate email field
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=emailinvalid&uid=".$username);
        exit();
    } 
    
    //validate username
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=uidinvalid&mail=".$email);
        exit();
    }
    //validate password - check if password and confirm password match or not
    else if ($password !== $c_password) {
        header("Location: ../signup.php?error=matchpass&uid=".$username."&mail=".$email);
        exit();
    }
    else {
        //fetching the username where username is ...
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
