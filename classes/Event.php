<?php
class Event
{

    private $dbconn;

    public function __construct($dbconn)
    {
        $this->dbconn = $dbconn;
    }

    //LIST ALL VENUES AVAILABLE
    public function listVenues(){

        $sql = "SELECT * FROM venue_list";
        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->execute();

        $venues = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $venues;
    }

    //LIST ALL EVENTS THAT ARE ACTIVE
    public function listActiveEvents($id){
        $sql = "SELECT * FROM event_info WHERE event_status = '1' AND user_id = :id ORDER BY id DESC";
        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $pdostm->execute();

        $events = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $events;

    }

    //LIST OF ALL EVENTS THAT ARE CLOSED
    public function listPastEvents($id){
        $sql = "SELECT * FROM event_info WHERE event_status = '0' AND user_id = :id  ORDER BY event_date DESC";
        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $pdostm->execute();

        $events = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $events;

    }

    //ADDING A NEW EVENT INTO THE DATABASE
    public function addEvent($user_id, $evname, $evlocation, $evdate, $evtime){
        $sql = "INSERT INTO event_info (user_id, event_name, venue_id, event_date, event_time) values (:user_id, :event_name, :venue_id, :event_date, :event_time)";

        //Prepare
        $pdostm = $this->dbconn -> prepare($sql);

        //Bind
        $pdostm->bindParam(':user_id', $user_id);
        $pdostm->bindParam(':event_name', $evname);
        $pdostm->bindParam(':venue_id', $evlocation);
        $pdostm->bindParam(':event_date', $evdate);
        $pdostm->bindParam(':event_time', $evtime);

        //Execute
        $numRowsAffected = $pdostm->execute();
        if($numRowsAffected){
            header("Location: event_dashboard.php");
        } else {
            echo 'a problem occurred inserting your event';
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

    //CLOSING AN EVENT: GOING FROM ACTIVE TO PAST EVENT (FROM 1 TO 0)
    public function closeEvent($id){
        $status = 0;
        $sql = "Update event_info
                set event_status = :event_status
                WHERE id = :id
        
        ";

        $pst =   $this -> dbconn->prepare($sql);

        $pst->bindParam(':event_status', $status);
        $pst->bindParam(':id', $id);

        $count = $pst->execute();
        if($count){
            header("Location: event_dashboard.php");
        } else {
            echo "problem closing event";
        }

    }

    //DELETE EVENT
    public  function deleteEvent($id){

        //Receives id and deletes friend based on that
        $sql = "DELETE FROM event_info WHERE id = :id";

        $pdostm = $this ->dbconn -> prepare($sql);
        $pdostm->bindParam(':id', $id);
        $numRowsAffected = $pdostm->execute();

        if($numRowsAffected){
            header('Location: event_dashboard.php');
        } else{
            echo "problem deleting a Event";
        }
    }

}
