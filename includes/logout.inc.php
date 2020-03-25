<?php
session_start();
//delete all vlues in the session variables
session_unset();

//destroy all the sessions
session_destroy();

header("Location: ../index.php");
