<?php

    require "../config/function.php";

    $paraResultId = checkParamId('id');

   if(is_numeric($paraResultId)){

    $alertId = validate($paraResultId);

    $alert = getById('trx_notification', $alertId);
    if($alert['status'] == 200){
        $status = 'raed';
        $data = [
            'msg_status' => $status
        ];

        $adminDelete = update('trx_notification', $alertId, $data);
        if($adminDelete){
            // redirect('view_trx.php', 'Admin Deleted Successfully');
            header("Location: view_trx.php?id=$alertId");
        }else{
            redirect('all-alert.php', 'Something Went Wrong');
        }
    }else{
        redirect('all-alert.php', $alert['message']);
    }
    // echo $alertId;

   }else{
        redirect('all-alert.php', 'Something Went Wrong');
   }


?>