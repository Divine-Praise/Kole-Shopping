<?php 

require 'config/function.php';

if(isset($_POST['saveOneTimePwd'])){
    $adminId = $_SESSION['loggedInUser']['user_id'];
    $adminOneTimepwd = validate($_POST['one_time_pwd']);

    if($adminOneTimepwd != ''){
        if(!is_numeric($adminOneTimepwd)){
            redirect('otp.php', "Pin Must Contain 4(four) numbers");
        }else{
            $data = [
                'admin_otp' => $adminOneTimepwd
            ];

            $result = update('admins', $adminId, $data);
            if($result){
                header('Location: confirm-otp.php');
                exit;
            }else{
                redirect('otp.php', "Something Went Wrong!");
            }
        }

    }else{
        redirect('otp.php', "Field Can't be empty");
    }
}

if(isset($_POST['confirmOneTimePwd'])){
    $adminId = $_SESSION['loggedInUser']['user_id'];
    $adminOneTimepwd = validate($_POST['one_time_pwd']);

    if($adminOneTimepwd != ''){
        if(!is_numeric($adminOneTimepwd)){
            redirect('confirm-otp.php', "Pin Must Contain 4(four) numbers");
        }else{
            $query = "SELECT * FROM admins WHERE id='$adminId' LIMIT 1";
            $result = mysqli_query($conn, $query);
            if($result){
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_assoc($result);
                    $OneTimepassword = $row['admin_otp'];

                    if($OneTimepassword != $adminOneTimepwd){
                        redirect('confirm-otp.php', 'Invalid Pin');
                    }else{
                        $_SESSION['loggedIn'] = true;
                        $_SESSION['login_time'] = true;
                        $firstname = $_SESSION['loggedInUser']['firstname'];
                        if($row['admin_type'] == 'admin'){
                            $adminName = $_SESSION['loggedInUser']['firstname'];
                            redirect('main-admin/admin/index.php', "Welcome back administrator $adminName");
                        }else{
                            redirect('admin/index.php', "Welcome back $firstname");
                        }
                    }
                }else{
                    redirect('login.php', 'User not found please contact admin');
                }
            }else{
                redirect('login.php', 'User not found please contact admin');
            }
        }
    }else{
        redirect('confirm-otp.php', "Field Can't be empty");
    }
}

?>