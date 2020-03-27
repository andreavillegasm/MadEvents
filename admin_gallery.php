<?php
session_start();
if($_SESSION['username']){
    require_once 'classes/Database.php';
    require_once 'classes/Query.php';
    $dbcon = Database::getDb();
    $gallery_users = new Query($dbcon);
    $users= $gallery_users->admin_gallery();
    $list = $gallery_users->public_gallery();
    foreach($users as $user){
        if($user->username == $_SESSION['username']){
            $user_name = $user->username;
        }
    }
    if(isset($_POST['Delete'])){
        $id = $_POST['id'];
        var_dump($id);
        $gallery_users->delete_pic($id);
        header('Location:admin_gallery.php');

    }
}
else{
    header('Location:login.php');
}


?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Admin Gallery</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="script/view_image.js" type="text/javascript" ></script>
    <style>
        .popup{
            transform: scale(1.2);
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php include "nav_header.php" ?>
<nav>
    <div class="header-navigation" style="background-color:coral">
        <div class="header-nav-content">
            <div class="d-flex justify-content-between align-items-center">
                <div class="nav-link">
                    <a href="add_pic.php" class="btn btn-outline-light">Add More</a>
                </div>
            </div>
        </div>
    </div>
</nav>
<main role="main" style="background-color:coral">

    <section class="jumbotron text-center" style="background-color:coral">
        <div class="container">
            <h1 class="jumbotron-heading"><?= $_SESSION['username']; ?> </h1>
        </div>
    </section>


    <div class="album py-5 bg-light" style="background-image:url('upload_gallery/bk.jpg');">
        <div class="container" id="container">
            <div class="row" id="div_flex">
                <?php foreach($list as $l){
                    if($l->user_name == $_SESSION['username']){
                    ?>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="<?= $l->image_path; ?>" alt="Card image cap" name="image">
                        <div class="card-body">
                            <p class="card-text" style="color:white;"><?= $l->posts." <span style='color:blue'>".$l->tag_name ."</span>"?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <form action="" method="post">
                                        <input type="hidden" name="id" value="<?= $l->id; ?>"/>
                                        <input type="submit" style="color:white" name="Delete" value="Delete" class="btn btn-sm-outline-secondary" onClick="javascript: return confirm('Are you really want to delete this?');"/>
                                    </form>
                                    <form action="edit_pic.php" method="post">
                                        <input type="hidden" name="id" value="<?= $l->id; ?>"/>
                                        <input type="submit" style="color:white" name="Edit" value="Edit" class="btn btn-sm-outline-secondary" />
                                    </form>
                                </div>
                                <small class="text-muted" style="color:white"><?= $l->post_date; ?></small>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }};?>
            </div>
        </div>
    </div>

</main>
<?php include "nav_footer.php" ?>

</body>
</html>


