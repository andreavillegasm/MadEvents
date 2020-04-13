<?php
require_once 'classes/Database.php';
require_once 'classes/Query.php';

function addComments() {
    if (isset($_POST['commentSubmit'])) {
        // echo "TEST";
        $uid = $_SESSION['userId'];
        $username = $_POST['username'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        
        $dbcon = Database::getDb();
        $cs = new Query($dbcon);

        if (isset($_SESSION['userId'])) {
            $comments = $cs->setComments($uid, $username, $date, $message);
        } else {
            echo '<div class="alert alert-danger" role="alert">
                    Please Sign in to comment. <a href="login.php">Login</a>
                </div>';
        }

    }
}

function showCommments() {
    $dbcon = Database::getDb();
    $cs = new Query($dbcon);
    $comments = $cs->getComments();
    // $deleteComments = $cs->deleteComments($commentid);
 
    if ($_SESSION['username'] != 'admin') {
        foreach ($comments as $row) {
            echo "<li class='comment'><div class='comment-section-body'>";
            echo "<strong class='text-success'>".$row['username']." " ."</strong>";
            echo "<span class='text-muted pull-right'>";
            echo "<small class='text-muted'>".$row['date_create']."</small>";
            echo "</span>";
            echo "<p>";
            echo $row['message'];
            echo "</p>";
            echo "</div>";
            echo "</li>";
        }
    } else {
        echo "<li class='comment'><div class='comment-section-body'>";
        echo "<strong class='text-success'>".$row['username']." " ."</strong>";
        echo "<span class='text-muted pull-right'>";
        echo "<small class='text-muted'>".$row['date_create']."</small>";
        echo "<div class='float-right'><button type='button' class='btn btn-danger'>Delete</button></div>";
        echo "</span>";
        echo "<p>";
        echo $row['message'];
        echo "</p>";
        echo "</div>";
        echo "</li>";
    }

}