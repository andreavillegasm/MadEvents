<?php
 require_once 'database/Database.php';
 require_once 'classes/Event.php';

//Get the database connection
$dbconn = Database::getDb();
$ne = new Event($dbconn);

//Get all the venues
$venues = $ne->listVenues();

//Declare variables that will hold the values
$evname = $evlocation = $evdate = $evtime = "";
$errors="";

//Number of errors
$count = 4;

//CHECK TO SEE IF FORM IS SUBMITTED
if (isset($_POST['AddEvent'])){


    //GET DATA FROM FORM
    $evname = $_POST['EventName'];
    $evlocation = $_POST['EventLocation'];
    $evdate = $_POST['EventDate'];
    $evtime = $_POST['EventTime'];

    //Ensure some inputs are restricted such as a  no name event or an old date
    if($evname == "" || $evdate < date('Y-m-d') || $evlocation == ""){
        echo "Please review errors displayed on the screen";
    } else{
        $ne->addEvent($evname, $evlocation, $evdate, $evtime);
    }



}

//Error Messages displayed to guide users to what they are missing
function checkEmpty($input){
    $errmessage ="";
    if($input == ""){
        $errmessage = "Please input the required information";
    }
    return $errmessage;
}

function checkInputDate($input){
    $currentdate = date('Y-m-d');
    $errmessage ="";

    if($input == ""){
        $errmessage = "Please input the required information";
    } else if($input < $currentdate){
        $errmessage = "Please enter a valid date";
    }

    return $errmessage;

}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>New Event</title>
    <link rel="stylesheet" type="text/css" href="css/myevent.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

<?php

//The Header Nav Bar
include 'nav_header.php';

?>
<main style="background-image: url('img/flowerbg.jpg');background-size: 65%; ">
    <div class="container">
        <div class="new-event-container">
        <h1 class="main-title">Create an Event</h1>
        <form method="post" action="">
            <div class="form-group">
                <label for="event_name">Event Name:</label>
                <input type="text" class="form-control" id="event_name" name="EventName" value="<?php echo $evname ?>">
                <span style="color: darkred"> <?php echo checkEmpty($evname)?></span>
            </div>
            <!-- Drop Down Menu for location, Admin should be able to add stuff on their end-->
            <div class="form-group">
                <label>Location:</label>
                <select class="form-control" id="event_location" name="EventLocation">
                    <option value="">--Select an Option--</option>
                    <?php
                    foreach($venues as $venue){
                        if($venue->id == $evlocation){ ?>
                            <option value="<?php echo $venue->id ?>" selected> <?php echo $venue->name ?></option>

                            <?php
                        } else {


                            ?>
                            <option value="<?php echo $venue->id ?>"> <?php echo $venue->name ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
                <span style="color: darkred"> <?php echo checkEmpty($evlocation)?></span>
            </div>
            <div class="form-group">
                <label for="event_date">Date:</label>
                <input type="date" class="form-control" id="event_date" name="EventDate" value="<?php echo $evdate?>">
                <span style="color: darkred"> <?php echo checkInputDate($evdate)?></span>
            </div>
            <div class="form-group">
                <label for="event_time">Time:</label>
                <input type="time" class="form-control" id="event_time" name="EventTime" value="<?php echo $evtime?>">
                <span style="color: darkred"> <?php echo checkEmpty($evtime)?></span>
            </div>
            <div class="submit">
                <button type="submit" class="btn btn-info" name="AddEvent">Create</button>
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
