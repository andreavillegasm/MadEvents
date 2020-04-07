<?php

//check if button isgnup is pressed
if (isset($_POST['signup'])) {

    require '../classes/Database.php';
    require '../classes/Query.php';
    require '../mail_reminder/message.php';


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
        //eamil part
        //for welcome email
        $to_address = $email;
        $to_name = $username;
        $from_address = 'eplanner470@gmail.com';
        $from_name = 'Mad Event';
        $subject = 'Registration Email';
        $body = '<h1>Welcome to Mad Event</h1>'.
            '<p>Thank you for registering with us. Hope we make all of your event the best.<br/>

We do have lots of options to make your event great. Please have a look at our website.<br/>

Regards, <br/>

Mad_Event Team

</p>';
        $is_body_html = 'true';

        try{
            send_email($to_address, $to_name, $from_address, $from_name,$subject, $body, $is_body_html);
        }catch(Exception $e){
            header('mail_reminder/Location:Error_mail.php');
        }

        //db code
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
