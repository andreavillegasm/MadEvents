<?php
require_once 'classes/Database.php';
require_once 'classes/Event.php';
require_once 'classes/Query.php';

include 'comments.inc.php';

//for the comment section
date_default_timezone_set('Canada/Eastern');

//Get the database connection
$dbconn = Database::getDb();
$ne = new Event($dbconn);


if(isset($_GET['viewpEvent'])){
    //Id of event that has been sent
    $id = $_GET['id'];

    //return a array with the information of that event
    $info = $ne->infoEvent($id);

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Past Events</title>
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
            <h1 class="jumbotron-heading" style="color: white;"><?php  echo $info[0] ?></h1>
            <div class="event-description">
                Date: <?php  echo $info[1] ?>
            </div>
            <div class="event-description">
                Time: <?php  echo $info[2] ?>
            </div>
            <div class="event-description">
                Location: <?php  echo $info[3] ?>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="event-info- container">

            <div>
                <!-- Carousel  of featured images-->
                <div class="row">
                    <div class="col-sm">
                        <div class="card text-black">
                            <a href="eventinfo_past.php">
                                <img src="img/pineapple.jpg" class="card-img" alt="sample1">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card text-black">
                            <img src="img/breath.jpg" class="card-img" alt="sample1">
                        </div>

                    </div>
                    <div class="col-sm">
                        <div class="card text-black">
                            <img src="img/coffee.jpg" class="card-img" alt="sample1">
                        </div>

                    </div>
                </div>
                <div class="view-gallery-btn">
                    <a href="public_gallery.php" id="btn_viewGallery" class="btn btn-info">View Full Gallery</a>
                </div>
            </div>
            <div>

            </div>
        </div>

    </div>

    <!-- Comment and Rating Section -->
    <div class='container'>
    <?php
        echo "<form method='POST' action='".addComments()."'>
            <div class='form-group'>
                <div class='form-group'>
                    <label for='comment'>Write a comment</label>
                    <input type='hidden' name='userid' value='".(isset($_SESSION['userId']) ? $_SESSION['userId'] : "")."'>
                    <input type='hidden' name='username' value='".(isset($_SESSION['userId']) ? $_SESSION['username'] : "")."'>
                    <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                    <textarea name='message' class='form-control' id='comment' rows='3' placeholder='write a comment...'></textarea>
                </div>
                <button style='width: 10%;' name='commentSubmit' type='submit' class='btn btn-info'>Comment</button>
            </div>
        </form>";
    ?>


        <hr class="my-4">

        <ul class="comment-section">
            <?php           
                showCommments();
            ?>
        </ul>

    </div>

</main>

