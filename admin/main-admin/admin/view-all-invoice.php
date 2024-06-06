<?php include('includes/header.php'); ?>

  
<!-- arg linking -->

<!--     Fonts and icons     -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<style>
  *{
    font-family: 'Poppins', san-serif;
  }
</style>

<!-- Nucleo Icons -->
<link href="arg_assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="arg_assets/css/nucleo-svg.css" rel="stylesheet" />

<!-- CSS Files -->
<link id="pagestyle" href="arg_assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />

<div class="col-lg-5" style="margin: auto;">
    <div class="card h-100">
    <div class="card-header pb-0 p-3">
        <div class="row">
        <div class="col-6 d-flex align-items-center">
            <h6 class="mb-0">Invoices</h6>
        </div>
        <div class="col-6 text-end">
            <a href="view-all-invoice.php" class="btn btn-outline-primary btn-sm mb-0">Reset</a>
        </div>
        </div>
    </div>
        <div class="card-body p-3 pb-0" style="overflow-y: scroll;">
        <form action="" method="GET">
            <div class="input-group mb-3">
                <input type="text" required class="form-control" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" placeholder="Search data">
                <button type="submit" class="btn btn-primary" name="">Search</button>
            </div>
        </form>
            <ul class="list-group" style="height: 55vh;">
                <?php 
                    if(isset($_GET['search'])){
                        $searchItem = $_GET['search'];
                        if($searchItem != ''){
                            
                            $adminId = $_SESSION['loggedInUser']['user_id'];
                            $admin = 'sub_admin';
                            $query = "SELECT * FROM orders 
                            WHERE CONCAT(order_date,invoice_no,total_amount) LIKE '%$searchItem%' 
                            AND order_placed_by_id='$adminId' 
                            AND admins = '$admin'
                            ORDER BY id DESC";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0){
                                    foreach($query_run as $item){
                                        ?>
                                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-1 text-dark font-weight-bold text-sm"><?= date('F, d, Y', strtotime($item['order_date'])) ?></h6>
                                                    <span class="text-xs"><?= $item['invoice_no'] ?></span>
                                                </div>
                                                <div class="d-flex align-items-center text-sm">
                                                    $<?= $item['total_amount'] ?>
                                                    <a href="orders-view-print.php?track=<?= $item['tracking_no']; ?>" class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1"></i> PDF</a>
                                                </div>
                                            </li>
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                        <div class="col-lg-12"><h4>No Invoice found</h4></div>
                                    <?php
                                }
                        }else{
                            ?>
                                <div class="col-lg-12"><h4>No Invoice found</h4></div>
                            <?php
                        }
                    }else{
                        $adminId = $_SESSION['loggedInUser']['user_id'];
                        $admin = 'sub_admin';
                        $query = "SELECT * FROM orders 
                        WHERE order_placed_by_id='$adminId' 
                        AND admins = '$admin'
                        ORDER BY id DESC";
                        $query_run = mysqli_query($conn, $query);

                        if(mysqli_num_rows($query_run) > 0){
                            foreach($query_run as $item){
                                ?>
                                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark font-weight-bold text-sm"><?= date('F, d, Y', strtotime($item['order_date'])) ?></h6>
                                            <span class="text-xs"><?= $item['invoice_no'] ?></span>
                                        </div>
                                        <div class="d-flex align-items-center text-sm">
                                            $<?= $item['total_amount'] ?>
                                            <a href="orders-view-print.php?track=<?= $item['tracking_no']; ?>" class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1"></i> PDF</a>
                                        </div>
                                    </li>
                                <?php
                            }
                        }
                        else
                        {
                            ?>
                                <div class="col-lg-12"><h4>No Invoice found</h4></div>
                            <?php
                        }
                    }
                ?>
            </ul>
        </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>