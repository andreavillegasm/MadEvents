<?php
//Start Session
session_start();
echo $_SESSION['username'];

//Checked if user is signed in

if ($_SESSION['username']){
    require_once 'classes/Database.php';
    require_once 'classes/Event.php';
    require_once 'classes/Users.php';

//GET THE DATABASE CONNECTION
    $dbconn = Database::getDb();
    $ne = new Event($dbconn);
    $u = new Users($dbconn);

    //Grab all the users and id
    $users =  $u->user_email();
    foreach ($users as $user){
        if($user->username == $_SESSION['username']){
            $id = $user->userid;
            $_SESSION['userid'] = $id;
            echo $_SESSION['userid'];
        }
    }

//Get all the active events
    $active = $ne->listActiveEvents($id);

//Get all the past events
    $past = $ne->listPastEvents($id);

} else {

    header('Location:login.php');
}



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
        <div class="new-event-button">
            <a href="new_event.php" id="btn_addEvent" class="btn btn-info">New Event</a>
        </div>
    </section>
    <div class="container">

        <!-- List of active events -->
        <div>Active Events
            <div class="row">
                <?php
                foreach ($active as $a){
                ?>
                <div class="col">
                    <div class="card text-black">
                        <!-- Pass event with the id of the event -->
                        <img src="img/event-icon.jpg" class="card-img" alt="sample1">
                        <div class="card-img-overlay">
                            <h5 class="event-name" ><?php echo $a->event_name ?></h5>
                            <div class="view-button">
                                <form action="eventinfo_active.php" method="post"  >
                                    <input type="hidden" name="id" value="<?= $a->id; ?>" />
                                    <button type="submit" name="viewEvent" class="btn-info">View</button>
                                </form>
                            </div>
                        </div>

                    </div>


                </div>
                <?php
                }
                ?>
            </div>
        </div>
        <!-- List of Past Events -->
        <div> Past Events
            <div class="row">
                <?php
                foreach ($past as $p){
                    ?>
                    <div class="col">
                        <div class="card text-black">
                            <!-- Pass event with the id of the event -->
                            <img src="img/event-icon.jpg" class="card-img" alt="sample1">
                            <div class="card-img-overlay">
                                <h5 class="event-name" ><?php echo $p->event_name ?></h5>
                                <div class="view-button">
                                    <form action="eventinfo_past.php" method="post"  >
                                        <input type="hidden" name="id" value="<?= $p->id; ?>" />
                                        <button type="submit" name="viewpEvent" class="btn-info">View</button>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>


</main>


</body>

