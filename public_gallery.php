<?php
require_once 'classes/Database.php';
require_once 'classes/Query.php';

$dbcon = Database::getdb();
$gallery = new Query($dbcon);
$list = $gallery->public_gallery();
//var_dump($list);
session_start();
$name = false;
if($_SESSION){
    if($_SESSION['username'] == 'admin'){
        $name = true;
    }
    if(isset($_POST['Delete'])){
        $id = $_POST['id'];
        var_dump($id);
        $gallery->delete_pic($id);
        header('Location:public_gallery.php');

    }
}


?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Public Gallery</title>
    <meta charset="utf-8">
    <script src="https://kit.fontawesome.com/4e714b0be7.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/4e714b0be7.js" crossorigin="anonymous"></script>
</head>
<body>
<?php include "nav_header.php" ?>

<main role="main" style="background-image:url('upload_gallery/bk.jpg')">
    <div class="album py-5 bg-light" style="background-image:url('upload_gallery/bk.jpg')">
        <div class="container" >
            <div class="row">
                <?php foreach ($list as $l){?>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img  src="<?= $l->image_path; ?>" class="card-img-top" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text" style="color:white"><?= $l->posts." <span style='color:blue'>".$l->tag_name ."</span>" ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <?php if($name == true){?>
                                    <form action="">
                                        <input type="hidden" name="id" value="<?= $l->id;?>"/>
                                        <input type="submit" name="username" style="color:white" value="<?= $l->username; ?>" class="btn btn-sm-outline-secondary" />
                                    </form>
                                    <form action="" method="post">
                                        <input type="hidden" name="id" value="<?= $l->id; ?>"/>
                                        <button type="submit" style="color:white" name="Delete" value="Delete" class="btn btn-sm-outline-secondary" onClick="javascript: return confirm('Are you really want to delete this?');"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                    <form action="edit_pic.php" method="post">
                                        <input type="hidden" name="id" value="<?= $l->id; ?>"/>
                                        <button type="submit" style="color:white" name="Edit" value="Edit" class="btn btn-sm-outline-secondary" ><i class="far fa-edit"></i></button>
                                    </form>
                                    <?php }else{?>
                                        <form action="">
                                            <input type="hidden" name="id" value="<?= $l->id;?>"/>
                                            <input type="submit" name="username" style="color:white" value="<?= $l->username; ?>" class="btn btn-sm-outline-secondary" />
                                        </form>
                                    <?php }?>
                                </div>
                                <br/>
                                <small class="text-muted" style="color:white"><?= $l->post_date; ?></small>
                            </div>
                        </div>
                    </div>
                </div>
                <?php };?>
            </div>
        </div>
    </div>

</main>

<?php include "nav_footer.php" ?>
</body>
</html>



