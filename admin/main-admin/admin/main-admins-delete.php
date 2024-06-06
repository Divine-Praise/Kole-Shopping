<?php

    require "../config/function.php";

    $paraResultId = checkParamId('id');

   if(is_numeric($paraResultId)){

    $adminId = validate($paraResultId);

    $admin = getById('main_admin', $adminId);
    if($admin['status'] == 200){
        $adminDelete = delete('main_admin', $adminId);
        if($adminDelete){
            redirect('main-admins.php', 'Admin Deleted Successfully');
        }else{
            redirect('main-admins.php', 'Something Went Wrong');
        }
    }else{
        redirect('main-admins.php', $admin['message']);
    }
    // echo $adminId;

   }else{
        redirect('main-admins.php', 'Something Went Wrong');
   }


?>