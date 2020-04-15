<?php

class Reservation
{

    private $dbconn;

    public function __construct($dbconn)
    {
        $this->dbconn = $dbconn;
    }

    /*
     * list active events based on date
     * return: $pdo->fetchAll
     */
    public function listEvents()
    {
//        $todaysDate = date("Y-m-d");

        // select events
        $sql = "SELECT * FROM event_info WHERE DATE(event_date) > CURDATE() ORDER BY event_date DESC";
//        $sql->bindParam(":date", $todaysDate);

        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->execute();

        $events = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $events;
    }

    /*
     * list booked events based on date
     * return: $pdo->fetchAll
     */
    public function listBookedEvents()
    {
        // select events
        $sql = "SELECT * FROM event_info ei JOIN reservation r JOIN users u ON ei.id = r.event_id AND u.userid = r.user_id  
WHERE DATE(event_date) > CURDATE() ORDER BY event_date DESC";


        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->execute();

        $events = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $events;
    }

    // ADD
    public function addReservation($userId, $eventId, $numberOfGuests)
    {
        $sql = "INSERT INTO reservation (user_id, event_id, number_of_guests) values (:user_id, :event_id, :nog)";

        //Prepare
        $pdostm = $this->dbconn->prepare($sql);

        //Bind
        $pdostm->bindParam(':user_id', $userId);
        $pdostm->bindParam(':event_id', $eventId);
        $pdostm->bindParam(':nog', $numberOfGuests);

        //Execute
        $numRowsAffected = $pdostm->execute();
        if ($numRowsAffected) {
            // jump to reservation page
            // header("Location: reservation.php");
            $url = "reservation.php";
            echo "<script type='text/javascript'>";
            echo "window.location.href='$url'";
            echo "</script>";
        } else {
            echo 'a problem occurred when booking';
        }
    }


    // UPDATE
    public function updateReservation($id, $numberOfGuests)
    {
        $sql = "UPDATE reservation SET number_of_guests = :nog WHERE id = :id";

        //Prepare
        $pdostm = $this->dbconn->prepare($sql);

        //Bind
        $pdostm->bindParam(':id', $id);
        $pdostm->bindParam(':nog', $numberOfGuests);

        //Execute
        $numRowsAffected = $pdostm->execute();
        if ($numRowsAffected) {
            // jump to reservation page
            // header("Location: reservation.php");
            $url = "reservation.php";
            echo "<script type='text/javascript'>";
            echo "window.location.href='$url'";
            echo "</script>";
        } else {
            echo 'a problem occurred when updating';
        }
    }

    // DELETE
    public function deleteReservation($id)
    {

        //Receives id and deletes friend based on that
        $sql = "DELETE FROM reservation WHERE id = :id";

        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $numRowsAffected = $pdostm->execute();

        if ($numRowsAffected) {

            $url = "reservation.php";
            echo "<script type='text/javascript'>";
            echo "window.location.href='$url'";
            echo "</script>";
//            header('Location: reservation.php');
        } else {
            echo "problem deleting a reservation";
        }
    }

    // check booked
    public function checkBooked($userid, $eventid)
    {
        // sql
        $sql = "SELECT * FROM `reservation` WHERE user_id=:uid AND event_id=:eid";

        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->bindParam(':uid', $userid);
        $pdostm->bindParam(':eid', $eventid);
        $pdostm->execute();

        $reservation = $pdostm->fetchAll(PDO::FETCH_OBJ);
        if (sizeof($reservation) === 0) {
            return false;
        } else {
            return true;
        }
    }

    public function getReservationsByEventId($eventid)
    {
        // sql
        $sql = "SELECT * FROM reservation r JOIN users u " .
            "ON r.user_id = u.userid " .
            "WHERE event_id = :eid";

        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->bindParam(':eid', $eventid);
        $pdostm->execute();

        return $pdostm->fetchAll(PDO::FETCH_OBJ);
    }

}
