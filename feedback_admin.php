<?php
include "classes/Database.php";
include "classes/Feedback.php";

// vars
$dbcon =  Database::getDb();
$fb = new Feedback($dbcon);

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
        <div class="jumbotron">
            <h1>Feedback_admin</h1>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>user</th>
                    <th>title</th>
                    <th>Operate</th>
                </tr>

                </thead>
                <tbody>
                <?php
                $feedbacks = $fb->listFeedback();

                foreach ($feedbacks as $feedback) {

                    $id = $feedback["FeedbackId"];

                    echo "<tr><td>";
                    echo $feedback["username"];

                    echo "</td><td>";

                    echo "<a href='feedback_detail.php?FeedbackId=$id'>";
                    echo $feedback['Title'];
                    echo "</a></td><td>";

                    // admins do not need to add feedback.
//                    echo "<a href='feedbackAdd.php' class='addLink'>add</a>";
//                    echo "/";
                    echo "<a onclick='return confirm(\"Are you sure you want to delete?\")' href='feedback_delete.php?FeedbackId=$id' class='btn btn-danger'>delete</a>";

                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>

        </div>
    </div>
</main>

<?php include "nav_footer.php" ?>

</body>

</html>