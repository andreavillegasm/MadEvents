<?php

//var_dump($_SESSION);
// if is login in
if(!isset($_SESSION["userId"])){
//    header("Location: login.php");
//    cant really use header sometimes, cause nav_header.php already has header tag.

    $url = "login.php";
    echo "<script type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";

}