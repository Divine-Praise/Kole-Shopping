<?php 

include('../config/function.php');

$paraResultId = checkParamId('id');

if(is_numeric($paraResultId)){

    $messageId = validate($paraResultId);

    $message = getById('message', $messageId);
    if($message['status'] == 200){

        $msgStatus = 'read';

        $data = [
            'status' => $msgStatus
        ];

        $result = update('message', $messageId, $data);
        if($result){
            header("location: Cmessage-view.php?id=".$messageId);
        }

    }else{
        redirect('Cmessage.php', $message['message']);
    }
    // echo $messageId;

}else{
     redirect('Cmessage.php', 'Something Went Wrong');
}

?>
