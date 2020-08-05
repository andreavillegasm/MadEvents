<?php

//The Header Nav Bar



session_start();
//echo $_SESSION['username'];

//Checked if user is signed in

if ($_SESSION['username']){
    require_once 'classes/Database.php';
    require_once 'classes/Event.php';
    require_once 'classes/Users.php';

//GET THE DATABASE CONNECTION
    $dbconn = Database::getDb();
    $ne = new Event($dbconn);
    $u = new Users($dbconn);

    //Grab all the users
    $users =  $u->user_email();

    //Loop through and get the id of the logged in user and store it on the session
    foreach ($users as $user){
        if($user->username == $_SESSION['username']){
            $id = $user->userid;
            $_SESSION['userid'] = $id;
            //echo $_SESSION['userid'];
        }
    }

    //If the user is admin just get all of the events
    if($_SESSION['username'] == 'admin'){
        $active = $ne->listActiveEventsAdmin();
        $past = $ne->listPastEventsAdmin();
    }else {

        //Get all the active events with that id
        $active = $ne->listActiveEvents($id);

        //Get all the past events with that id
        $past = $ne->listPastEvents($id);
    }

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
</head>

<body>
<?php include 'nav_header.php'; ?>

<main class="myevents-main" style="background-color: white">
    <section class="jumbotron text-center" style="background-image: url('img/header_bg.jpg')">
        <div class="container">
            <h1 class="jumbotron-heading">My Events</h1>
            <p class="lead text-muted">Have something exciting planned?</p>
        </div>
        <div class="new-event-button">
            <a href="new_event.php" class="btn btn-info">Create Event</a>
        </div>
    </section>

    <!-- Page Container -->

    <div class="container">

        <!-- List of active events -->
        <div class="event-container">
            <h3 style="font-size: 20px"> Active Events </h3>
            <div class="card-columns">
                <?php
                foreach ($active as $a){
                ?>
                <!--<div class="col">-->
                    <div class="card">
                        <img src="img/event-icon.jpg" class="card-img" alt="sample1">
                        <div class="card-img-overlay">
                            <h5 class="event-name" ><?php echo $a->event_name ?></h5>
                            <div class="view-button">
                                <form action="eventinfo_active.php" method="get"  >
                                    <input type="hidden" name="id" value="<?= $a->id; ?>" />
                                    <button type="submit" name="viewEvent" class=" btn btn-info">View</button>
                                </form>
                            </div>
                        </div>

                    </div>
                <?php
                }
                ?>
            </div>
        </div>

        <!-- List of Past Events -->
        <div class="event-container">
            <h3 style="font-size: 20px" > Past Events </h3>
            <div class="card-columns">
                <?php
                foreach ($past as $p){
                    ?>
                        <div class="card text-black">
                            <!-- Pass event with the id of the event -->
                            <img src="img/event-icon.jpg" class="card-img" alt="sample1">
                            <div class="card-img-overlay">
                                <h5 class="event-name" ><?php echo $p->event_name ?></h5>
                                <div class="view-button">
                                    <form action="eventinfo_past.php" method="get"  >
                                        <input type="hidden" name="id" value="<?= $p->id; ?>" />
                                        <button type="submit" name="viewpEvent" class="btn btn-info">View</button>
                                    </form>
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

