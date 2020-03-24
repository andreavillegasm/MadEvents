<?php

if (isset($_POST['login'])) {
    require 'database.php';

    //fetch username and password from user
    $mailorusername = $_POST['mailorusername'];
    $password = $_POST['password'];

    //check if username or password is empty
    if (empty($mailorusername) || empty($password)) {
        header("Location: ../index.php?error=emptform");
        exit();
    }
    else {
        //prepraring the statement
        $query = "SELECT * FROM users WHERE username=? or email=?;";
        $statement = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($statement, $query)) {
            header("Location: ../index.php?error=databaseerror");
            exit();
        } else {
            mysqli_stmt_bind_param($statement, "ss", $mailorusername, $mailorusername);
            mysqli_stmt_execute($statement);

            $result = mysqli_stmt_get_result($statement);

            //check if result is in the database
            if ($row = mysqli_fetch_assoc($result)) {
                //this is a boolean, so the check variable will return either 0 or 1
                $check = password_verify($password, $row['password']);
                //check if input password is equal to password in the database
                if ($check == false) {
                    header("Location: ../index.php?error=wrongpassword");
                    exit();  
                } 
                else if ($check == true){
                    //start session to log in the user
                    session_start();
                    $_SESSION['userId'] = $row['userid'];
                    $_SESSION['username'] = $row['username'];

                    header("Location: ../index.php?login=success");
                    exit();
                } 
                else {
                    header("Location: ../index.php?error=wrongpassword");
                    exit();
                }
            }
            else{
                header("Location: ../index.php?error=nomatchuser");
                exit();  
            }
        }
    }
} 
else {
    header("Location: ../index.php");
    exit();
}