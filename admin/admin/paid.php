<?php 
ob_start();
include('includes/sub-nav.php'); 

if(isset($_GET["transaction_id"]) AND isset($_GET["status"])  AND isset($_GET["tx_ref"]))
{
    $status = validate($_GET['status']);
    $id = validate($_GET['transaction_id']);
    $reference = validate($_GET['tx_ref']);
    $name = validate($_GET['name']);
    ?>
    <div class="container">
        <div class="row">
            <div class="card col-md-5 p-0 m-auto">
                <div class="card-header bg-success text-white">
                    Transaction successful
                </div>
                <div class="card-body">
                    Dear <?= $name ?><br>Your Order was placed successfully.. Kindly check your email to view your order details <br>
                    If you can't find any email kindly check your spam folder in your Gmail. Thank you for choosing Kole str.

                    <p class="sp bg-gray-200 py-2 text-center  small mt-4">Sponsored by kole str</p>
                </div>
                <div class="op-buttons col-md-12 mt-3">
                    <a href="index.php" class="btn btn-warning"><i class="fas fa-reply"></i>&nbsp;&nbsp;Back Home</a>
                </div>
            </div>
        </div>
    </div>

    <?php

}else{
    header('Location: failed.php');
}

ob_end_flush();
?>
