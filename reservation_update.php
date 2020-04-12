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
if (isset($_POST["update"])) {
    // update
    $dbconn = Database::getDb();
    $reservation = new Reservation($dbconn);

    $eventId = $_POST["id"];
    $eventName = $_POST["event_name"];
    $eventDate = $_POST["event_date"];
    $eventTime = $_POST["event_time"];
    $rid = $_POST["rid"];
    $nog = $_POST["nog"];

} else if (isset($_POST["callupdate"])) {
    // update
    $dbconn = Database::getDb();
    $reservation = new Reservation($dbconn);

    $rid = $_POST["rid"];
    $nog = $_POST["numberOfGuests"];

    $reservation->updateReservation($rid, $nog);
} else if (isset($_POST["cancel"])) {
    // update
    $dbconn = Database::getDb();
    $reservation = new Reservation($dbconn);
    // cancel
    $reservation->deleteReservation($_POST["rid"]);
} else {
    header("Location: index.php ");
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
                <div class="col">
                    <form action="" method="post">
                        <input type="hidden" name="rid" value="<?= $rid; ?>"/>
                        <input type="hidden" name="userId" value="<?= $_SESSION["userId"]; ?>"/>
                        <label for="numberOfGuests" style="color: white;font-weight: 700;">Number of Guests:</label>
                        <select id="numberOfGuests" name="numberOfGuests">
                            <?php
                            for ($i = 0; $i < 10; $i++) {
                                if ($nog != ($i + 1)) {
                                    echo "<option value=\"" . ($i + 1) . "\">" . ($i + 1) . "</option>";
                                }else{
                                    echo "<option value=\"" . ($i + 1) . "\" selected>" . ($i + 1) . "</option>";
                                }
                            }
                            ?>
                        </select>
                        <button type="submit" name="callupdate" class="btn btn-primary" id="infodelete-button">Update
                        </button>
                        <a href="reservation.php" class="btn btn-light">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include "nav_footer.php" ?>
