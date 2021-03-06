<?php
include "nav_header.php";
include "includes/islogin.php";
?>
<main id="main">

    <div class="container">

        <div class="jumbotron">
            <h1>Feedback_admin</h1>
            <?php
            // includes
            include "classes/Database.php";
            include "classes/Feedback.php";

            // update
            if (isset($_POST['update'])){

                $dbcon = Database::getDb();
                $fb = new Feedback($dbcon);

                $feedbacks = $fb->updateFeedback($_GET['FeedbackId'], $_POST['title'], $_POST['content']);
//                header("Location: feedback_admin.php");
                $url = "feedback_admin.php";
                echo "<script type='text/javascript'>";
                echo "window.location.href='$url'";
                echo "</script>";
            }
            // show details
            if (isset($_GET["FeedbackId"])) {


                $dbcon = Database::getDb();
                $fb = new Feedback($dbcon);

                $feedbacks = $fb->listFeedbackDetail($_GET["FeedbackId"]);

//                echo "<table class='table'><thead><tr><td>User</td><td>Title</td><td>Content</td><td>Status</td></tr></thead><tbody class='table-striped'>";
                echo "<table class='table'><thead><tr><td>User</td><td>Title</td><td>Content</td></tr></thead><tbody class='table-striped'>";

                foreach ($feedbacks as $feedback) {

//                    if($feedback['status']==0){
//                        $status="pending";
//                        $class="bg-warning";
//                    }else{
//                        $status="fixed";
//                        $class="bg-success";
//                    }
                    echo "<form action='' method='POST'>";
                    $id = $feedback["id"];

//                    echo "<tr class='$class'><td>";
                    echo "<tr><td>";
                    echo $feedback['username'];
                    echo "</td><td>";
                    $title = $feedback['title'];
                    echo "<input type='text' name='title' value='" . $title . "'>";

                    echo "</td><td>";

                    $content = $feedback['content'];
                    echo "<input type='text' name='content' value='" . $content . "'>";
//                    echo "</td><td>";

//                    echo $status;
                    echo "</td></tr>";
                    echo "<button type='submit' class='btn btn-primary' name='update'>Update</button>";
                    echo "</form>";
                }
                echo "</tbody></table>"; ?>

                <!--                <form action="" method="post">-->
                <!--                    <div class="form-group">-->
                <!--                        <label for="addMessage">Feedback</label>-->
                <!--                        <textarea name="addMessage" id="addMessage" class="form-control"></textarea>-->
                <!--                    </div>-->
                <!--                    <input type="submit" name="submit" value="submit" class="btn btn-primary"/>-->
                <!--                </form>-->
                <?php

                echo "<a onclick='return confirm(\"Are you sure you want to delete?\")' href='feedback_delete.php?FeedbackId=$id' class='btn btn-danger'>Delete</a>";
            }
            ?>

            <a href="feedback_admin.php" class="btn btn-dark">Back</a>

        </div>
    </div>
</main>

<?php include "nav_footer.php"; ?>
