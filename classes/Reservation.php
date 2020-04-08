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
    public function listEvents(){
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
    public function listBookedEvents(){
        // select events
        $sql = "SELECT * FROM event_info ei JOIN reservation r JOIN users u ON ei.id = r.event_id AND u.userid = r.user_id  
WHERE DATE(event_date) > CURDATE() ORDER BY event_date DESC";


        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->execute();

        $events = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $events;
    }

    //ADDING A NEW EVENT INTO THE DATABASE
    public function addReservation($userId, $eventId, $numberOfGuests){
        $sql = "INSERT INTO reservation (user_id, event_id, number_of_guests) values (:user_id, :event_id, :nog)";

        //Prepare
        $pdostm = $this->dbconn -> prepare($sql);

        //Bind
        $pdostm->bindParam(':user_id', $userId);
        $pdostm->bindParam(':event_id', $eventId);
        $pdostm->bindParam(':nog', $numberOfGuests);

        //Execute
        $numRowsAffected = $pdostm->execute();
        if($numRowsAffected){
            header("Location: reservation.php");
        } else {
            echo 'a problem occurred when booking';
        }
    }

    //GETTING THE INFORMATION OF AN EVENT
    public function infoEvent($id){
        $sql = "SELECT * FROM event_info
        join venue_list
        on event_info.venue_id = venue_list.id 
        where event_info.id = :id";
        $pst = $this ->dbconn->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        $event = $pst->fetch(PDO::FETCH_OBJ);

        $name = $event->event_name;
        $date = $event->event_date;
        $time = $event->event_time;
        $location = $event->name;

        $evalues = [$name, $date, $time, $location];

        return  $evalues;


    }

    //UPDATING AN EVENT
    public function updateEvent($name, $date, $time, $location, $id){
        $sql = "Update event_info
                set event_name = :name,
                event_date = :date,
                event_time = :time,
                venue_id = :location
                WHERE id = :id
        
        ";

        $pst =   $this -> dbconn->prepare($sql);

        $pst->bindParam(':name', $name);
        $pst->bindParam(':date', $date);
        $pst->bindParam(':time', $time);
        $pst->bindParam(':location', $location);
        $pst->bindParam(':id', $id);

        $count = $pst->execute();
        if($count){
            header("Location: event_dashboard.php");
        } else {
            echo "problem updating event information";
        }

    }

    //DELETE EVENT
    public  function deleteReservation($id){

        //Receives id and deletes friend based on that
        $sql = "DELETE FROM reservation WHERE id = :id";

        $pdostm = $this ->dbconn -> prepare($sql);
        $pdostm->bindParam(':id', $id);
        $numRowsAffected = $pdostm->execute();

        if($numRowsAffected){
            header('Location: reservation.php');
        } else{
            echo "problem deleting a reservation";
        }
    }

}
