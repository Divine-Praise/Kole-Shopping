<?php

    require "../config/function.php";

    $paraResultId = checkParamId('id');

   if(is_numeric($paraResultId)){

    $messageId = validate($paraResultId);

    $message = getById('message', $messageId);
    if($message['status'] == 200){
        $adminDelete = delete('message', $messageId);
        if($adminDelete){
            redirect('message.php', 'Message Deleted');
        }else{
            redirect('message.php', 'Something Went Wrong');
        }
    }else{
        redirect('message.php', $message['message']);
    }
    // echo $messageId;

   }else{
        redirect('message.php', 'Something Went Wrong');
   }


?>