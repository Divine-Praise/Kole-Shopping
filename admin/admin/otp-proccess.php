<?php 
require('../config/function.php');

if(isset($_POST['confirmBillOtp'])){
    $adminId = $_SESSION['loggedInUser']['user_id'];
    $adminOneTimepwd = validate($_POST['one_time_pwd']);

    if($adminOneTimepwd != ''){
        $query = "SELECT * FROM admins WHERE id='$adminId' LIMIT 1";
        $result = mysqli_query($conn, $query);
        if($result){
            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_assoc($result);
                $OneTimepassword = $row['admin_otp'];

                if($OneTimepassword != $adminOneTimepwd){
                    redirect('billing-otp.php', 'Invalid One Time Password');
                }else{
                    header('Location: billing.php');
                }
            }else{
                redirect('index.php', "You don't have access to this page");
            }
        }else{
            redirect('index.php', "You don't have access to this page");
        }
    }else{
        redirect('billing-otp.php', "Field Can't be empty");
    }
}

?>