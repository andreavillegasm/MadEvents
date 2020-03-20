<?php
require 'nav_header.php';


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
            <tr>
                <th scope="row">Mariana Villegas Mayorga</th>
                <td>mariana@villegas.com</td>
                <td>132-555-8888</td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" value=""/>
                        <input type="submit" class="btn btn-warning" name="updateFriend" value="Edit"/>
                    </form>
                </td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" value=""/>
                        <input type="submit" class="btn btn-danger" name="deleteFriend" value="Delete"/>
                    </form>
                </td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" value=""/>
                        <input type="submit" class="btn btn-success" name="inviteFriend" value="Invite"/>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
    <a href="AddFriend.php" id="btn_addFriend" class="btn btn-info">Add Friend</a>
    </div>
</div>
</main>
</body>
</html>
