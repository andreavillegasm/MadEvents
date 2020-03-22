<?php

require_once 'database/Database.php';
require_once 'classes/Event.php';

//Get the database connection
$dbconn = Database::getDb();
$ne = new Event($dbconn);


if(isset($_POST['viewEvent'])){
    //Id of event that has been sent
    $id = $_POST['id'];

    //return a array with the information of that event
    $info = $ne->infoEvent($id);

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>New Event</title>
    <link rel="stylesheet" type="text/css" href="css/myevent.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

<?php

//The Header Nav Bar
include 'nav_header.php';

?>
<main class="myevents-main" style="background-color: white">
    <section class="jumbotron text-center" style="background-image: url('img/header-event-info.jpg')">
        <div class="container">
            <?php
            foreach($info as $i){

                ?>
                <h1 class="jumbotron-heading" style="color: white;"><?php $i ?></h1>

                <div>
                    <?php $i ?>
                </div>
                <div>
                    <?php $i ?>
                </div>
                <div>
                    <?php $i ?>
                </div>
                <?php
            }
            ?>

        </div>
    </section>
    <div class="container">
        <div class="event-info- container">

        </div>

    </div>
</main>
