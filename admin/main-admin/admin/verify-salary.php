<?php 

include('../config/function.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../php-mailer-files/vendor/autoload.php';

// Sending Mail
function sendemail_ticket($adminFirstName,$adminEmail,$finalMessage)
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
    $mail->Subject = "Salary Request Approved";
    $email_template = "
        <p>$finalMessage</p>
    ";

    $mail->Body = $email_template;
    $mail->send();
    // echo 'Message has been sent';

}


if(isset($_GET['transfer_id'])){
    $transfer_id = htmlspecialchars($_GET['transfer_id']);
    $url = "https://api.flutterwave.com/v3/transfers/" . $transfer_id;
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");

    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer FLWSECK_TEST-7a1ab997e04eb83e5fbd254ce0fba870-X",
        "Content-type: Application/json"
    ]);

    $run = curl_exec($curl);
    $error = curl_error($curl);

    if($error){
        die("curl returned some errors: ". $error);
    }

    $result = json_decode($run);

    $salaryId = validate($_GET['salary_id']);
    $adminUsername = validate($_GET['admin_username']);
    $amount = validate($_GET['amount']);
    $bonus = validate($_GET['bonus']);


    $query = "SELECT acct_bal,id,bonus,firstname,email FROM admins WHERE username='$adminUsername' LIMIT 1";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        if(mysqli_num_rows($query_run) > 0){
            $row = mysqli_fetch_assoc($query_run);
            $adminAcctBal = $row['acct_bal'];
            $adminID = $row['id'];
            $adminBonus = $row['bonus'];
            $adminFirstName = $row['firstname'];
            $adminEmail = $row['email'];

            $salaryQuery = "SELECT admin_amount,id FROM salary WHERE admin_username='$adminUsername' AND id='$salaryId' LIMIT 1";
            $salaryQueryRun = mysqli_query($conn, $salaryQuery);
            if($salaryQueryRun){
                if(mysqli_num_rows($salaryQueryRun) > 0){
                    $row = mysqli_fetch_assoc($salaryQueryRun);
                    $salaryAmount = $row['admin_amount'];
                    $salID = $row['id'];

                    $addBal = $adminAcctBal + $salaryAmount;
                    if($bonus != ''){
                        $addBonus = $adminBonus + $bonus;
                    }else{
                        $addBonus = $adminBonus;
                    }
                }else{
                    redirect('con-to-pay-admin.php?id='.$salaryId, 'No Salary Found');
                }
            }else{
                redirect('con-to-pay-admin.php?id='.$salaryId, 'Something went wrong');
            }
        
            $data = [
                'acct_bal' => $addBal,
                'bonus' => $addBonus
            ];
            $result = update('admins', $adminID, $data);
            if($result){
                $data2 = [
                    'trx_status' => 'accept',
                    'trx_id' => $transfer_id
                ];
                $salaryupdate = update('salary', $salaryId, $data2);
                if($bonus != ''){
                    $finalMessage = "$adminFirstName, N$salaryAmount has been deposited into your account with a bonus of $$bonus";
                }else{
                    $finalMessage = "$adminFirstName, N$salaryAmount has been deposited into your account";
                }
                $data3 = [
                    'admin_id' => $adminID,
                    'sal_id' => $salID,
                    'admin_firstname' => $adminFirstName,
                    'message' => $finalMessage,
                    'status' => 'success'
                ];
                $message = insert('trx_notification', $data3);
                sendemail_ticket($adminFirstName,$adminEmail,$finalMessage);
                redirect('approved_trx.php', 'Employee Paid Successfully'); 
                
            }else{
                redirect('con-to-pay-admin.php?id='.$salaryId, 'A problem occured');
            }
        }else{
            redirect('con-to-pay-admin.php?id='.$salaryId, 'No Admin Found');
        }
    }else{
        redirect('con-to-pay-admin.php?id='.$salaryId, 'Something went wrong');
    }

    curl_close($curl);

    // var_dump($run);
}else{
    // die("We could not find an ID to that transfer");
    // header("Location: fail.php");
    redirect('con-to-pay-admin.php?id='.$salaryId, 'Transaction Failed');
}
?>