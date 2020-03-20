<?php
require_once 'database/Database.php';
require_once 'classes/Event.php';

//GET THE DATABASE CONNECTION
$dbconn = Database::getDb();
$ne = new Event($dbconn);

//Get all the active events
$active = $ne->listActiveEvents();

//Get all the past events
$past = $ne->listPastEvents();

?>

<!DOCTYPE HTML>
<html>
<head>
    <title>My Events</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/myevent.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

<?php

//The Header Nav Bar
include 'nav_header.php';

?>

<main class="myevents-main" style="background-color: white">
    <section class="jumbotron text-center" style="background-image: url('img/header_bg.jpg')">
        <div class="container">
            <h1 class="jumbotron-heading">My Events</h1>
            <p class="lead text-muted">Have something exciting planned?</p>
        </div>
    </section>
    <div class="container">
        <div class="new-event-button">
         <a href="new_event.php" id="btn_addEvent" class="btn btn-info">New Event</a>
        </div>
        <div>Active Events
            <div class="row">
                <?php
                foreach ($active as $a){
                ?>
                <div class="col-sm">
                    <div class="card text-black">
                        <!-- Pass event with the id of the event -->
                        <a href="eventinfo_past.php">
                        <img src="img/logo.jpg" class="card-img" alt="sample1">
                        <div class="card-img-overlay">
                            <h5 class="card-title" ><?php echo $a->event_name ?></h5>
                        </div>
                        </a>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div> Past Events
            <div class="row">
                <div class="col-sm">
                    <div class="card text-black">
                        <a href="eventinfo_past.php">
                            <img src="img/logo.jpg" class="card-img" alt="sample1">
                            <div class="card-img-overlay">
                                <h5 class="card-title" id="card-event">Lana's Birthday</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</main>


</body>

