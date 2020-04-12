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

require_once 'classes/Database.php';
require_once 'classes/Reservation.php';

include "includes/islogin.php";

// from reservation page
if (isset($_POST["submit"])) {

//    $dbconn = Database::getDb();
//    $reservation = new Reservation($dbconn);

    // user id
    $userId = $_SESSION["userId"];
    // event id
    $eventId = $_POST["id"];
//    $isBooked = $reservation->checkBooked($userId, $eventId);

//    if ($isBooked) {
//        // return
//    } else {

//    popup
//    $popup = true;
        $eventName = $_POST["event_name"];
        $eventDate = $_POST["event_date"];
        $eventTime = $_POST["event_time"];
//    }

} else if (isset($_POST["book"])) {
    $dbconn = Database::getDb();
    $reservation = new Reservation($dbconn);

    $eventId = $_POST["id"];
    echo $eventId;
    $nog = $_POST["numberOfGuests"];
    $userId = $_POST["userId"];


    $reservation->addReservation($userId, $eventId, $nog);
}

?>
<main class="myevents-main" style="background-color: white">
    <!-- Top Section that has event information -->
    <section class="jumbotron text-center" style="background-image: url('img/header-event-info.jpg')">
        <div class="container">
            <h1 class="jumbotron-heading" style="color: white;"><?php echo $eventName; ?></h1>
            <div class="event-description">
                <?php echo $eventDate ?>
            </div>
            <div class="event-description">
                <?php echo $eventTime ?>
            </div>
            <div class="row" id="info-buttons">
                <!--                <div class="col" id="col-edit">-->
                <!--                    <form action="eventinfo_update.php" method="post">-->
                <!--                        <input type="hidden" name="id" value="--><? //= $id; ?><!--"/>-->
                <!--                        <button type="submit" name="editEvent" class="btn btn-light" id="infoedit-button">Edit</button>-->
                <!--                    </form>-->
                <!--                </div>-->
                <!--                <div class="col" id="col-delete">-->
                <!--                    <form action="eventinfo_delete.php" method="post">-->
                <!--                        <input type="hidden" name="id" value="--><? //= $id; ?><!--"/>-->
                <!--                        <button type="submit" name="deleteEvent" class="btn btn-danger" id="infodelete-button">Delete-->
                <!--                        </button>-->
                <!--                    </form>-->
                <!--                </div>-->

                <div class="col">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $eventId; ?>"/>
                        <input type="hidden" name="userId" value="<?= $_SESSION["userId"]; ?>"/>
                        <label for="numberOfGuests" style="color: white;font-weight: 700;">Number of Guests:</label>
                        <select id="numberOfGuests" name="numberOfGuests">
                            <?php
                            for ($i = 0; $i < 10; $i++) {
                                echo "<option value=\"" . ($i + 1) . "\">" . ($i + 1) . "</option>";
                            }
                            ?>
                        </select>
                        <button type="submit" name="book" class="btn btn-info" id="infodelete-button">Book</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include "nav_footer.php" ?>
