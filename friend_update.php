<?php
require 'nav_header.php';

require_once 'classes/Database.php';
require_once 'classes/Guest.php';

//Get the database connection
$dbconn = Database::getDb();
$f = new Guest($dbconn);


$fname= $mname = $lname = $email = $phone = "";
$inputvariables = [$fname, $mname, $lname, $email, $phone];
$count = 0;

if(isset($_POST['updateFriend'])){

    //Get the event id
    $id = $_POST['id'];

    //Get the information for the autofill
    $friends = $f->updateInfo($id);

    //Inputted the returned values
    foreach ($friends as $info){

        $inputvariables[$count] = $info;
        $count++;
    }
}
if(isset($_POST['updatFriend'])) {
    $fname = $_POST['first'];
    $mname = $_POST['middle'];
    $lname = $_POST['last'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $id = $_POST['fid'];

    $f->updateFriend($fname, $mname, $lname, $email, $phone, $id);


}

?>

<html lang="en">

<head>
    <title>Update Friend</title>
    <link rel="stylesheet" href="css/myevent.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>


<body>
    <main style="background-image: url('img/friends_bg.jpg');background-size: 65%; " class="main-friends">
        <div class="container">
            <div class="friend-container">
            <h1 class="main-title">Update Friend</h1>
            <div>
                <!--    Form to Update Friend -->
                <form action="" method="post">
                    <input type="hidden" name="fid" value="<?= $id; ?>" />
                    <div class="form-group">
                        <label for="first">First Name:</label>
                        <input type="text" class="form-control" name="first" id="first" value="<?= $inputvariables[0]; ?>"
                               placeholder="Enter first name">
                        <span style="color: red">

                        </span>
                    </div>
                    <div class="form-group">
                        <label for="middle">Middle Name:</label>
                        <input type="text" class="form-control" id="middle" name="middle"
                               value="<?= $inputvariables[1]; ?>" placeholder="Enter middle name">
                        <span style="color: red">

                        </span>
                    </div>
                    <div class="form-group">
                        <label for="last">Last Name:</label>
                        <input type="text" name="last" value="<?= $inputvariables[2]; ?>" class="form-control"
                               id="last" placeholder="Enter last name">
                        <span style="color: red">

                        </span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" name="email" value="<?= $inputvariables[3]; ?>" class="form-control"
                               id="email" placeholder="Enter email">
                        <span style="color: red">

                        </span>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" name="phone" value="<?= $inputvariables[4]; ?>" class="form-control"
                               id="phone" placeholder="Enter phone">
                        <span style="color: red">

                        </span>
                    </div>
                    <div class="button-center">
                        <button type="submit" name="updatFriend"
                                class="btn btn-info" id="bttn-submit">
                            Update Friend
                        </button>
                    </div>
                    <div class="back-link">
                        <a href="FriendsList.php" id="bttn-back" class="back">Back</a>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </main>
</body>
</html