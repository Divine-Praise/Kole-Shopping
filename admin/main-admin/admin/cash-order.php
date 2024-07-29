<?php 
require '../config/function.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../php-mailer-files/vendor/autoload.php';

// Sending Mail
function sendemail_order($fullName,$customerEmail,$sessionProducts,$grandTotal,$tx_ref,$payment_mode)
{
    $mail = new PHPMailer(true); 
    //small->SMTPDebug
    $mail->isSMTP();
    $mail->SMTPAuth   = true;

    $mail->Host       = 'smtp.gmail.com';
    $mail->Username   = 'kolestore123@gmail.com';
    $mail->Password   = 'xgzq rpyq ydjp znlw';

    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;

    //Recipients
    $mail->setFrom('kolestore123@gmail.com', 'KOLE STR');
    $mail->addAddress($customerEmail);

    //Content
    $mail->isHTML(true);
    $mail->Subject = "Order successfully placed";
    $email_template = '
        <div>
            <h5>Dear ' . htmlspecialchars($fullName) . '</h5>
            <p>Your Order Was successful. Your order id is ' . htmlspecialchars($tx_ref) . '.</p>
            <p>Payemnt methode: '. $payment_mode . '</p>
            <p>When you get your package, make sure you pay to the dispatcher. failure to do so will resolve to a chronic problem😂😡</p>
            <p>Below you\'ll find your order details</p>
            <table>
                <thead>
                    <tr>
                        <th align="start" style="border-bottom: 1px solid #ccc;">Img</th>
                        <th align="start" style="border-bottom: 1px solid #ccc;">Product</th>
                        <th align="start" style="border-bottom: 1px solid #ccc;">Price</th>
                        <th align="start" style="border-bottom: 1px solid #ccc;">Qty</th>
                        <th align="start" style="border-bottom: 1px solid #ccc;">TPrice</th>
                    </tr>
                </thead>
                <tbody>';

    foreach ($sessionProducts as $product) {
        $email_template .= '
                    <tr>
                        <td><img src="../' . $product['image'] . '" style="width: 30px; height: 30px" alt="Img" /></td>    
                        <td style="border-bottom: 1px solid #ccc;">' . htmlspecialchars($product['name']) . '</td>
                        <td style="border-bottom: 1px solid #ccc;">' . htmlspecialchars($product['price']) . '</td>
                        <td style="border-bottom: 1px solid #ccc;">' . htmlspecialchars($product['quantity']) . '</td>
                        <td style="border-bottom: 1px solid #ccc;" class="fw-bold">N' . htmlspecialchars(number_format($product['price'] * $product['quantity'], 0)) . '</td>
                    </tr>';
    }

    $email_template .= '
                    <tr>
                        <td colspan="4" align="end" style="font-weight: bold;">Grand Total</td>
                        <td colspan="1" style="font-weight: bold;">N' . htmlspecialchars($grandTotal) . '</td>
                    </tr>
                </tbody>
            </table>
            <p>Your Estimated Order delivery is 1 week from today. Your order tracking number is ' . htmlspecialchars($_SESSION['invoice_no']) . '</p>
            <p>You can track your order <a href="https://kole-store.000webhostapp.com/">here</a></p>
            <p>Thank you for choosing Kole str</p>
        </div>';
    ?>
<?php
    $mail->Body = $email_template;
    $mail->send();
    // echo 'Message has been sent';

}


if(isset($_GET["tx_ref"])){
    $tx_ref = validate($_GET['tx_ref']);
    $fname = htmlspecialchars($_GET['fname']);
    $mname = htmlspecialchars($_GET['m_name']);
    $lname = htmlspecialchars($_GET['l_name']);
    $addPhone = htmlspecialchars($_GET['add_phone']);
    $address = htmlspecialchars($_GET['address']);
    $addAddress = htmlspecialchars($_GET['add_address']);
    $bustop = htmlspecialchars($_GET['bustop']);
    $state = htmlspecialchars($_GET['state']);
    $pCode = htmlspecialchars($_GET['p_code']);
    $fullName = "$fname $mname $lname";

    $phone = validate($_SESSION['cphone']);
    $invoice_no = validate($_SESSION['invoice_no']);
    $payment_mode = validate($_SESSION['payment_mode']);
    $order_placed_by_id = $_SESSION['loggedInUser']['user_id'];
    $admins = 'sub_admin';

    $checkCustomer = mysqli_query($conn, "SELECT * FROM customers WHERE phone='$phone' LIMIT 1");
    if(!$checkCustomer){
        // jsonResponse(500, 'error', 'Something Went Wrong!');
        redirect('order-create.php', 'Something went wrong!');
    }

    if(mysqli_num_rows($checkCustomer) > 0){
        $customerData = mysqli_fetch_assoc($checkCustomer);
        $customerEmail = $customerData['email'];

        if(!isset($_SESSION['productItems'])){
            // jsonResponse(404, 'warning', 'No Items to Place order!');
            redirect('order-create.php', 'No Items to Place order!');
        }

        $sessionProducts = $_SESSION['productItems'];

        $totalAmount = 0;
        foreach($sessionProducts as $amtItem){
            $totalAmount += $amtItem['price'] * $amtItem['quantity'];
        }

        $data = [
            'customer_id' => $customerData['id'],
            'tracking_no' => rand(111111, 999999),
            'invoice_no' => $invoice_no,
            'total_amount' => $totalAmount,
            'order_date' => date('y-m-d'),
            'order_status' => 'pending',
            'payment_mode' => $payment_mode,
            'admins' => $admins,
            'f_name' => $fname,
            'm_name' => $mname,
            'l_name' => $lname,
            'email' => $customerEmail,
            'phone' => $phone,
            'add_phone' => $addPhone,
            'address' => $address,
            'add_address' => $addAddress,
            'state' => $state,
            'near_bust' => $bustop,
            'p_code' => $pCode,
            'order_placed_by_id' => $order_placed_by_id
        ];
        $result = insert('orders', $data);
        $lastOrderId = mysqli_insert_id($conn);

        foreach($sessionProducts as $prodItem){
        
            $productId = $prodItem['product_id'];
            $price = $prodItem['price'];
            $quantity = $prodItem['quantity'];

            //Inserting order items
            $dataOrderItem = [
                'order_id' => $lastOrderId,
                'product_id' => $productId,
                'price' => $price,
                'quantity' => $quantity,
            ];

            $orderItemQuery = insert('order_items', $dataOrderItem);

            // Checking for the books quantity and decreasing quantity and making total Quantity
            $checkProductQuantityQuery = mysqli_query($conn, "SELECT * FROM products WHERE id='$productId'");
            $productQtyData = mysqli_fetch_assoc($checkProductQuantityQuery);
            $totalProductQuantity = $productQtyData['quantity'] - $quantity;

            $dataUpdate = [
                'quantity' => $totalProductQuantity
            ];
            $updateProductQty = update('products', $productId, $dataUpdate);
        }
    }else
    {
        // jsonResponse(404, 'warning', 'No Customer Found!');
        redirect('order-create.php', 'No Customer Found!');
    }
    $totalAmount = 0;

    foreach($sessionProducts as $key => $row) {

        $totalAmount += $row['price'] * $row['quantity'];
    }
    $grandTotal = number_format($totalAmount, 0);
    sendemail_order($fullName,$customerEmail,$sessionProducts,$grandTotal,$tx_ref,$payment_mode);
    unset($_SESSION['productItemIds']);
    unset($_SESSION['productItems']);
    unset($_SESSION['cphone']);
    unset($_SESSION['payment_mode']);
    unset($_SESSION['invoice_no']);

    header("Location: paid.php?transaction_id=$id&status=$status&tx_ref=$tx_ref&name=$fullName");
}else{
    header('Location: failed.php');
}

?>