<?php

    require "../config/function.php";

    $paraResultId = checkParamId('id');

   if(is_numeric($paraResultId)){

    $salaryId = validate($paraResultId);

    $salary = getById('salary', $salaryId);
    if($salary['status'] == 200){
        $salaryDelete = delete('salary', $salaryId);
        if($salaryDelete){
            redirect('approved_trx.php', 'Record Deleted Successfully');
        }else{
            redirect('approved_trx.php', 'Something Went Wrong');
        }
    }else{
        redirect('approved_trx.php', $salary['message']);
    }
    // echo $salary;

   }else{
        redirect('approved_trx.php', 'Something Went Wrong');
   }


?>