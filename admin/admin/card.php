<?php 

include('../config/function.php');

if(isset($_POST['cardSelect'])){
    $card = validate($_POST['card']);

    if($card == 'master-card'){
        header("location: master-card.php");
    }
    elseif($card == 'visa-card'){
        header("location: visa-card.php");
    }else{
        redirect('card-type.php', 'please select a card');
    }
}

if(isset($_POST['saveMcardBtn'])){
    $adminId = validate($_POST['admin_id']);
    $cardNumber = validate($_POST['mcard_number']);
    $cardHolder = validate($_POST['card_holder']);
    $card_mm_ex_date = validate($_POST['card_mm_ex_date']);
    $card_yy_ex_date = validate($_POST['card_yy_ex_date']);
    $cardCvv = validate($_POST['card_cvv']);
    $cardType = validate($_POST['card_type']);

    $hashedCvv = password_hash($cardCvv, PASSWORD_BCRYPT); 

    $data = [
        'admin_id' => $adminId,	
        'card_number' => $cardNumber,	
        'card_h_name' => $cardHolder,
        'card_mm_ex_date' => $card_mm_ex_date,
        'card_yy_ex_date' => $card_yy_ex_date,
        'card_cvv' => $hashedCvv,
        'card_type' => $cardType
    ];

    $result = insert('card', $data);

    if($result){

        jsonResponse(200, 'success', 'Card Added Successfully');
        // redirect('billing.php', 'Card Successfully Added to your collection of cards');
    }else{

        jsonResponse(500, 'error', 'Something Went Wrong');
        // redirect('billing.php', 'Something Went wrong');
    }

}

if(isset($_POST['saveVcardBtn'])){
    $adminId = validate($_POST['admin_id']);
    $cardNumber = validate($_POST['vcard_number']);
    $cardHolder = validate($_POST['card_holder']);
    $card_mm_ex_date = validate($_POST['card_mm_ex_date']);
    $card_yy_ex_date = validate($_POST['card_yy_ex_date']);
    $cardCvv = validate($_POST['card_cvv']);
    $cardType = validate($_POST['card_type']);

    $hashedCvv = password_hash($cardCvv, PASSWORD_BCRYPT); 

    $data = [
        'admin_id' => $adminId,	
        'card_number' => $cardNumber,	
        'card_h_name' => $cardHolder,
        'card_mm_ex_date' => $card_mm_ex_date,
        'card_yy_ex_date' => $card_yy_ex_date,
        'card_cvv' => $hashedCvv,
        'card_type' => $cardType
    ];

    $result = insert('card', $data);

    if($result){

        jsonResponse(200, 'success', 'Card Added Successfully');
        // redirect('billing.php', 'Card Successfully Added to your collection of cards');
    }else{

        jsonResponse(500, 'error', 'Something Went Wrong');
        // redirect('billing.php', 'Something Went wrong');
    }

}

if(isset($_POST['updateVcard'])){
    $cardId = validate($_POST['card_id']);
    $cardData = getById('card', $cardId);
    if(!$cardData){
        redirect('visa-card-edit.php','No Such Card Found');
    }
    $adminId = validate($_POST['admin_id']);
    $cardNumber = validate($_POST['vcard_number']);
    $cardHolder = validate($_POST['card_holder']);
    $card_mm_ex_date = validate($_POST['card_mm_ex_date']);
    $card_yy_ex_date = validate($_POST['card_yy_ex_date']);
    $cardCvv = validate($_POST['card_cvv']);
    $cardType = validate($_POST['card_type']);

    if($cardNumber != ''){
        $cardFinalNumber = $cardNumber;
    }else{
        $cardFinalNumber = $cardData['data']['card_number'];
    }

    if($cardHolder != ''){
        $cardFinalHolder = $cardHolder;
    }else{
        $cardFinalHolder = $cardData['data']['card_h_name'];
    }

    if($card_mm_ex_date != ''){
        $card_final_mm_ex_date = $card_mm_ex_date;
    }else{
        $card_final_mm_ex_date = $cardData['data']['card_mm_ex_date'];
    }

    if($card_yy_ex_date != ''){
        $card_final_yy_ex_date = $card_yy_ex_date;
    }else{
        $card_final_yy_ex_date = $cardData['data']['card_yy_ex_date'];
    }

    if($cardCvv != ''){
        $cardFinalCvv = password_hash($cardCvv, PASSWORD_BCRYPT);
    }else{
        $cardFinalCvv = $cardData['data']['card_cvv'];
    }

    $data = [
        'admin_id' => $adminId,	
        'card_number' => $cardFinalNumber,	
        'card_h_name' => $cardFinalHolder,
        'card_mm_ex_date' => $card_final_mm_ex_date,
        'card_yy_ex_date' => $card_final_yy_ex_date,
        'card_cvv' => $cardFinalCvv,
        'card_type' => $cardType
    ];

    $result = update('card', $cardId, $data);
    if($result){
        redirect('visa-card-edit.php?id='.$cardId, 'Card Updated Successfully');
    }else{
        redirect('visa-card-edit.php?id='.$cardId, 'Something went wrong');
    }
}

if(isset($_POST['updateMcard'])){
    $cardId = validate($_POST['card_id']);
    $cardData = getById('card', $cardId);
    if(!$cardData){
        redirect('visa-card-edit.php','No Such Card Found');
    }
    $adminId = validate($_POST['admin_id']);
    $cardNumber = validate($_POST['mcard_number']);
    $cardHolder = validate($_POST['card_holder']);
    $card_mm_ex_date = validate($_POST['card_mm_ex_date']);
    $card_yy_ex_date = validate($_POST['card_yy_ex_date']);
    $cardCvv = validate($_POST['card_cvv']);
    $cardType = validate($_POST['card_type']);

    if($cardNumber != ''){
        $cardFinalNumber = $cardNumber;
    }else{
        $cardFinalNumber = $cardData['data']['card_number'];
    }

    if($cardHolder != ''){
        $cardFinalHolder = $cardHolder;
    }else{
        $cardFinalHolder = $cardData['data']['card_h_name'];
    }

    if($card_mm_ex_date != ''){
        $card_final_mm_ex_date = $card_mm_ex_date;
    }else{
        $card_final_mm_ex_date = $cardData['data']['card_mm_ex_date'];
    }

    if($card_yy_ex_date != ''){
        $card_final_yy_ex_date = $card_yy_ex_date;
    }else{
        $card_final_yy_ex_date = $cardData['data']['card_yy_ex_date'];
    }

    if($cardCvv != ''){
        $cardFinalCvv = password_hash($cardCvv, PASSWORD_BCRYPT);
    }else{
        $cardFinalCvv = $cardData['data']['card_cvv'];
    }

    $data = [
        'admin_id' => $adminId,	
        'card_number' => $cardFinalNumber,	
        'card_h_name' => $cardFinalHolder,
        'card_mm_ex_date' => $card_final_mm_ex_date,
        'card_yy_ex_date' => $card_final_yy_ex_date,
        'card_cvv' => $cardFinalCvv,
        'card_type' => $cardType
    ];

    $result = update('card', $cardId, $data);
    if($result){
        redirect('master-card-edit.php?id='.$cardId, 'Card Updated Successfully');
    }else{
        redirect('master-card-edit.php?id='.$cardId, 'Something went wrong');
    }
}

?>
