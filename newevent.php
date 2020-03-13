
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>New Event</title>
    <link rel="stylesheet" type="text/css" href="css/myevent.css">
    <!--<link rel="stylesheet" type="text/css" href="css/style.css">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

<?php

//The Header Nav Bar
include 'master/nav_header.php';

?>
<main>
    <div class="container">
        <div class="new-event-container">
        <h1 class="main-title">Create an Event</h1>
        <form>
            <div class="form-group">
                <label for="event_name">Event Name:</label>
                <input type="text" class="form-control" id="event_name" name="event_name" value="">
            </div>
            <!-- Drop Down Menu for location, Admin should be able to add stuff on their end-->
            <div class="form-group">
                <label>Location:</label>
                <select class="form-control" id="event_location" name="event_location">
                    <option value="">--Please select a location--</option>
                </select>
            </div>
            <div class="form-group">
                <label for="event_date">Date:</label>
                <input type="date" class="form-control" id="event_date" name="event_date" value="">
            </div>
            <div class="form-group">
                <label for="event_time">Time:</label>
                <input type="time" class="form-control" id="event_time" name="event_time" value="">
            </div>
            <div class="submit">
                <button type="submit" class="btn btn-info">Create</button>
            </div>

        </form>
        </div>
    </div>
</main>
<?
//Adds the footer
include 'master/nav_footer.php';

?>
</body>


</html>
