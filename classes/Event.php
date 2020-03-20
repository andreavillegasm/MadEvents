<?php
class Event
{

    private $dbconn;

    public function __construct($dbconn)
    {
        $this->dbconn = $dbconn;
    }

    public function listVenues(){

        $sql = "SELECT * FROM venue_list";
        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->execute();

        $venues = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $venues;
    }

    public function listActiveEvents(){
        $sql = "SELECT * FROM event_info WHERE status = '1'";
        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->execute();

        $events = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $events;

    }

    public function listPastEvents(){
        $sql = "SELECT * FROM event_info WHERE status = '0' ";
        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->execute();

        $events = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $events;

    }

    public function addEvent($evname, $evlocation, $evdate, $evtime){
        $sql = "INSERT INTO event_info (event_name, venue_id, event_date, event_time) values (:event_name, :venue_id, :event_date, :event_time)";

        //Prepare
        $pdostm = $this->dbconn -> prepare($sql);

        //Bind
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
}
