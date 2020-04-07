<?php
session_start();
if ($_SESSION['username']) {
    require 'nav_header.php';
    require_once 'classes/Database.php';
    require_once 'classes/Guest.php';

    $user_id = $_SESSION['userid'];

    $dbconn = Database::getDb();
    $f = new Guest($dbconn);

    $friends = $f->listFriends($user_id);
} else {
    header('Location:login.php');
}

?>


<html lang="en">
<head>
    <title>My Friends</title>
    <link rel="stylesheet" href="css/myevent.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
<main style="background-image: url('img/friends_bg.jpg');background-size: 65%; " class="main-friends">

<div class="container" >
    <div class="friend-container">
        <h1 class="main-title">List of Friends</h1>
    <!--    Displaying Data in Table-->
        <div class="button-center">
            <a href="friend_add.php" id="btn_addFriend" class="btn btn-info">Add Friend</a>
        </div>
        <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($friends as $friend){ ?>
            <tr>

                <th scope="row"><?php echo $friend->friend_first_name. " ".$friend->friend_middle_name." ".$friend->friend_last_name?></th>
                <td><?php echo $friend->friend_email ?></td>
                <td><?php echo $friend->friend_phone ?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $friend->id?>"/>
                        <input type="submit" class="btn btn-success" name="inviteFriend" value="Invite"/>
                    </form>
                </td>
                <td>
                    <form action="friend_update.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $friend->id?>"/>
                        <input type="submit" class="btn btn-warning" name="updateFriend" value="Edit"/>
                    </form>
                </td>
                <td>
                    <form action="friend_delete.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $friend->id?>"/>
                        <input type="submit" class="btn btn-danger" name="deleteFriend" value="Delete"/>
                    </form>
                </td>

            </tr>
        <?php } ?>
        </tbody>
    </table>

    </div>
</div>
</main>
<?
//Adds the footer
include 'nav_footer.php';

?>
</body>
</html>
