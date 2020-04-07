<?php
session_start();
$user_id =$_SESSION['userid'];

require_once 'mail_reminder/Class/Database.php';
require_once 'mail_reminder/Class/Email.php';
require_once 'mail_reminder/message.php';

$dbcon = Database::getDb();
$mail = new Email($dbcon);

//GET THE EMAIL FOR THE SENDER
$user_info =  $mail->getUser($user_id);



if (isset($_POST['addGuest'])) {

    //Receive evetn id and friend id from the form
     $event_id = $_POST['eid'];
     $friend_id = $_POST['fid'];

    //ADD FRIEND INTO THE GUEST LIST
    $mail->addGuest($event_id, $friend_id);

    //SEND THE EMAIL TO THAT FRIEND

    //Get the info from that event
    $event_info = $mail->infoEvent($event_id);
    $friend_info = $mail->infoFriend($friend_id);

    //echo $friend_info->friend_first_name;


//THINGS I NEED
    $from_address = 'eplanner470@gmail.com';
    $from_name = 'Mad Event';
    $subject = 'Invitation '.$event_info->event_name;
    $body = '<h1>You are invited to '.$event_info->event_name.' </h1>'.
        '<p>Dear '.$friend_info->friend_first_name.', <br/>

        Please save the date! You are kindly invited to our event <br/>
        
        Date: '.$event_info->event_date.'<br/>
          
        Time: '.$event_info->event_time .'<br/>
         
        Location: '.$event_info->name .'<br/>
        
        Address: '.$event_info->address .'<br/>
        
        Please RSVP to '.$user_info->email .'<br/>

        We hope to see you there!<br/>


        </p>'.
        '<p>Sincerely, </p>'.
        '<p>user name</p>';
    $is_body_html = 'true';

    $to_name = $friend_info->friend_first_name.' '.$friend_info->friend_middle_name.' '.$friend_info->friend_last_name;
    $to_address = $friend_info->friend_email;
    var_dump($to_address);
    var_dump($to_name);
    try{
        send_email($to_address, $to_name, $from_address, $from_name, $subject, $body, $is_body_html);
        header('Location: event_dashboard.php');

    }catch(Exception $e){
        header('Location:Error_mail.php');
    }

}


