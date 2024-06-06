<?php

    require "../config/function.php";

    $paraResultId = checkParamId('id');

   if(is_numeric($paraResultId)){

    $messageId = validate($paraResultId);

    $message = getById('message', $messageId);
    if($message['status'] == 200){
        $adminDelete = delete('message', $messageId);
        if($adminDelete){
            redirect('Cmessage.php', 'Message Deleted');
        }else{
            redirect('Cmessage.php', 'Something Went Wrong');
        }
    }else{
        redirect('Cmessage.php', $message['message']);
    }
    // echo $messageId;

   }else{
        redirect('Cmessage.php', 'Something Went Wrong');
   }


?>