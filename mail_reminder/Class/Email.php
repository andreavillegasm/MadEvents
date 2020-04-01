<?php
Class Email{
    private $dbcon;

    public function __construct($dbcon)
    {
        $this->dbcon = $dbcon;
    }
    public function user_email(){
        $sql = "select * from users";
        $pdostm = $this->dbcon->prepare($sql);
        $pdostm->execute();
        $email = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $email;
    }
}

