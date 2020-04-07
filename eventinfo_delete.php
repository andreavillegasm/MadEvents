<?php


require_once 'classes/Database.php';
require 'classes/Event.php';

//Get the database connection
$dbconn = Database::getDb();
$ne = new Event($dbconn);


if (isset($_POST['deleteEvent'])) {

    //get the id value
    $id = $_POST['id'];

    $ne->deleteEvent($id);


}




