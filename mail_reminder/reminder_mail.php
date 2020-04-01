<?php
//require_once 'message.php';
require_once 'Class/Database.php';
require_once 'Class/Email.php';
require_once 'message.php';
$dbcon = Database::getDb();
$mail = new Email($dbcon);
$emails = $mail->user_email();
var_dump($emails);
foreach($emails as $email){
    $to_name = $email->username;
    $to_address = $email->email;
    $from_address = 'eplanner470@gmail.com';
    $from_name = 'Event Planner';
    $subject = 'Welcome to Event Planner';
    $body = '<p>Thanks for registering with our site. we make your events better</p>'.
        '<p>Sincerely</p>'.
        '<p>Event Planner (Mad_Event)</p>';
    $is_body_html = 'true';

//send the email
    try{
        send_email($to_address, $to_name, $from_address, $from_name,$subject, $body, $is_body_html);
        include 'success.php';
    }catch(Exception $e){
        include 'signup.php';
    }
}
