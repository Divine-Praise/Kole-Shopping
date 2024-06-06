<?php 

include('../config/function.php');

$paraResultId = checkParamId('id');

if(is_numeric($paraResultId)){

    $messageId = validate($paraResultId);

    $message = getById('a_message', $messageId);
    if($message['status'] == 200){

        $msgStatus = 'read';

        $data = [
            'status' => $msgStatus
        ];

        $result = update('a_message', $messageId, $data);
        if($result){
            header("location: Amessage-view.php?id=".$messageId);
        }

    }else{
        redirect('Amessage.php', $message['message']);
    }
    // echo $messageId;

}else{
     redirect('Amessage.php', 'Something Went Wrong');
}

?>
