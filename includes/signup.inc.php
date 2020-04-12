<?php

//check if button isgnup is pressed
if (isset($_POST['signup'])) {

    require '../classes/Database.php';
    require '../classes/Query.php';
    require '../mail_reminder/message.php';


    //fetching the items from the form
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];


    //check if the fields are empty
    if (empty($username) || empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($c_password)) {
        header("Location: ../signup.php?error=emptform&username=" . $username . "&mail=" . $email);
        exit();
    }

    //validate email field
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=usernameemailinvalid");
        exit();
    }
    //validate email field
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=emailinvalid&username=" . $username);
        exit();
    }

    //validate username
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=usernameinvalid&mail=" . $email);
        exit();
    }

    else if (!preg_match("/^[a-z ,.'-]+$/i", $firstname)) {
        header("Location: ../signup.php?error=firstnameinvalid&mail=" . $email);
        exit();
    }

    else if (!preg_match("/^[a-z ,.'-]+$/i", $lastname)) {
        header("Location: ../signup.php?error=lastnameinvalid&mail=" . $email);
        exit();
    }
    //validate password - check if password and confirm password match or not
    else if ($password !== $c_password) {
        header("Location: ../signup.php?error=matchpass&username=" . $username . "&mail=" . $email);
        exit();

    } else if ($username == "admin") {
        header("Location: ../signup.php?error=adminerror&username=" . $username);
        exit();

    }else {
        //eamil part
        //for welcome email
        $to_address = $email;
        $to_name = $username;
        $from_address = 'eplanner470@gmail.com';
        $from_name = 'Mad Event';
        $subject = 'Registration Email';
        $body = '<h1>Welcome to Mad Event</h1>'.
            '<h3>Thank you for registering with us. Hope we can make your every event special.</h3><br/>

<p style="text-align: center">You now have access to the most complete Event development environment. Mad Event allows you to organize your event, invite your friends, upload your pictures and many more.</p> <br/>

<p>Regards, <br/>

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
        $su->addUser($username, $firstname, $lastname, $email, $hash);



        header("Location: ../signup.php?signup=success");
        exit();
    }

} else {
    header("Location: ../signup.php");
    exit();
}
