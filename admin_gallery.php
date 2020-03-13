<?php
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Admin Gallery</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<header>
    <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <strong>User Name</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>

<main role="main">

    <section class="jumbotron text-center" style="background-image: url('image/1_gallery_background.jpg')">
        <div class="container">
            <h1 class="jumbotron-heading">User Name</h1>
            <p class="lead text-muted">User Description</p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="image/gallery_icon.jpg" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">Image description</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <form action="view.php">
                                        <input type="hidden" name="id" value=""/>
                                        <input type="submit" name="View" value="View" class="btn btn-sm-outline-secondary" />
                                    </form>
                                    <form action="edit.php">
                                        <input type="hidden" name="id" value=""/>
                                        <input type="submit" name="Edit" value="Edit" class="btn btn-sm-outline-secondary" />
                                    </form>
                                </div>
                                <small class="text-muted">Posting Date</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="image/gallery_icon.jpg" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">Image description</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <form action="view.php">
                                        <input type="hidden" name="id" value=""/>
                                        <input type="submit" name="View" value="View" class="btn btn-sm-outline-secondary" />
                                    </form>
                                    <form action="edit.php">
                                        <input type="hidden" name="id" value=""/>
                                        <input type="submit" name="Edit" value="Edit" class="btn btn-sm-outline-secondary" />
                                    </form>
                                </div>
                                <small class="text-muted">Posting Date</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="image/gallery_icon.jpg" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">Image description</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <form action="view.php">
                                        <input type="hidden" name="id" value=""/>
                                        <input type="submit" name="View" value="View" class="btn btn-sm-outline-secondary" />
                                    </form>
                                    <form action="edit.php">
                                        <input type="hidden" name="id" value=""/>
                                        <input type="submit" name="Edit" value="Edit" class="btn btn-sm-outline-secondary" />
                                    </form>
                                </div>
                                <small class="text-muted">Posting Date</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="#">Back to top</a>
        </p>
    </div>
</footer>
</body>
</html>


