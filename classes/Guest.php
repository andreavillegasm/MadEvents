<?php


class Guest
{
    private $dbconn;

    public function __construct($dbconn)
    {
        $this->dbconn = $dbconn;
    }
    //LIST ALL THE FRIENDS THAT THE USER HAVE
    public function listFriends(){

        $sql = "SELECT * FROM friends";
        $pdostm = $this->dbconn->prepare($sql);
        $pdostm->execute();

        $friends = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $friends;
    }


    //This method grabs the values from the database to display on the update page
    public function updateInfo($id){
        $sql = "SELECT * FROM  friends where id = :id";
        $pst = $this ->dbconn->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        $friend = $pst->fetch(PDO::FETCH_OBJ);

        $fname =  $friend->friend_first_name;
        $mname = $friend->friend_middle_name;
        $lname = $friend->friend_last_name;
        $email = $friend->friend_email;
        $phone = $friend->friend_phone;

        $upvalues = [$fname, $mname, $lname, $email, $phone];

        return  $upvalues;
    }
    public function updateFriend($fname, $mname, $lname, $email, $phone, $id){
        $sql = "Update friends
                set friend_first_name = :first,
                friend_middle_name = :middle,
                friend_last_name = :last,
                friend_email = :email,
                friend_phone = :phone
                WHERE id = :id
        
        ";

        $pst =   $this -> dbconn->prepare($sql);

        $pst->bindParam(':first', $fname);
        $pst->bindParam(':middle', $mname);
        $pst->bindParam(':last', $lname);
        $pst->bindParam(':email', $email);
        $pst->bindParam(':phone', $phone);
        $pst->bindParam(':id', $id);

        $count = $pst->execute();
        if($count){
            header("Location: friends_list.php");
        } else {
            echo "problem updating a friend's information";
        }

    }

}