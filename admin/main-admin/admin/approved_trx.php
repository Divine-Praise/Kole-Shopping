<?php include('includes/header.php'); ?>

<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false" style="background: #495057; border-radius: 15px;">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-gray-500" style="text-decoration: none;" href="index.php">Home</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Transaction</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Approved</h6>
        </nav>
    </div>
</nav>
<!-- End Navbar -->

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold" style="color: #495057">Approved Salary Transaction
                <!-- <a href="categories-create.php" class="btn float-end text-white" style="background: #495057;">Add Category</a> -->
            </h5>
        </div>
        <div class="card-body">

            <?php alertMessage(); ?>

            <?php
                // $categories = getAll('categories');
                $salStatus = 'accept';
                $query = "SELECT * FROM salary WHERE trx_status='$salStatus' ORDER BY id DESC";
                $salary = mysqli_query($conn, $query);
                if(!$salary){
                    echo "<h4>Something Went Wrong!</h4>";
                    return false;
                }
                if(mysqli_num_rows($salary) > 0){
                    
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
                            <th>DATE REQ</th>
                            <th>DATE APPR</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i = 1;
                        foreach($salary as $item) : 
                        ?>
                            <tr>
                                <td><?= $i++ ?></td>
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
                                <?php 
                                    $adminId = $item['admin_id'];
                                    $salId = $item['id'];
                                    $appDateQuery = "SELECT date FROM trx_notification WHERE admin_id='$adminId' AND sal_id='$salId' LIMIT 1";
                                    $appDateQueryRun = mysqli_query($conn, $appDateQuery);
                                    if($appDateQueryRun){
                                        if(mysqli_num_rows($appDateQueryRun) > 0){
                                            $row = mysqli_fetch_assoc($appDateQueryRun);
                                            $appDate = $row['date'];
                                        }
                                    }
                                ?>
                                <td><?= date('d M, Y h:i a',strtotime($appDate)); ?></td>
                                <td>
                                    <?php  
                                        if($item['trx_status'] == 'accept'){
                                            echo '<span class="badge bg-success">Approved</span>';
                                        }else{  
                                            echo '';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <a href="view-approved-trx.php?id=<?= $item['id'] ?>" class="btn btn-info btn-sm">View</a>
                                    <a href="delete_trx.php?id=<?= $item['id'] ?>"
                                            class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this transaction Record?')"
                                        >
                                        <i class="fas fa-trash float-end"></i>
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
                            <div class='p-1'>You have'nt approved any transaction yet</div>
                        </tr>
                    <?php
                }
            ?>

        </div>
    </div>
</div> 

<?php include('includes/footer.php'); ?>