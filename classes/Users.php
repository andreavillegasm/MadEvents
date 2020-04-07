<?php
Class Users{
    private $dbcon;

    public function __construct($dbcon)
    {
        $this->dbcon = $dbcon;
    }
    public function user_email(){
        $sql = "select * from users";
        $pdostm = $this->dbcon->prepare($sql);
        $pdostm->execute();
        $user_email = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $user_email;
    }
}