<?php include('includes/header.php'); ?>

<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false" style="background: #495057; border-radius: 15px;">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-gray-500" style="text-decoration: none;" href="index.php">Home</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Orders</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Orders</h6>
        </nav>
    </div>
</nav>
<!-- End Navbar -->

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="m-0 font-weight-bold" style="color: #495057">Orders</h5>
                </div>
                <div class="col-md-8">
                    <form action="" method="GET">
                        <div class="row g-1">
                            <div class="col-md-4">
                                <input type="date" 
                                    name="date" 
                                    class="form-control"
                                    value="<?= isset($_GET['date']) == true ? $_GET['date']:''; ?>"
                                />
                            </div>
                            <div class="col-md-4">
                                <select name="payment_status" class="form-select">
                                    <option value="">-- Select Payment Status --</option>
                                    <option 
                                        value="Cash Payment"
                                        <?= 
                                            isset($_GET['payment_status']) == true 
                                            ? 
                                            ($_GET['payment_status'] == 'Cash Payment' ? 'selected':'')
                                            :
                                            '';
                                        ?>
                                        >
                                        Cash Payment
                                    </option>
                                    <option 
                                        value="Online payment"
                                        <?= 
                                            isset($_GET['payment_status']) == true 
                                            ? 
                                            ($_GET['payment_status'] == 'Online payment' ? 'selected':'')
                                            :
                                            '';
                                        ?>
                                        >
                                        Online Payment
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn text-white" style="background: #495057;">Filter</button>
                                <a href="orders.php" class="btn btn-danger">Reset</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-3">
            <?php alertMessage(); ?>
        </div>
        <div class="card-body">
            <?php 

                if(isset($_GET['date']) || isset($_GET['payment_status'])){

                    $orderDate = validate($_GET['date']);
                    $paymentStatus = validate($_GET['payment_status']);

                    if($orderDate != '' && $paymentStatus == ''){
                        $query = "SELECT o.id as orders_id, o.*, c.* FROM orders o, customers c
                        WHERE c.id = o.customer_id AND o.order_date='$orderDate' ORDER BY orders_id DESC";
                    }elseif($orderDate == '' && $paymentStatus != ''){
                        $query = "SELECT o.id as orders_id, o.*, c.* FROM orders o, customers c
                        WHERE c.id = o.customer_id AND o.payment_mode='$paymentStatus' ORDER BY orders_id DESC";
                    }elseif($orderDate != '' && $paymentStatus != ''){
                        $query = "SELECT o.id as orders_id, o.*, c.* FROM orders o, customers c
                        WHERE c.id = o.customer_id 
                        AND o.order_date='$orderDate' 
                        AND o.payment_mode='$paymentStatus' ORDER BY orders_id DESC";
                    }else{
                        $query = "SELECT o.id as orders_id, o.*, c.* FROM orders o, customers c
                        WHERE c.id = o.customer_id ORDER BY orders_id DESC";
                    }
                }else{
                    
                    $query = "SELECT o.id as orders_id, o.*, c.* FROM orders o, customers c
                    WHERE c.id = o.customer_id ORDER BY orders_id DESC";
                }

                $orders = mysqli_query($conn, $query);
                if($orders){
                    if(mysqli_num_rows($orders) > 0)
                    {
                        ?>

                        <div class="table-responsive">
                            <table id="dataTable" class="display table table-striped table-bordered align-items-center justify-center" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <!-- <th>ID</th> -->
                                        <th>Tracking No.</th>
                                        <th>C Name</th>
                                        <th>C Phone No.</th>
                                        <th>Order Date</th>
                                        <th>Order Status</th>
                                        <th>Payment Mode</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($orders as $orderItem) :?>
                                        <tr>
                                            <td class="fw-bold"><?= $orderItem['tracking_no']; ?></td>
                                            <td><?= $orderItem['name']; ?></td>
                                            <td><?= $orderItem['phone']; ?></td>
                                            <td><?= date('d, M, Y', strtotime($orderItem['order_date'])); ?></td>
                                            <td><?= $orderItem['order_status']; ?></td>
                                            <td><?= $orderItem['payment_mode']; ?></td>
                                            <td>
                                                <a href="orders-view.php?track=<?= $orderItem['tracking_no']; ?>" class="btn btn-info mb-0 px-2 btn-sm">View</a>
                                                <a href="orders-view-print.php?track=<?= $orderItem['tracking_no']; ?>" class="btn btn-primary mb-0 px-2 btn-sm">Print</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <?php
                    }
                    else
                    {
                        echo '<h5>No Record Available!</h5>';
                    }
                }
                else
                {
                    echo '<h5>Something Went Wrong</h5>';
                }

            ?>
        </div>
    </div>
</div> 

<?php include('includes/footer.php'); ?>