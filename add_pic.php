<?php
session_start();
if($_SESSION){
    require_once 'classes/Database.php';
    require_once 'classes/Query.php';

    $error ="";
    if(isset($_POST['addpic'])){
        $posts = $_POST['post'];
        $tag_name = $_POST['tag'];
        $userid = $_SESSION['userId'];
        $post_date = date('yy-m-d');

        //validation for the image upload;
        $filename = $_FILES['image']['name'];
        $filesize = $_FILES['image']['size'];
        $fileext = explode('.',$filename);
        $fileActualExt = strtolower(end($fileext));

        $allowed = array('jpg', 'png','jpeg');
        if(in_array($fileActualExt,$allowed)){
            if($filesize < 16777215){
                $image_path = "upload_gallery/";
                $image_path = $image_path. $_FILES['image']['name'];
                if(move_uploaded_file($_FILES['image']['tmp_name'], $image_path)){
                    $dbcon = Database::getDb();
                    $gallery_users = new Query($dbcon);
                    $gallery_users->add_pic($userid,$posts, $tag_name, $image_path, $post_date);
                    header('Location:admin_gallery.php');
                }else{
                    echo "File cannot be uploaded";
                }
            }else{
                $error = "Your file is too big!!!";
            }
        }else{
            $error = "Please make a valid input";
        }

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
        <div class="form-group">
            <label  style="color:white" for="image">Image:</label>
            <input type="file" class="form-control" name="image" id="image"/>
        </div>
        <div class="form-group">
            <label style="color:white" for="post">Image description:</label>
            <input type="text" class="form-control" id="post" name="post"
                   value="" placeholder="write something">
        </div>
        <div class="form-group">
            <label style="color:white" for="tag">Tag:</label>
            <input type="text" class="form-control" id="tag" name="tag"
                   value="" placeholder="write something">
        </div>
        <input type="Submit" class="btn btn-outline-light" name="addpic" value="Add" id="add"/>
    </form>
</div>
</main>
<?php include "nav_footer.php" ?>
</body>
</html>
