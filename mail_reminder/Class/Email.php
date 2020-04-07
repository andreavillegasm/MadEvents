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
}

