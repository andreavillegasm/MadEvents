<?php

include_once "Master/Header.php";

?>
<div class="container">
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
</body>


</html>
