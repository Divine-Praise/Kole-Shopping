<?php

include('../config/function.php');

require_once '../vendor/autoload.php';

$host = "smtp.gmail.com";
$port = "587";
$sslOrTls = "tls";

$setUsername = "kolestore123@gmail.com";
$setPassword = "xgzq rpyq ydjp znlw";

$emailAddress = "kolestore123@gmail.com";
$sendEmailAddress = "kolestore123@gmail.com";
$subject = "You've got a new message";

if(isset($_POST['sendMessageBtn'])){
    $s_name = validate($_POST['s_name']);
    $s_email = validate($_POST['s_email']);
    $s_message = validate($_POST['s_message']);

    if($s_name != '' || $s_email != '' || $s_message != '')
    {
        $bodyContent = '
        <div>
            <h4>Name: '.$s_name.'</h4>
            <h4>Email: '.$s_email.'</h4>
            <h4>Comment/Message: '.$s_message.'</h4>
        </div>';

            // Create the Transport
            $transport = (new Swift_SmtpTransport($host, $port, $sslOrTls))
            ->setUsername($setUsername)
            ->setPassword($setPassword)
            ;

            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($subject);

            // Create a message
            $message = (new Swift_Message('Wonderful Subject'))
            ->setFrom([$emailAddress => 'Kole Store'])
            ->setTo([$sendEmailAddress])
            ->setBody($bodyContent, 'text/html')
            ;

            // Send the message
            $mailResult = $mailer->send($message);
    ;
            $data = [
                's_name' => $s_name,
                's_email' => $s_email,
                's_message' => $s_message
            ];

            $result = insert('message', $data);
            if($result || $mailResult){
                jsonResponse(200, 'success', 'Message Sent');
            }else{
                jsonResponse(500, 'error', 'Something Went Wrong!');
            }
    }
    else
    {
        jsonResponse(422, 'warning', 'Please Fill required fields');
    }
}

?>