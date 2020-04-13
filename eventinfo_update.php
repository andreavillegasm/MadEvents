<?php
require_once 'classes/Database.php';
require_once 'classes/Event.php';

//Get the database connection
$dbconn = Database::getDb();
$ne = new Event($dbconn);

//Get all the venues
$venues = $ne->listVenues();

//Set variables first

$name= $date = $time = $location = $id = $uid = "";

//Get all the info from the given event
if(isset($_POST['editEvent'])){
    //Id of event that has been sent
    $id = $_POST['id'];

    //return a array with the information of that event
    $info = $ne->infoEvent($id);

}

//Update the values in the database
if(isset($_POST['updateEvent'])){
    //Id of event that has been sent
    $uid = $_POST['uid'];
    $name = $_POST['eventName'];
    $date = $_POST['eventDate'];
    $time = $_POST['eventTime'];
    $location = $_POST['eventLocation'];

    //return a array with the information of that event
     $ne->updateEvent($name, $date, $time, $location, $uid);

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

<?php

//The Header Nav Bar
include 'nav_header.php';

?>
<main class="myevents-main" style="background-color: white">
    <!-- Top Section that has event information -->
    <section class="jumbotron text-center" style="background-image: url('img/header-event-info.jpg')">
        <div class="container">
            <h1 class="jumbotron-heading" style="color: white;">Edit Event</h1>
        </div>
    </section>
    <section>
        <div class="new-event-container">
            <form method="post" action="">
                <div class="form-group">
                    <label for="event_name">Event Name:</label>
                    <input type="text" class="form-control" id="event_name" name="eventName" value="<?php echo $info[0] ?>">
                </div>
                <div class="form-group">
                    <label for="event_date">Date:</label>
                    <input type="date" class="form-control" id="event_date" name="eventDate" value="<?php echo $info[1] ?>">
                </div>
                <div class="form-group">
                    <label for="event_time">Time:</label>
                    <input type="time" class="form-control" id="event_time" name="eventTime" value="<?php echo $info[2] ?>">
                </div>
                <!-- Drop Down Menu for location, Admin should be able to add stuff on their end-->
                <div class="form-group">
                    <label>Location:</label>
                    <select class="form-control" id="event_location" name="eventLocation">
                        <option value="">--Select an Option--</option>
                        <?php
                        foreach($venues as $venue){
                            if($venue->name == $info[3]){ ?>
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
                </div>
                <div class="submit">
                    <input type="hidden" name="uid" value="<?= $id; ?>" />
                    <button type="submit" class="btn btn-info" name="updateEvent">Update</button>
                </div>



            </form>
            <a href="eventinfo_active.php?id=<?php echo $id?>&viewEvent=">Cancel</a>
        </div>
    </section>
</main>
