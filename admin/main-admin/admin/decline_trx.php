<?php

    require "../config/function.php";
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../php-mailer-files/vendor/autoload.php';

// Sending Mail
function sendemail_ticket($adminFirstName,$adminEmail,$message)
{
    $mail = new PHPMailer(true); 
    //small->SMTPDebug
    $mail->isSMTP();
    $mail->SMTPAuth   = true;

    $mail->Host       = 'smtp.gmail.com';
    $mail->Username   = 'divineatansi123@gmail.com';
    $mail->Password   = 'vdsm hmcp ytqa uzrx';

    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;

    //Recipients
    $mail->setFrom('divineatansi123@gmail.com', $adminFirstName);
    $mail->addAddress($adminEmail);

    //Content
    $mail->isHTML(true);
    $mail->Subject = "Salary Request Declined";
    $email_template = "
        <p>$message</p>
    ";

    $mail->Body = $email_template;
    $mail->send();
    // echo 'Message has been sent';

}

    $paraResultId = checkParamId('id');

   if(is_numeric($paraResultId)){

    $salaryId = validate($paraResultId);

    $salary = getById('salary', $salaryId);
    if($salary['status'] == 200){

        $data = [
            'trx_status' => 'decline'
        ];

        $response = update('salary', $salaryId, $data);
        if($response){
            $salaryQuery = "SELECT admin_amount,admin_username,admin_id,id FROM salary WHERE id='$salaryId' LIMIT 1";
            $salaryQueryRun = mysqli_query($conn, $salaryQuery);
            if(mysqli_num_rows($salaryQueryRun) > 0){
                $row = mysqli_fetch_assoc($salaryQueryRun);
                $salaryAmount = $row['admin_amount'];
                $adminUsername = $row['admin_username'];
                $adminID = $row['admin_id'];
                $salID = $row['id'];
            }
            
            $adminQuery = "SELECT firstname,email FROM admins WHERE username='$adminUsername' LIMIT 1";
            $adminQueryRun = mysqli_query($conn, $adminQuery);
            if(mysqli_num_rows($adminQueryRun) > 0){
                $row = mysqli_fetch_assoc($adminQueryRun);
                $adminFirstName = $row['firstname'];
                $adminEmail = $row['email'];
            }
            $message = "$adminFirstName, your salary request of N$salaryAmount was declined please contact admin for more info";
            $data2 = [
                'admin_id' => $adminID,
                'sal_id' => $salID,
                'admin_firstname' => $adminFirstName,
                'message' => $message,
                'status' => 'decline'
            ];
            $insert_message = insert('trx_notification', $data2);
            sendemail_ticket($adminFirstName,$adminEmail,$message);
            redirect('declined_trx.php', 'You declined a salary request');
        }else{
            redirect('pending_trx.php', 'Something Went Wrong');
        }
    }else{
        redirect('pending_trx.php', $salary['message']);
    }

   }else{
        redirect('pending_trx.php', 'Something Went Wrong');
   }


?>