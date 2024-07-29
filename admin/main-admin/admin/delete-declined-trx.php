<?php

    require "../config/function.php";

    $paraResultId = checkParamId('id');

   if(is_numeric($paraResultId)){

    $salaryId = validate($paraResultId);

    $salary = getById('salary', $salaryId);
    if($salary['status'] == 200){
        $salaryDelete = delete('salary', $salaryId);
        if($salaryDelete){
            redirect('declined_trx.php', 'Record Deleted Successfully');
        }else{
            redirect('declined_trx.php', 'Something Went Wrong');
        }
    }else{
        redirect('declined_trx.php', $salary['message']);
    }
    // echo $salary;

   }else{
        redirect('declined_trx.php', 'Something Went Wrong');
   }


?>