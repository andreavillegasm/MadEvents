<?php
//require_once 'message.php';
require_once 'Class/Database.php';
require_once 'Class/Email.php';
require_once 'message.php';
$dbcon = Database::getDb();
$mail = new Email($dbcon);
$emails = $mail->emails();

foreach($emails as $email){
    $date = $email->event_date;
    $time= $email->event_time;
    //match the event time with email time
    $event_time1 = date('H:i:s', strtotime('-1 hour',strtotime($time)));
    $event_time2 = date('H:i:s', strtotime('-1 hour 5 minutes',strtotime($time)));

    var_dump($event_time1);
    var_dump($event_time2);
    $from_address = 'eplanner470@gmail.com';
    $from_name = 'Mad Event';
    $subject = 'Event Reminder';
    $body = '<h1>Gentle Reminder</h1>'.
        '<p>This is just a kind reminder to let you know that we are expecting your arrival in next one hour at our event location.<br/>

All of your friends are eagerly awaiting for your visit.<br/>

Thank you for choosing. <br/>

Mad_Event

</p>'.
        '<p>Sincerely</p>'.
        '<p>Event Planner (Mad_Event)</p>';
    $is_body_html = 'true';


    //get the time and date from the system;
    $DATE = new DateTime(date('Y-m-d H:i:s'),new DateTimeZone('UTC'));
    $DATE->setTimezone(new DateTimeZone('America/New_York'));
    $local_time = $DATE->format('H:i:s');
    $local_date = $DATE->format('Y-m-d');
    //One hour back form the original time;
    //$email_time = date('H:i:s',strtotime('-1 hour',strtotime($local_time)));

    //$date == $local_date && $event_time == $local_time
//send the mail

    if($date == $local_date){

        if($event_time1 <= $local_time && $event_time2 >= $local_time){
            $to_name = $email->friend_first_name. $email->friend_middle_name. $email->friend_last_name;
            $to_address = $email->friend_email;
            var_dump($to_address);
            var_dump($to_name);
            try{
                send_email($to_address, $to_name, $from_address, $from_name,$subject, $body, $is_body_html);
            }catch(Exception $e){
                header('Location:Error_mail.php');
            }
        }

    }



}
//local time = 4 pm
//event time = 4pm
//event time = 4pm -1 = 3pm
//
//get the local time = 3pm (1 hour before the event time)