<?php include('includes/header.php'); ?>

<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false" style="background: #495057; border-radius: 15px;">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-gray-500" style="text-decoration: none;" href="index.php">Home</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Transaction</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Pending</h6>
        </nav>
    </div>
</nav>
<!-- End Navbar -->

<div class="container-fluid mb-4">
    <div class="card mt-4 shadow mb-4">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold" style="color: #495057">Pending Salary Transaction
                <!-- <a href="categories-create.php" class="btn float-end text-white" style="background: #495057;">Add Category</a> -->
            </h5>
        </div>
        <div class="card-body">

            <?php alertMessage(); ?>

            <?php
                // $categories = getAll('categories');
                $salStatus = 'pending';
                $query = "SELECT * FROM salary WHERE trx_status='$salStatus' ORDER BY id DESC";
                $pendingSalary = mysqli_query($conn, $query);
                if(!$pendingSalary){
                    echo "<h4>Something Went Wrong!</h4>";
                    return false;
                }
                if(mysqli_num_rows($pendingSalary) > 0){
                    
            ?>

            <div class="table-responsive">
                <table id="dataTable" class="table table-striped table-bordered align-items-center justify-center" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>IMAGE</th>
                            <th>USERNAME</th>
                            <th>EMAIL</th>
                            <th>WORK TIME</th>
                            <th>AMOUNT</th>
                            <th>DATE</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php  
                                $i = 1;
                                foreach($pendingSalary as $item) : 
                            ?>
                            <tr>
                                <?php 
                                    $adminUserName = $item['admin_username'];
                                    $query = "SELECT image FROM admins WHERE username='$adminUserName'";
                                    $adminImg = mysqli_query($conn, $query);
                                    if($adminImg){
                                        if(mysqli_num_rows($adminImg) > 0){
                                            $row = mysqli_fetch_assoc($adminImg);
                                            $image = $row['image'];
                                        }
                                    }
                                ?>
                                <td><?= $i++ ?></td>
                                <?php if($image != '') : ?>
                                <td><img src="../../<?= $image; ?>" alt="" width="50px" height="50px"></td>
                                <?php else : ?>
                                <td><img src="assets2/img/undraw_profile.svg" alt="" width="50px" height="50px"></td>
                                <?php endif; ?>
                                <td><?= $item['admin_username'] ?></td>
                                <td><?= $item['admin_email'] ?></td>
                                <td><?= $item['admin_worktime'] ?></td>
                                <td>N<?= $item['admin_amount'] ?></td>
                                <td><?= date('d M, Y h:i a',strtotime($item['request_time'])) ?></td>
                                <td>
                                    <?php  
                                        if($item['trx_status'] == 'pending'){
                                            echo '<span class="badge bg-warning">Pending</span>';
                                        }else{  
                                            echo '';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <a href="pay-admin.php?id=<?= $item['id'] ?>" class="btn btn-success btn-sm">Pay</a>
                                    <a href="decline_trx.php?id=<?= $item['id'] ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to decline this transaction?')"
                                        >
                                        Decline
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <?php 
                }else{
                    ?>
                        <tr>
                            <div class='p-1'>No pending transaction found!</div>
                        </tr>
                    <?php
                }
            ?>

        </div>
    </div>
</div> 

<?php include('includes/footer.php'); ?>