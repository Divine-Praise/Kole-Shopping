<?php

    require "../config/function.php";

    $paraResultId = checkParamId('id');

   if(is_numeric($paraResultId)){

    $messageId = validate($paraResultId);

    $message = getById('a_message', $messageId);
    if($message['status'] == 200){
        $adminDelete = delete('a_message', $messageId);
        if($adminDelete){
            redirect('Amessage.php', 'Message Deleted');
        }else{
            redirect('Amessage.php', 'Something Went Wrong');
        }
    }else{
        redirect('Amessage.php', $message['message']);
    }
    // echo $messageId;

   }else{
        redirect('Amessage.php', 'Something Went Wrong');
   }


?>