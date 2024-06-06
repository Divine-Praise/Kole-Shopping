<?php
    require 'config/function.php';

    if(isset($_SESSION['loggedIn'])){
        $empId = $_SESSION['loggedInUser']['user_id'];
        $empUsername = $_SESSION['loggedInUser']['username'];
        $worked_time = validate($_POST['worked_time']);
        $amount_worked = validate($_POST['amount_worked']);
        
        $data = [
            'employee_id' => $empId,
            'employee_username' => $empUsername,
            'worked_time' => $worked_time,
            'amount_worked' => $amount_worked

        ];

        $result = insert('salary_record', $data);
        if(!$result){
            redirect('index.php', 'Something went wrong');
        }
        logoutSession();
        unset($_SESSION['login_time']);
        redirect('login.php', 'Logged Out Successfully.');
    }
       
?>