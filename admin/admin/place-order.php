<?php include('includes/sub-nav.php'); ?>

<main class="main-content position-relative border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-10 m-auto">
                <div class="card shadow">
                    <div class="card-header pb-0 px-3 d-flex" style="justify-content: space-between; background: #6f42c1;" >
                        <h6 class="mb-0 text-white">Place Order</h6>
                        <div><a href="pending_trx.php" class="btn text-white" style="background: #6f49d9;">Back</a></div>
                    </div>
                    <hr class="bg-gray-600 m-0">
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

                                        <div class="mt-5">
                                        <center><a href="con-to-pay-admin.php?id=" class="btn text-white" style="background: #6f42c1;">Purchase Orders!</a></center>
                                        <!-- <a href="decline_trx.php?id="
                                                class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to decline this transaction?')"
                                            >
                                            Decline
                                        </a> -->
                                    </div>
                                    
                                </div>

                                    <div class="col-md-7" style="border-left: 1px solid gray;">
                                        <input type="hidden" value="">
                                        <h6 class="mb-0">Billing Information</h6>
                                        <hr class="bg-gray-500">
                                        <div class="px-3 float-end" style="font-size: 0.8rem">* required</div>
                                        <input type="hidden" id="admin_id" value="">
                                        <p class="fs-6" id="exampleModalLabel">Personal information</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>First Name*</label>
                                                    <input type="text" class="form-control" id="p_fname" value="" >
                                                </div>
                                                <div class="mb-3">
                                                    <label>Middle Name*</label>
                                                    <input type="text" class="form-control" id="p_mname">
                                                </div>
                                                <div class="mb-3">
                                                    <label>Last Name*</label>
                                                    <input type="text" class="form-control" id="p_lname" value="" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>Email Address *</label>
                                                    <input type="email" class="form-control" id="p_email" value="">
                                                </div>
                                                <div class="mb-3">
                                                    <label>Phone No *</label>
                                                    <input type="number" class="form-control" id="p_phone" value="">
                                                </div>
                                                <div class="mb-3">
                                                    <label>Additional Phone No</label>
                                                    <input type="number" class="form-control" id="p_add_phone">
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
                                                    <input type="text" class="form-control" id="p_address">
                                                </div>
                                                <div class="mb-3">
                                                    <label>Additional Address</label>
                                                    <input type="text" class="form-control" id="p_add_address">
                                                </div>
                                                <div class="mb-3">
                                                    <label>Nearest Bus-stop *</label>
                                                    <input type="text" class="form-control" id="p_nearB">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label>State *</label>
                                                    <input type="text" class="form-control" id="p_state">
                                                </div>
                                                <div class="mb-3">
                                                    <label>Postal code *</label>
                                                    <input type="text" maxlength="6" class="form-control" id="p_pCode">
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

<?php include('includes/footer.php'); ?>