<?php


session_start();
if ($_SESSION['username']) {
    require_once 'classes/Database.php';
    require_once 'classes/Event.php';
    require_once 'classes/Guest.php';
    require_once 'classes/Reservation.php';

    $userid = $_SESSION['userid'];
//Get the database connection
    $dbconn = Database::getDb();
    $ne = new Event($dbconn);
    $g = new Guest($dbconn);

    //$id = 0;


    if (isset($_GET['viewEvent'])) {

        //Id of event that has been sent
        $id = $_GET['id'];

        $r = new Reservation($dbconn);
        $reservations = $r->getReservationsByEventId($id);
    }

    //return a array with the information of that event
    $info = $ne->infoEvent($id);

    // return an array with the guests from that event
    $guests = $g->listGuests($id);


//If the close event is clicked
    if (isset($_POST['closeEvent'])) {

        $closeid = $_POST['closeid'];

        //closes the event
        $ne->closeEvent($closeid);

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
    <title>Plan Event</title>
    <link rel="stylesheet" type="text/css" href="css/myevent.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<?php //The Header Nav Bar
include 'nav_header.php'; ?>
<body>

<main class="myevents-main" style="background-color: white">
    <!-- Top Section that has event information -->

    <section class="jumbotron" style="background-image: url('img/header-event-info.jpg')">
        <a class="btn btn-dark" href="event_dashboard.php" id="back">Back</a>
        <div class="container" style="text-align: center">

            <h1 class="jumbotron-heading" style="color: white;"><?php echo $info[0] ?></h1>

            <div class="event-description">
                <?php echo $info[1] ?>
            </div>
            <div class="event-description">
                <?php echo $info[2] ?>
            </div>
            <div class="event-description">
                <?php echo $info[3] ?>
            </div>
            <div class="row" id="info-buttons">
                <div class="col" id="col-edit">
                    <form action="eventinfo_update.php" method="post">
                        <input type="hidden" name="id" value="<?= $id; ?>"/>
                        <button type="submit" name="editEvent" class="btn btn-light" id="infoedit-button">Edit</button>
                    </form>
                </div>
                <div class="col" id="col-delete">
                    <form action="eventinfo_delete.php" method="post">
                        <input type="hidden" name="id" value="<?= $id; ?>"/>
                        <button type="submit" name="deleteEvent" class="btn btn-danger" id="infodelete-button">Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <!-- FEATURES OF EVENT CONTAINER -->
            <div class="row">
                <!-- Guest list container-->
                <div class="col" id="guest-list-container">
                    <img src="img/user-friends-solid.svg" alt="friends icon" class="imginfo-icons">
                    <h3>Guest List</h3>
                    <p>Invite your friends via email, select invite and select who to invite from your Friend's list</p>
                    <form action="friends_list.php" method="get">
                        <input type="hidden" name="id" value="<?= $id; ?>"/>
                        <button type="submit" name="inviteFriends" class="btn btn-info" id="inviteFriends"> Invite
                        </button>
                    </form>
                    <ul class="list-group" id="guest-list-design">
                        <?php
                        foreach ($guests as $guest) { ?>
                            <li class="list-group-item"><?php echo $guest->friend_first_name . ' ' . $guest->friend_middle_name . ' ' . $guest->friend_last_name ?></li>
                        <?php }
                        ?>
                    </ul>
                </div>
            </div>


            <div class="row">

                <?php

                if (sizeof($reservations) === 0) {
                    echo "<h3 class='text-info'>No one has booked it yet.</h3>";
                }

                foreach ($reservations as $key => $reservation) {
                    $username = $reservation->username;
                    $nog = $reservation->number_of_guests;
                    ?>
                    <div class="col">
                        <div class="card">
                            <div class="card-header">booking <?php echo $key+1; ?></div>
                            <div class="card-body bg-white">
                                <h5 class="card-title"><?php echo "user: <a href='#'>" . $username . "</a>"; ?></h5>
                                <?php
                                if ($nog === "1") {
                                    echo "<h5 class=\"card-text\">coming along</h5>";
                                } else {
                                    echo "<h5 class=\"card-text\">coming with " . $nog . " ppl</h5>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>

            <div class="close-event">
                <!-- Button of closing an event-->
                <form action="" method="post">
                    <input type="hidden" name="closeid" value="<?= $id; ?>"/>
                    <button type="submit" name="closeEvent" class="btn btn-warning" id="close-button">Close Event
                    </button>
                </form>
                <div>Is your event done?</div>
                <div>Close it to archieve it and share its success</div>
            </div>


        </div>
    </section>

</main>
