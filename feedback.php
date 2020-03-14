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
            <h1>Feecback</h1>
            <b>please tell us your experience for our website</b>
            <form method="post" action="eventdashboard.php">
                <div class="form-group">
                    <label for="feedback_title">Feedback Title:</label>
                    <input type="text" class="form-control" id="feedback_title" name="feedback_title"/>
                </div>
                <div class="form-group">
                    <label for="feedback_content">Feedback Content:</label>
                    <textarea class="form-control" id="feedback_content" name="feedback_content">
                    </textarea>
                </div>
                <div class="submit">
                    <button type="submit" class="btn btn-info">Create</button>
                </div>
            </form>
        </div>
    </div>
</main>

<?php include "nav_footer.php" ?>

</body>

</html>