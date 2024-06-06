<?php include('includes/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <?php alertMessage(); ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h5 mb-0 font-weight-bold" style="color: #495057">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm shadow-sm text-white" style="background: #495057;"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">

            <!-- Today Orders -->
            <div class="col-xl-3 col-md-6 mb-4">
            <a href="today-orders.php" style="text-decoration: none;">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Today Orders (Total)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                        $todayDate = date('y,m,d');
                                        $todayOrders = mysqli_query($conn, "SELECT * FROM orders WHERE order_date='$todayDate' ");

                                        if($todayOrders){
                                            if(mysqli_num_rows($todayOrders) > 0){
                                                $totalCountOrders = mysqli_num_rows($todayOrders);
                                                echo $totalCountOrders;
                                            }else{
                                                echo "0";
                                            }
                                        }else{
                                            echo 'Something Went Wrong!';
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-fw fa-table fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Total Orders -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="orders.php" style="text-decoration: none;">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Orders (Total)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= getCount('orders'); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Products -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="products.php" style="text-decoration: none;">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Products (Total)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= getCount('products'); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Categories -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="categories.php" style="text-decoration: none;">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Category (Total)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= getCount('categories'); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-fw fa-chart-area fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Customers -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="customers.php" style="text-decoration: none;">
                <div class="card border-left-dark shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                    Customers (Total)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= getCount('customers'); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Admins -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="admins.php" style="text-decoration: none;">
                <div class="card shadow h-100 py-2" style="border-left: 4px solid #495057;">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #495057;">
                                Employees (Total)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php 
                                        $employee = 'employee';
                                        $employees = mysqli_query($conn, "SELECT * FROM admins WHERE admin_type='$employee' ");

                                        if($employees){
                                            if(mysqli_num_rows($employees) > 0){
                                                $employeesCount = mysqli_num_rows($employees);
                                                echo $employeesCount;
                                            }else{
                                                echo "0";
                                            }
                                        }else{
                                            echo 'Something Went Wrong!';
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
        

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 py-2" style="border-left: 4px solid #d63384;">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #d63384;">
                                Pending Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Direct
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Social
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Referral
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of page -->
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4 col-xl-12 col-md-6 p-0">
                <div class="card-header fs-small text-primary">Recent Pending Orders 
                    <span class="float-end"><a href="orders.php" class="btn text-white" style="background: #495057;">View All</a></span>
                </div>
                <div class="card-body">
                    <?php 
                        $status = 'pending';
                        $query = "SELECT o.*, c.* FROM orders o, customers c
                        WHERE c.id = o.customer_id AND o.order_status='$status' ORDER BY o.id DESC LIMIT 5";
                        $orders = mysqli_query($conn, $query);
                        if($orders){
                            if(mysqli_num_rows($orders) > 0){
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
                                <?php       
                                                foreach($orders as $item){
                                                    ?>
                                                        <tr>
                                                            <td class="fw-bold"><?= $item['tracking_no']; ?></td>
                                                            <td><?= $item['name']; ?></td>
                                                            <td><?= $item['phone']; ?></td>
                                                            <td><?= date('d, M, Y', strtotime($item['order_date'])); ?></td>
                                                            <td><?= $item['order_status']; ?></td>
                                                            <td><?= $item['payment_mode']; ?></td>
                                                            <td>
                                                                <a href="orders-view.php?track=<?= $item['tracking_no']; ?>" class="btn btn-info mb-0 px-2 btn-sm">View</a>
                                                                <a href="orders-view-print.php?track=<?= $item['tracking_no']; ?>" class="btn btn-primary mb-0 px-2 btn-sm">Print</a>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                }
                                    ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php
                            }else{
                                echo '<h5>No Record Found</h5>';
                            }
                        }else{
                            echo '<h5>Something Went Wrong</h5>';
                        }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>