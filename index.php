<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Marck+Script&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/c7c508e324.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <title>Home</title>
</head>

<body>

<?php include "nav_header.php" ?>

<main>
    <div class="container-custom">

        <div class="text-light general-title">
            <h1>Upcoming Events</h1>
        </div>

        <div class="row">
            <div class="col">
                <div class="card border-0">
                    <img class="card-img-top" src="img/sign.jpg" alt="Card image cap">
                    <div class="card-body card-content">
                        <p class="card-text text-light">Some quick example text to build on the card title and make
                            up the bulk
                            of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0">
                    <img class="card-img-top" src="img/breath.jpg" alt="Card image cap">
                    <div class="card-body card-content">
                        <p class="card-text text-light">Some quick example text to build on the card title and make
                            up the bulk
                            of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0">
                    <img class="card-img-top" src="img/coffee.jpg" alt="Card image cap">
                    <div class="card-body card-content">
                        <p class="card-text text-light">Some quick example text to build on the card title and make
                            up the bulk
                            of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0">
                    <img class="card-img-top" src="img/pineapple.jpg" alt="Card image cap">
                    <div class="card-body card-content">
                        <p class="card-text text-light">Some quick example text to build on the card title and make
                            up the bulk
                            of the card's content.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div id="happening-now" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/coffee-carousel.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/sign-carousel.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/breath-carousel.jpg" alt="Third slide">
            </div>

            <div class="happening-now-text container-custom">
                <h2>Happening Now</h2>
                <p>Some quick example text to build on the card title and make up the bulk of the card's content.
                </p>
                <button type="button" class="btn-general">Read More</button>
            </div>
        </div>
    </div>

    <div class="newsletter container-custom">
        <div class="row">
            <div class="col">
                <h2 class="text-light">Subscribe to our newsletter</h2>
                <p class="text-light">Sign up with your email address to receive future events and updates</p>
            </div>
            <div class="col">
                <div class="form-newsletter">
                    <input type="text" placeholder="Email Address">
                    <button type="button" class="btn-general">Submit</button>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include "nav_footer.php" ?>

</body>

</html>