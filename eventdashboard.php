<!DOCTYPE HTML>
<html>
<head>
    <title>My Events</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/myevent.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

<?php

//The Header Nav Bar
include 'nav_header.php';

?>

<main class="myevents-main" style="background-color: white">
    <section class="jumbotron text-center" style="background-image: url('img/header_bg.jpg')">
        <div class="container">
            <h1 class="jumbotron-heading">My Events</h1>
            <p class="lead text-muted">Have something exciting planned?</p>
        </div>
    </section>
    <div class="container">
        <div class="new-event-button">
         <a href="newevent.php" id="btn_addEvent" class="btn btn-info">New Event</a>
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="card text-black">
                    <img src="img/logo.jpg" class="card-img" alt="sample1">
                    <div class="card-img-overlay">
                        <h5 class="card-title" id="card-event">Lana's Birthday</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card text-black">
                    <img src="img/logo.jpg" class="card-img" alt="sample1">
                    <div class="card-img-overlay">
                        <h5 class="card-title" id="card-event">Joe's Bachelors</h5>
                    </div>
                </div>

            </div>
            <div class="col-sm">
                <div class="card text-black">
                    <img src="img/logo.jpg" class="card-img" alt="sample1">
                    <div class="card-img-overlay">
                        <h5 class="card-title" id="card-event">Mariana's Graduatio</h5>
                    </div>
                </div>

            </div>
        </div>
    </div>


</main>


</body>

