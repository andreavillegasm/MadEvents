<?php


require_once 'classes/Database.php';
require 'classes/Guest.php';

//Get the database connection
$dbconn = Database::getDb();
$f = new Guest($dbconn);

//$confirm = false;
if (isset($_POST['deleteFriend'])) {

    //get the id value
    $id = $_POST['id'];

    //Send id to delete method
    $friends = $f->deleteFriend($id);


}
?>