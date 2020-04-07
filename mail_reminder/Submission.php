<?php
require_once 'message.php';

if(isset($_POST['signup'])){
    $to_address = $_POST['email'];
    $to_name = $_POST['uid'];
    $from_address = 'eplanner470@gmail.com';
    $from_name = 'Mad Event';
    $subject = 'Event Reminder';
    $body = '<h1>Welcome to Mad Event</h1>'.
        '<p>Thank you for registering with us. Hope we make all of your event the best.<br/>

We do have lots of options to make your event great. Please have a look at our website.<br/>

Regards, <br/>

Mad_Event Team

</p>';
    $is_body_html = 'true';

    try{
        send_email($to_address, $to_name, $from_address, $from_name,$subject, $body, $is_body_html);
    }catch(Exception $e){
        header('mail_reminder/Location:Error_mail.php');
    }
}

?>