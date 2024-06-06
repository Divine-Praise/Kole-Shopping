<?php

    require "../config/function.php";

    $paraResultId = checkParamId('id');

   if(is_numeric($paraResultId)){

    $billInfoId = validate($paraResultId);

    $billInfo = getById('bill_info', $billInfoId);
    if($billInfo['status'] == 200){
        $response = delete('bill_info', $billInfoId);
        if($response){
            redirect('billing.php', 'Billing Info Deleted Successfully');
        }else{
            redirect('billing.php', 'Something Went Wrong');
        }
    }else{
        redirect('billing.php', $billInfo['message']);
    }

   }else{
        redirect('billing.php', 'Something Went Wrong');
   }


?>