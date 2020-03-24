<?php

include "classes/Database.php";
include "classes/Feedback.php";

// check id form is submitted
if (isset($_GET["FeedbackId"])) {

// get id value
    $id = $_GET["FeedbackId"];

// prepare, bind, execute
    $db = new Database();
    $dbcon = $db->getDb();

    $fb = new Feedback($dbcon);
    $count = $fb->deleteFeedback($id);

    // go back to list page
    if ($count) {
        header('Location: feedback_admin.php');
    } else {
        echo "problem deleting";
    }

}
