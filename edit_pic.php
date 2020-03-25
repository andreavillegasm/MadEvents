<?php
session_start();
$error="";
if($_SESSION){
    require_once 'Class/Connection.php';
    require_once 'Class/Query.php';
    $dbcon  = Connection::getDb();
    $gallery_listing = new Query($dbcon);
    if(isset($_POST['Edit'])){
        $id = $_POST['id'];
        //var_dump($id);

        $values = $gallery_listing->edit_pic($id);
        //var_dump($values);
        $tags = $values->tag_name;
        $posts = $values->posts;
        $images = $values->image;
    }
    if(isset($_POST['editpic'])){
        $postdescription = $_POST['post'];
        $tagdescription = $_POST['tag'];
        $id = $_POST['idfield'];


        $gallery_listing->update_pic($postdescription, $tagdescription, $id);
        header('Location:admin_gallery.php');

    }
}
else{
    header('Location:signup.html');
}
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
<header>
    <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
            <a href="index.html" class="navbar-brand d-flex align-items-center">
                <strong>Mad Event</strong>
            </a>
            <a href="public_gallery.php" class="navbar-brand d-flex align-items-center">Gallery</a>
            <a href="add_pic.php" class="navbar-brand d-flex align-items-center">Add More</a>
            <a href="admin_gallery.php" class="navbar-brand d-flex align-items-center">
                My Profile
            </a>
            <form method="post" action="" >
                <input type="submit" name="logout"  value="Logout" />
            </form>
        </div>
    </div>
</header>

<main role="main">

    <section class="jumbotron text-center" style="background-color:lightcoral">
        <div class="container">
            <h1 class="jumbotron-heading"><?= $_SESSION['username']; ?> </h1>
        </div>
    </section>
    <div class="container">
        <!--    Form to Add  post -->
        <sapn style="color:red"><?=$error; ?></sapn>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="idfield" value="<?= $id; ?>"/>
            <div class="form-group">
                <img class="card-img-top" src="data:image/jpeg;base64,<?= base64_encode($images); ?>" style="width:500px" alt="Card image cap">
            </div>
            <div class="form-group">
                <label for="post">Image description:</label>
                <input type="text" class="form-control" id="post" name="post"
                       placeholder="write something" value="<?= $posts; ?>">
            </div>
            <div class="form-group">
                <label for="tag">Tag:</label>
                <input type="text" class="form-control" id="tag" name="tag"
                       value="<?= $tags; ?>" placeholder="write something">
            </div>
            <input type="Submit" name="editpic" value="Edit" id="edit"/>
        </form>
    </div>
</main>
</body>
</html>

