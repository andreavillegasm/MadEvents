<?php
Class Email{
    private $dbcon;

    public function __construct($dbcon)
    {
        $this->dbcon = $dbcon;
    }
    public function emails(){
        $sql = "select * from guest_list join event_info
                    on event_info.id = guest_list.event_id
                    join friends
                    on friends.id = guest_list.friend_id";
        $pdostm = $this->dbcon->prepare($sql);
        $pdostm->execute();
        $mails = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $mails;
    }

    public function getUser($id){
        $sql = "select * from users where userid = :id ";
        $pdostm = $this->dbcon->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $pdostm->execute();
        $user = $pdostm->fetch(PDO::FETCH_OBJ);
        return $user;

    }

    //GETTING THE INFORMATION OF AN EVENT
    public function infoEvent($id){
        $sql = "SELECT * FROM event_info
        join venue_list
        on event_info.venue_id = venue_list.id 
        where event_info.id = :id";
        $pst = $this ->dbcon->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        $event = $pst->fetch(PDO::FETCH_OBJ);


        return  $event;


    }

    //GETTING THE INFORMATION OF AN EVENT
    public function infoFriend($id){
        $sql = "SELECT * FROM friends where id = :id";
        $pst = $this ->dbcon->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        $friend = $pst->fetch(PDO::FETCH_OBJ);


        return  $friend;


    }

    //Adding a friend
    public function addGuest($event_id, $friend_id){
        $sql = "INSERT INTO guest_list (event_id, friend_id) values (:event_id, :friend_id)";

        //Prepare
        $pdostm = $this->dbcon -> prepare($sql);

        //Bind
        $pdostm->bindParam(':event_id', $event_id);
        $pdostm->bindParam(':friend_id', $friend_id);


        //Execute
        $numRowsAffected = $pdostm->execute();
        if($numRowsAffected){
            echo 'Successfully added guest';
        } else {
            echo 'a problem occurred adding your guest';
        }
    }
}

