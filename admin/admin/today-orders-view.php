<?php include('includes/header.php'); ?>


<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold" style="color: #6f42c1">Order View</h5>
            <a href="today-orders.php" class="btn btn-danger mx-2 btn-sm float-end">Back</a>
            <a href="orders-view-print.php?track=<?= $_GET['track']; ?>" class="btn btn-info mx-2 btn-sm float-end">Print</a>
        </div>
        <div class="card-body">
            <?php alertMessage(); ?>

            <?php
                if(isset($_GET['track']))
                {
                    if($_GET['track'] == ''){
                        ?>
                            <div class="text-center py-5">
                                <h5>No Tracking Number Found!</h5>
                                <div>
                                    <a href="today-orders.php" class="btn text-white mt-4 w-25" style="background: #6f42c1;">Go Back To Orders</a>
                                </div>
                            </div>
                        <?php
                        return false;
                    }

                    $trackingNo = validate($_GET['track']);

                    $query = "SELECT o.id as orders_id, o.*, c.* FROM orders o, customers c
                                    WHERE c.id = o.customer_id AND tracking_no='$trackingNo'
                                ";

                    $orders = mysqli_query($conn, $query);
                    if($orders)
                    {
                        if(mysqli_num_rows($orders) > 0){

                            $orderData = mysqli_fetch_assoc($orders);
                            $orderId = $orderData['id'];

                            ?>
                            <div class="card card-body shadow border-1 mb-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Order Details</h4>
                                        <label class="mb-1">
                                            Tracking No: 
                                            <span class="fw-bold"><?= $orderData['tracking_no']; ?></span>
                                        </label>
                                        <br />
                                        <label class="mb-1">
                                            Order Date: 
                                            <span class="fw-bold"><?= $orderData['order_date']; ?></span>
                                        </label>
                                        <br />
                                        <label class="mb-1">
                                            Order Status: 
                                            <span class="fw-bold"><?= $orderData['order_status']; ?></span>
                                        </label>
                                        <br />
                                        <label class="mb-1">
                                            Payment Mode: 
                                            <span class="fw-bold"><?= $orderData['payment_mode']; ?></span>
                                        </label>
                                        <br />
                                    </div>
                                    <div class="col-md-6">
                                        <h4>User Details</h4>
                                        <label class="mb-1">
                                            Full Name: 
                                            <span class="fw-bold"><?= $orderData['name']; ?></span>
                                        </label>
                                        <br />
                                        <label class="mb-1">
                                            Email Address: 
                                            <span class="fw-bold"><?= $orderData['email']; ?></span>
                                        </label>
                                        <br />
                                        <label class="mb-1">
                                            Phone Number: 
                                            <span class="fw-bold"><?= $orderData['phone']; ?></span>
                                        </label>
                                        <br />
                                    </div>                                  
                                </div>
                            </div>

                            <?php 
                            $orderItemQuery = "SELECT o.id as orders_id, oi.quantity as orderItemQuantity, oi.price as orderItemPrice, o.*, oi.*, p.* 
                                                    FROM orders as o, order_items as oi, products as p
                                                    WHERE oi.order_id = o.id AND p.id = oi.product_id AND o.tracking_no='$trackingNo'";


                            $orderItemRes = mysqli_query($conn, $orderItemQuery);
                            if($orderItemRes)
                            {
                                if(mysqli_num_rows($orderItemRes) > 0)
                                {
                                    $row = mysqli_fetch_assoc($orderItemRes);
                                    ?>
                                    <h4 class="my-3">Order Items Details</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Total(N)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($orderItemRes as $orderItemRow) : ?>
                                                    <tr>
                                                        <td>
                                                            <img src="<?= $orderItemRow['image'] != '' ? '../'.$orderItemRow['image']: '../assets/images/no-img.jpg'; ?>"
                                                                style="width: 50px; height: 50px;"
                                                                alt="Img" />
                                                            <?= $orderItemRow['name']; ?>
                                                        </td>
                                                        <td width="15%" class="fw-bold text-center">
                                                            <?= number_format($orderItemRow['orderItemPrice'], 0); ?>
                                                        </td>
                                                        <td width="15%" class="fw-bold text-center">
                                                            <?= $orderItemRow['orderItemQuantity']; ?>
                                                        </td>
                                                        <td width="15%" class="fw-bold text-center">
                                                            <?= number_format($orderItemRow['orderItemPrice'] * $orderItemRow['orderItemQuantity'], 0); ?>
                                                        </td>
                                                    </tr>

                                                <?php endforeach; ?>

                                                <tr>
                                                    <td class="text-end fw-bold">Total Price: </td>
                                                    <td colspan="3" class="text-end fw-bold">N<?= number_format($orderItemRow['total_amount'], 0); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <main class="main-content position-relative border-radius-lg ">
                                            <div class="container-fluid py-4">
                                                <div class="row">
                                                    <div class="col-md-10 m-auto">
                                                        <div class="card">
                                                        <div class="card-header p-3 px-3 d-flex" style="justify-content: space-between;">
                                                            <h6 class="mb-0">Customer Billing Information</h6>
                                                        </div>
                                                        <hr class="bg-gray-600 m-0">
                                                        <div class="card-body pt-4 p-3">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <input type="hidden" value="">
                                                                        <h6 class="mb-0">Personal information</h6>
                                                                        <hr class="bg-gray-500">
                                                                        <div class="row">
                                                                            <div class="col-md 6">
                                                                                <div class="mb-3">
                                                                                    <label class="font-weight-bold">Full Name: </label> <span class="fs-6 ml-4"><?= $row['f_name']; ?> <?= $row['m_name']; ?> <?= $row['l_name']; ?></span>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label class="font-weight-bold">Email: </label> <span class="fs-6 ml-4"><?= $row['email'] ?></span>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label class="font-weight-bold">Phone Number: </label> <span class="fs-6 ml-4 "><?= $row['phone'] ?></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="mb-3">
                                                                                    <label class="font-weight-bold">Additional Phone No: </label> <span class="fs-6 ml-4"><?= $row['add_phone'] ?></span>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label class="font-weight-bold">Address: </label> <span class="fs-6 ml-4"><?= $row['address'] ?></span>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label class="font-weight-bold">Additional Address: </label> <span class="fs-6 ml-4"><?= $row['add_address']; ?></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="mb-3">
                                                                                    <label class="font-weight-bold">Nearest Bus-stop: </label> <span class="fs-6 ml-4"><?= $row['near_bust'] ?></span>
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                <label class="font-weight-bold">State: </label> <span class="fs-6 ml-4"><?= $row['state']; ?></span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="mb-3">
                                                                                    <label class="font-weight-bold">Postal Code: </label> <span class="fs-6 ml-4 "><?= $row['p_code'] ?></span>
                                                                                </div>
                                                                        </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </main>

                                        <div class="mt-3">
                                            <div class="card caed-body">
                                                <form action="orders-code.php" method="POST">
                                                    <input type="hidden" readonly name="tracking_no" value="<?= $orderData['tracking_no']; ?>" />
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label>Update Status</label>
                                                            <select name="status" class="form-select">
                                                                <option value="completed">completed</option>
                                                                <option value="pending">pending</option>
                                                                <option value="cancelled">cancelled</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <br>
                                                            <button type="submit" name="updateTodayOrdersStatus" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                else
                                {
                                    echo '<h5>No Record Found!</h5>';
                                    return false;
                                }
                            }
                            else
                            {
                                echo '<h5>Something Went Wrong</h5>';
                                return false;
                            }
                            ?>


                            <?php
                        }
                        else{
                            echo '<h5>No Record Found!</h5>';
                            return false;
                        }
                    }
                    else
                    {
                        echo '<h5>Something Went Wrong</h5>';
                    }

                }
                else
                {
                    ?>
                    <div class="text-center py-5">
                        <h5>No Tracking Number Found!</h5>
                        <div>
                            <a href="today-orders.php" class="btn btn-primary mt-4 w-25">Go Back To Orders</a>
                        </div>
                    </div>
                    <?php
                }
            ?>
        </div>
    </div>
</div> 


<?php include('includes/footer.php'); ?>