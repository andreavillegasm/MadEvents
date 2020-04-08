<!DOCTYPE HTML>
<html>
<head>
    <title>Reservation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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

// vars
//$popup = false;
include "includes/islogin.php";

$dbconn = Database::getDb();
$reservation = new Reservation($dbconn);

// active events
$events = $reservation->listEvents();
// booked events
$booked_events = $reservation->listBookedEvents();

if(isset($_POST["cancel"])){
    $reservation->deleteReservation($_POST["id"]);
}


?>


<main class="myevents-main" style="background-color: white">
<!--    <div class="modal --><?php //if (!$popup) {
//        echo "d-none";
//    } ?><!--" tabindex="-1" role="dialog">-->
<!--        <div class="modal-dialog" role="document">-->
<!--            <div class="modal-content">-->
<!--                <div class="modal-header">-->
<!--                    <h5 class="modal-title">Book a reservation for --><?php //echo $eventName; ?><!--</h5>-->
<!--                    <label for="numberOfGuests">Number of Guests:</label>-->
<!--                    <input type="number" name="numberOfGuests" value="1">-->
<!--                    <button type="submit" name="popup" class="btn btn-info">Book a reservation.</button>-->
<!---->
<!--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                        <span aria-hidden="true">&times;</span>-->
<!--                    </button>-->
<!--                </div>-->
<!--                <div class="modal-body">-->
<!--                    <p>Modal body text goes here.</p>-->
<!--                </div>-->
<!--                <div class="modal-footer">-->
<!--                    <button type="button" class="btn btn-primary">Save changes</button>-->
<!--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
<!--        <div class="modal-dialog" role="document">-->
<!--            <div class="modal-content">-->
<!--                <div class="modal-header">-->
<!--                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>-->
<!--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                        <span aria-hidden="true">&times;</span>-->
<!--                    </button>-->
<!--                </div>-->
<!--                <div class="modal-body">-->
<!--                    ...-->
<!--                </div>-->
<!--                <div class="modal-footer">-->
<!--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
<!--                    <button type="button" class="btn btn-primary">Save changes</button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <div class="jumbotron">
        <h1>Avaliable Reservation</h1>
        <b>select a current event to book a reservation.</b>

        <div class="row">

            <?php

            if (sizeof($events) === 0){
                echo "<h3 class='text-info'>Oops! No events available now~</h3>";
            }

            foreach ($events as $event) {
//                    var_dump($event);
                $currentEventId = $event->id;
                $currentEventDate = $event->event_date;
                $currentEventName = $event->event_name;
                $currentEventTime = $event->event_time;
                $currentUserId = $_SESSION["userId"];
                ?>
                <div class="col">
                    <div class="card text-black">
                        <!-- Pass event with the id of the event -->
                        <img src="img/event-icon.jpg" class="card-img">
                        <div class="card-img-overlay">
                            <h5 class="event-name"><?php echo $currentEventName; ?></h5>
                            <div class="view-button">
                                <form method="post" action="reservation_detail.php">
                                    <input type="hidden" name="id" value="<?php echo $currentEventId; ?>"/>
                                    <input type="hidden" name="event_time" value="<?php echo $currentEventTime; ?>"/>
                                    <input type="hidden" name="event_name" value="<?php echo $currentEventName; ?>"/>
                                    <input type="hidden" name="event_date" value="<?php echo $currentEventDate; ?>"/>
                                    <button type="submit" name="submit" class="btn btn-info">Book</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <h1>My Reservation</h1>
        <b>I have already booked these reservations.</b>

        <div class="row">
            <?php

            if (sizeof($booked_events) === 0){
                echo "<h3 class='text-info'>Oops! Currently ou don't have any booked reservation~</h3>";
            }
            foreach ($booked_events as $event) {
                $currentEventId = $event->id;
                $currentEventDate = $event->event_date;
                $currentEventName = $event->event_name;
                $currentEventTime = $event->event_time;
                $currentUserId = $_SESSION["userId"];
                $currentNoG = $event->number_of_guests;

                ?>
                <div class="col">
                    <div class="card text-black">
                        <!-- Pass event with the id of the event -->
                        <img src="img/event-icon.jpg" class="card-img">
                        <span><?php echo $currentNoG ; ?> ppl</span>
                        <div class="card-img-overlay">
                            <h5 class="event-name"><?php echo $currentEventName; ?></h5>
                            <div class="view-button">
                                <form method="post" action="">
                                    <input type="hidden" name="id" value="<?php echo $currentEventId; ?>"/>
                                    <input type="hidden" name="event_time" value="<?php echo $currentEventTime; ?>"/>
                                    <input type="hidden" name="event_name" value="<?php echo $currentEventName; ?>"/>
                                    <input type="hidden" name="event_date" value="<?php echo $currentEventDate; ?>"/>
                                    <button type="submit" onclick="confirm('are you sure?')" name="cancel" class="btn btn-info">Cancel</button>
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
</main>
<?php include "nav_footer.php"; ?>
</body>

