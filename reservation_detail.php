<?php
require_once 'classes/Database.php';
require_once 'classes/Reservation.php';


// from reservation page
if (isset($_POST["submit"])) {

//    popup
//    $popup = true;
    $eventId = $_POST["id"];
    $eventName = $_POST["event_name"];
    $eventDate = $_POST["event_date"];
    $eventTime = $_POST["event_time"];

}else if (isset($_POST["book"])) {
    $dbconn = Database::getDb();
    $reservation = new Reservation($dbconn);

    $eventId = $_POST["id"];
    echo $eventId;
    $nog = $_POST["numberOfGuests"];
    $userId = $_POST["userId"];


    $reservation->addReservation($userId, $eventId, $nog);
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
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                        <button type="submit" name="book" class="btn btn-info" id="infodelete-button">Book</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include "nav_footer.php" ?>
