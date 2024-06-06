<?php

    require "../config/function.php";

    $paraResultId = checkParamId('id');

   if(is_numeric($paraResultId)){

    $alertId = validate($paraResultId);

    $alert = getById('trx_notification', $alertId);
    if($alert['status'] == 200){
        $response = delete('trx_notification', $alertId);
        if($response){
            redirect('view-all-alert.php', 'Message Deleted');
        }else{
            redirect('view-all-alert.php', 'Something Went Wrong');
        }
    }else{
        redirect('view-all-alert.php', $alert['message']);
    }

   }else{
        redirect('view-all-alert.php', 'Something Went Wrong');
   }


?>