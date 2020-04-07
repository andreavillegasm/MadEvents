<?php
session_start();
if ($_SESSION['username']) {
    require_once 'classes/Database.php';
    require_once 'classes/Guest.php';

//Get the database connection
    $dbconn = Database::getDb();
    $f = new Guest($dbconn);
    $user_id = $_SESSION['userid'];


//Declare variables that will hold the values
    $fname = $fmiddle = $flast = $femail = $fphone = "";

//CHECK TO SEE IF FORM IS SUBMITTED
    if (isset($_POST['AddFriend'])) {


        //GET DATA FROM FORM
        $fname = $_POST['FriendName'];
        $fmiddle = $_POST['FriendMiddle'];
        $flast = $_POST['FriendLast'];
        $femail = $_POST['FriendEmail'];
        $fphone = $_POST['FriendPhone'];

        //Ensure some inputs are restricted such as a  no name event or an old date
        if ($fname == "" || $flast == "" || $femail == "") {
            echo "Please review errors displayed on the screen";
        } else {
            $f->addFriend($user_id, $fname, $fmiddle, $flast, $femail, $fphone);
        }


    }


//Error Messages displayed to guide users to what they are missing
    function checkEmpty($input)
    {
        $errmessage = "";
        if ($input == "") {
            $errmessage = "Please input the required information";
        }
        return $errmessage;
    }

    function checkEmail($input)
    {
        $errmessage = "";
        global $count;
        if ($input == "") {
            $errmessage = "Please input the required information";
        } else if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
            $errmessage = "Please enter a valid email";
        }
        return $errmessage;
    }

    function checkPhone($input)
    {
        $phoneval = "/[0-9]{10}/";
        $errmessage = "";
        //Only check this condition if the field is not empty
        if ($input != "") {
            if (!preg_match($phoneval, $input)) {
                $errmessage = "Please enter a valid number";
            }
        }
        return $errmessage;
    }


} else {
    header('Location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>New Friend</title>
    <link rel="stylesheet" type="text/css" href="css/myevent.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

<?php

//The Header Nav Bar
include 'nav_header.php';

?>
<main style="background-image: url('img/friends_bg.jpg');background-size: 65%; ">
    <div class="container">
        <div class="new-event-container">
            <h1 class="main-title">New Friend</h1>
            <form method="post" action="">
                <div class="form-group">
                    <label for="friend_name">First Name: </label>
                    <input type="text" class="form-control" id="friend_name" name="FriendName" value="<?php echo $fname ?>">
                    <span style="color: darkred"> <?php echo checkEmpty($fname)?></span>
                </div>
                <div class="form-group">
                    <label for="friend_middle">Middle Name (Optional): </label>
                    <input type="text" class="form-control" id="friend_middle" name="FriendMiddle" value="<?php echo $fmiddle ?>">
                </div>
                <div class="form-group">
                    <label for="friend_last">Last Name: </label>
                    <input type="text" class="form-control" id="friend_last" name="FriendLast" value="<?php echo $flast ?>">
                    <span style="color: darkred"> <?php echo checkEmpty($flast)?></span>
                </div>

                <div class="form-group">
                    <label for="friend_email">Email: </label>
                    <input type="email" class="form-control" id="friend_email" name="FriendEmail" value="<?php echo $femail?>">
                    <span style="color: darkred"> <?php echo checkEmail($femail)?></span>
                </div>
                <div class="form-group">
                    <label for="friend_phone">Phone (Optional): </label>
                    <input type="text" class="form-control" id="friend_phone" name="FriendPhone" value="<?php echo $fphone?>">
                    <span style="color: darkred"> <?php echo checkPhone($fphone)?></span>
                </div>
                <div class="submit">
                    <button type="submit" class="btn btn-info" name="AddFriend">Add Friend</button>
                </div>

            </form>
        </div>
    </div>
</main>
<?
//Adds the footer
include 'nav_footer.php';

?>
</body>
</html>
