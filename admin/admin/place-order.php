<?php 
ob_start();
include('includes/sub-nav.php'); 

$error = '';
$p_fname = '';
$p_mname = '';
$p_lname = '';
$p_email = '';
$p_phone = '';
$p_add_phone = '';
$p_address = '';
$p_add_address = '';
$p_nearB = '';
$p_state = '';
$p_pCode = '';
$Tamount = '';

$payMode = $_SESSION['payment_mode'];

$phone = validate($_SESSION['cphone']);
$checkCustomer = mysqli_query($conn, "SELECT * FROM customers WHERE phone='$phone' LIMIT 1");
if(mysqli_num_rows($checkCustomer) > 0){
    $customerData = mysqli_fetch_assoc($checkCustomer);
    $customerEmail = $customerData['email'];
    $customerPhone = $customerData['phone'];
}else{
    redirect('place-order.php', 'No Customer email found');
}



if(isset($_POST['checkout'])){
    $p_fname = validate($_POST['p_fname']);
    $p_mname = validate($_POST['p_mname']);
    $p_lname = validate($_POST['p_lname']);
    $p_email = validate($_POST['p_email']);
    $p_phone = validate($_POST['p_phone']);
    $p_add_phone = validate($_POST['p_add_phone']);
    $p_address = validate($_POST['p_address']);
    $p_add_address = validate($_POST['p_add_address']);
    $p_nearB = validate($_POST['p_nearB']);
    $p_state = validate($_POST['p_state']);
    $p_pCode = validate($_POST['p_pCode']);
    $Tamount = validate($_POST['totalamount']);

    if($p_fname != '' && $p_mname != '' && $p_lname != '' && $p_email != '' && $p_phone != '' && $p_address != '' && $p_nearB != '' && $p_state != '' && $p_pCode != '' ){
        $name = "$p_fname $p_mname $p_lname";  
        
        if($payMode == 'Cash Payment'){
            $tx_ref = md5(rand());
            header("Location: cash-order.php?tx_ref=$tx_ref&fname=$p_fname&m_name=$p_mname&l_name=$p_lname&add_phone=$p_add_phone&address=$p_address&add_address=$p_add_address&bustop=$p_nearB&state=$p_state&p_code=$p_pCode");
        }else{
        // echo 'Flutterwave Selected';
        $endpoint = "https://api.flutterwave.com/v3/payments";
        $headers = [
            'Authorization: Bearer FLWSECK_TEST-235f3627073ad3f9f079d107e68c8823-X',
            'Content-Type: application/json'
        ];
        
        // Set the payload for the php curl
        $data = [
            'tx_ref' => md5(rand()),
            'amount' => $Tamount,
            'currency' => 'NGN',
            'customer' => array(
                'email' => $p_email,
                'phonenumber' => $p_phone,
                'name' => $name
            ),
            'redirect_url' => "http://localhost/NIIT-E-COMMERCE-PROJECT/admin/admin/verify.php?fname=$p_fname&m_name=$p_mname&l_name=$p_lname&add_phone=$p_add_phone&address=$p_address&add_address=$p_add_address&bustop=$p_nearB&state=$p_state&p_code=$p_pCode"
        ];
        
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => $headers
        ));
        
        //Execute
        $responseData = curl_exec($ch);
        // print_r($responseData);
        $result = json_decode($responseData, true);
        header('Location: '. $result['data']['link']);
        curl_close($ch);
    }
    }else{
        if($p_fname == ''){
            $error = "First name can't be empty";
        }elseif(!ctype_alpha($p_fname)){
            $error = "$p_fname is not a valid First name";
        }
        if($p_mname == ''){
            $error = "Middle name can't be empty";
        }elseif(!ctype_alpha($p_mname)){
            $error = "$p_mname is not a valid middle name";
        }
        if($p_lname == ''){
            $error = "Last name can't be empty";
        }elseif(!ctype_alpha($p_lname)){
            $error = "$p_lname is not a valid lastname";
        }
        if($p_email == ''){
            $error = "email can't be empty";
        }elseif(!filter_var($p_email, FILTER_VALIDATE_EMAIL)){
            $error = "$p_email is not a valid email";
        }
        if($p_phone == ''){
            $error = "Phone can't be empty";
        }elseif(!is_numeric($p_phone)){
            $error = "$p_phone is not a valid phone number";
        }elseif($p_add_phone != ''){
            if(!is_numeric($p_add_phone)){
                $error = "$p_add_phone is not a valid phone number";
            }
        }elseif($p_phone == $p_add_phone){
            $error = "You can't use $p_phone as an additional number. Try using a relative number instead";
        }
        if($p_address == ''){
            $error = "Address can't be empty";
        }
        if($p_nearB == ''){
            $error = "Nearest Bus-stop can't be empty";
        }
        if($p_state == ''){
            $error = "State can't be empty";
        }elseif(!ctype_alpha($p_state)){
            $error = "$p_state is not a valid State";
        }
        if($p_pCode == ''){
            $error = "Postalcode can't be empty";
        }elseif(!is_numeric($p_pCode)){
            $error = "$p_pCode is not a valid postalcode";
        }elseif($p_pCode != ''){
            
        }
    }
}

?>

<main class="main-content position-relative border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-10 m-auto">
                <div class="card shadow">
                    <div class="card-header pb-0 px-3 d-flex" style="justify-content: space-between; background: #6f42c1;" >
                        <h6 class="mb-0 text-white">Place Order</h6>
                        <div><a href="order-create.php" class="btn text-white" style="background: #6f49d9;">Back</a></div>
                    </div>
                    <hr class="bg-gray-600 m-0">
                    <div class="px-3 fs-6 text-white bg-danger"><?php echo $error; ?></div>
                    <div class="card-body pt-4 p-3">
                        <form action="#" method="POST">
                            <div class="row">
                                <?php 
                                    if(isset($_SESSION['productItems']))
                                    {
                                        $sessionProducts = $_SESSION['productItems'];
                                        if(empty($sessionProducts)){
                                            unset($_SESSION['productItemIds']);
                                            unset($_SESSION['productItems']);
                                        }
                    
                                
                                
                                ?>

                                <div class="col-md-5 ml-auto">
                                        
                                    <?php
                                    if(isset($_SESSION['productItems']))
                                    {
                                        $sessionProducts = $_SESSION['productItems'];
                                        ?>
                                        <div class="table-responsive mb-3">
                                            <table style="width: 100%;" cellPadding="5">
                                                <thead>
                                                    <tr>
                                                        <th align="start" style="border-bottom: 1px solid #ccc;">Img</th>
                                                        <th align="start" style="border-bottom: 1px solid #ccc;">Product</th>
                                                        <th align="start" style="border-bottom: 1px solid #ccc;">Price</th>
                                                        <th align="start" style="border-bottom: 1px solid #ccc;">Qty</th>
                                                        <th align="start" style="border-bottom: 1px solid #ccc;">TPrice</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                        $totalAmount = 0;

                                                        foreach($sessionProducts as $key => $row) :

                                                        $totalAmount += $row['price'] * $row['quantity']
                                                    ?>
                                                    <tr>
                                                        <td><img src="<?= $row['image'] != '' ? '../'.$row['image']: '../assets/images/no-img.jpg'; ?>"
                                                            style="width: 30px; height: 30px;"
                                                            alt="Img" />
                                                        </td>    
                                                        <td style="border-bottom: 1px solid #ccc;"><?= $row['name']; ?></td>
                                                        <td style="border-bottom: 1px solid #ccc;"><?= number_format($row['price'], 0) ?></td>
                                                        <td style="border-bottom: 1px solid #ccc;"><?= $row['quantity'] ?></td>
                                                        <td style="border-bottom: 1px solid #ccc;" class="fw-bold">
                                                            N<?= number_format($row['price'] * $row['quantity'], 0) ?>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                    <input type="hidden" name="totalamount" value="<?= $totalAmount; ?>">
                                                    <tr>
                                                        <td colspan="4" align="end" style="font-weight: bold;">Grand Total</td>
                                                        <td colspan="1" style="font-weight: bold;">N<?= number_format($totalAmount, 0); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="5">Payment Mode: <?= $_SESSION['payment_mode']; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        
                                    
                                </div>

                                    <div class="col-md-7" style="border-left: 1px solid gray;">
                                        <h6 class="mb-0">Billing Information</h6>
                                        <hr class="bg-gray-500">
                                        <div class="px-3 float-end" style="font-size: 0.8rem">* required</div>
                                        <p class="fs-6" id="exampleModalLabel">Personal information</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>First Name*</label>
                                                    <input type="text" class="form-control" name="p_fname" value="<?php echo $p_fname; ?>" >
                                                </div>
                                                <div class="mb-3">
                                                    <label>Middle Name*</label>
                                                    <input type="text" class="form-control" name="p_mname" value="<?php echo $p_mname; ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label>Last Name*</label>
                                                    <input type="text" class="form-control" name="p_lname" value="<?php echo $p_lname; ?>" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>Email Address *</label>
                                                    <input type="email" class="form-control" name="p_email" value="<?php echo $customerEmail; ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label>Phone No *</label>
                                                    <input type="text" maxlength="11" class="form-control" name="p_phone" value="<?php echo $customerPhone; ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label>Additional Phone No</label>
                                                    <input type="text" maxlength="11" class="form-control" name="p_add_phone" value="<?php echo $p_add_phone; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="bg-gray-500">
                                        <h6 class="mb-0">Contact Details</h6>
                                        <hr class="bg-gray-500">
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>Billing Address *</label>
                                                    <input type="text" class="form-control" name="p_address" value="<?php echo $p_address; ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label>Additional Address</label>
                                                    <input type="text" class="form-control" name="p_add_address" value="<?php echo $p_add_address; ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label>Nearest Bus-stop *</label>
                                                    <input type="text" class="form-control" name="p_nearB" value="<?php echo $p_nearB; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>State *</label>
                                                    <input type="text" class="form-control" name="p_state" value="<?php echo $p_state; ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label>Postal code *</label>
                                                    <input type="text" maxlength="6" class="form-control" name="p_pCode" value="<?php echo $p_pCode; ?>">
                                                </div>
                                                <div class="mt-5">
                                                    <center><button type="submit" name="checkout" class="btn text-white" style="background: #6f42c1;">Purchase Orders!</button></center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <?php
                                    }
                                    else
                                    {
                                        echo '<div class="text-center p-2">No Items Added</div>';
                                    }
                                }else{
                                    echo '<div class="text-center p-2">No Items Added</div>';
                                }
                                    ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include('includes/footer.php'); 
ob_end_flush();
?>