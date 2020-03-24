<?php
include "classes/Database.php";
include "classes/Feedback.php";

// vars
$isPostBack = false;
$displayNoneClassName = "d-none";
$userid = $title = $content = "";


// if is post back
if(isset($_POST["submit"])){
    // validation
    $userid = $_POST['user_id'];
    $title = $_POST['feedback_title'];
    $content = $_POST['feedback_content'];
    if($userid == ""){
        // should log in
        header("Location: login.php");
    }else if ($title != "" && $content != "") {

        $db = new Database();
        $dbcon = $db->getDb();

        $fb = new Feedback($dbcon);
        $count = $fb->addFeedback($userid, $title, $content);

        if ($count) {
            $isPostBack = true;
        } else {
            echo "problem adding feedback";
        }
    }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

<?php include "nav_header.php" ?>

<main id="main">
    <div class="container">
        <div class="jumbotron <?php if($isPostBack){echo $displayNoneClassName; }?>">
            <h1>Feedback</h1>
            <b>please tell us your experience for our website</b>
            <form method="post" action="feedback.php">
                <input type="text" class="d-none" id="user_id" name="user_id" value="1"/>

                <div class="form-group">
                    <label for="feedback_title">Feedback Title:</label>
                    <input type="text" class="form-control" id="feedback_title" name="feedback_title" required/>
                </div>
                <div class="form-group">
                    <label for="feedback_content">Feedback Content:</label>
                    <textarea class="form-control" id="feedback_content" name="feedback_content" required></textarea>
                </div>
                <div class="submit">
                    <button type="submit" name="submit" class="btn btn-info">Submit feedback</button>
                </div>
            </form>
        </div>
        <div class="jumbotron <?php if(!$isPostBack){echo $displayNoneClassName; }?>">
            <h1>Feedback</h1>
            <div class="display-4 pb-3">Thank you for submitting!</div>
            <a class="btn btn-dark" href="index.php">Home</a>
        </div>
    </div>
</main>

<?php include "nav_footer.php" ?>

</body>

</html>