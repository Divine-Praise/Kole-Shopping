<?php 
include('../config/function.php');

if(isset($_POST['payAdminBtn'])){
    $salaryId = validate($_POST['salary_id']);
    $adminUsername = validate($_POST['admin_username']);
    $acct_no = validate($_POST['acct_no']);
    $acct_name = validate($_POST['acct_name']);
    $bank_code = validate($_POST['bank_code']);
    $amount = validate($_POST['amount']);
    $bonus = validate($_POST['bonus']);
    if($bonus != ''){
        $finalAmount = $amount + $bonus;
    }else{
        $finalAmount = $amount;
    }

    if($acct_no != '' && $acct_name != '' && $bank_code != '' && $amount != '')
    {

         // Integrate the flutterwave Transfer API
         $transfer_data = [
            "full_name" => $acct_name,
            "account_bank" => $bank_code,
            "account_number" => $acct_no,
            "amount" => $finalAmount,
            "narration" => "Staff salary payment From Kole Str",
            "currency" => "NGN",
            "debit_currency" => "NGN",
            "reference" => uniqid() . "_PMCKDU_1",
            "redirect_url" => "http://localhost/payment_gateway/transfer/verify.php"
        ];

        $url = "https://api.flutterwave.com/v3/transfers";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST,true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($transfer_data));
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer FLWSECK_TEST-7a1ab997e04eb83e5fbd254ce0fba870-X",
            "Content-type: Application/json"
        ]);

        $run = curl_exec($curl);

        // Convert to obj
        $response = json_decode($run);

        $error = curl_errno($curl);
        if($error){
            die("Curl returned some error: ". $error);
        }
        $status = $response->status;
        $trans_id = $response->data->id;
        curl_close($curl);

        if($status == 'success'){
            // echo "Success we move";
            header("Location: verify-salary.php?transfer_id=$trans_id&salary_id=$salaryId&admin_username=$adminUsername&bonus=$bonus&amount=$amount");
        }else{
            // header("Location: fail.php");
            redirect('con-to-pay-admin.php?id='.$salaryId, 'Transaction Failed');
        }
    }
    else
    {
        redirect('con-to-pay-admin.php?id='.$salaryId, 'All Fields Required');
    }
}

?>