<?php

    require "../config/function.php";

    $paraResultId = checkParamId('id');

   if(is_numeric($paraResultId)){

    $cardId = validate($paraResultId);

    $card = getById('card', $cardId);
    if($card['status'] == 200){
        $response = delete('card', $cardId);
        if($response){
            redirect('billing.php', 'Card Deleted Successfully');
        }else{
            redirect('billing.php', 'Something Went Wrong');
        }
    }else{
        redirect('billing.php', $card['message']);
    }

   }else{
        redirect('billing.php', 'Something Went Wrong');
   }


?>