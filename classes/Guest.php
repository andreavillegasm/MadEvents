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

    //Adding a friend
    public function addFriend($fname, $fmiddle, $flast, $femail, $fphone){
        $sql = "INSERT INTO friends (friend_first_name, friend_middle_name, friend_last_name, friend_email, friend_phone) values (:fname, :fmiddle, :flast, :femail, :fphone)";

        //Prepare
        $pdostm = $this->dbconn -> prepare($sql);

        //Bind
        $pdostm->bindParam(':fname', $fname);
        $pdostm->bindParam(':fmiddle', $fmiddle);
        $pdostm->bindParam(':flast', $flast);
        $pdostm->bindParam(':femail', $femail);
        $pdostm->bindParam(':fphone', $fphone);

        //Execute
        $numRowsAffected = $pdostm->execute();
        if($numRowsAffected){
            header("Location: friends_list.php");
        } else {
            echo 'a problem occurred inserting your friend';
        }
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
    public  function deleteFriend($id){

        //Receives id and deletes friend based on that
        $sql = "DELETE FROM friends WHERE id = :id";

        $pdostm = $this ->dbconn -> prepare($sql);
        $pdostm->bindParam(':id', $id);
        $numRowsAffected = $pdostm->execute();

        if($numRowsAffected){
            header('Location: friends_list.php');
        } else{
            echo "problem deleting a Friend";
        }
    }

}