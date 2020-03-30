<?php
$error="";
if($_SESSION){
    require_once 'classes/Database.php';
    require_once 'classes/Query.php';
    $dbcon  = Database::getDb();
    $gallery_listing = new Query($dbcon);
    if(isset($_POST['Edit'])){
        $id = $_POST['id'];
        //var_dump($id);

        $values = $gallery_listing->edit_pic($id);
        //var_dump($values);
        $tags = $values->tag_name;
        $posts = $values->posts;
        $images = $values->image_path;
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
    header('Location:login.php');
}
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
<?php include "nav_header.php" ?>

<main role="main">

    <section class="jumbotron text-center" style="background-color:coral">
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
                <img class="card-img-top" src="<?= $images; ?>" style="width:500px" alt="Card image cap">
            </div>
            <div class="form-group">
                <label for="post" style="color:white">Image description:</label>
                <input type="text" class="form-control" id="post" name="post"
                       placeholder="write something" value="<?= $posts; ?>">
            </div>
            <div class="form-group">
                <label for="tag" style="color:white">Tag:</label>
                <input type="text" class="form-control" id="tag" name="tag"
                       value="<?= $tags; ?>" placeholder="write something">
            </div>
            <input type="Submit" class="btn btn-outline-light" name="editpic"  value="Edit" id="edit"/>
        </form>
    </div>
</main>
<?php include "nav_footer.php" ?>
</body>
</html>

