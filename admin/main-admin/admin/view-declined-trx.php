<?php include('includes/header.php') ?>

<?php
    $paramValue = checkParamId('id');
    if(!is_numeric($paramValue)){
        echo '<h5>Id is not an Integer</h5>';
        // return false;
    }
    $salary = getById('salary', $paramValue);
    if($salary){
        if($salary['status'] == 200){
            ?>
                <main class="main-content position-relative border-radius-lg ">
                    <div class="container-fluid py-4">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <div class="card">
                                <div class="card-header pb-0 px-3 d-flex" style="justify-content: space-between;">
                                    <h6 class="mb-0">Transaction View</h6>
                                    <div><a href="declined_trx.php" class="btn btn-primary">Back</a></div>
                                </div>
                                <hr class="bg-gray-600 m-0">
                                <div class="card-body pt-4 p-3">
                                    <form action="#" method="POST">
                                        <div class="row">
                                                    <div class="col-md-7">
                                                        <input type="hidden" value="">
                                                        <h6 class="mb-0">Employee Information</h6>
                                                        <hr class="bg-gray-500">
                                                        <div class="row">
                                                            <div class="col-md 7">
                                                                <div class="mb-3">
                                                                    <label>Username: </label> <span class="small ml-4 "><?= $salary['data']['admin_username']; ?></span>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label>Full Name: </label> <span class="small ml-4"><?= $salary['data']['admin_fullname']; ?></span>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label>Email: </label> <span class="small ml-4"><?= $salary['data']['admin_email']; ?></span>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label>Phone Number: </label> <span class="small ml-4 "><?= $salary['data']['admin_phone']; ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="mb-3">
                                                                    <label>Acct No: </label> <span class="small ml-2"><?= $salary['data']['admin_acct_no']; ?></span>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label>Acct Name: </label> <span class="small ml-2"><?= $salary['data']['admin_acct_name']; ?></span>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label>Bank: </label> <span class="small ml-2"><?= $salary['data']['admin_acct_bank']; ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr class="bg-gray-500">
                                                        <h6 class="mb-0">Transaction Details</h6>
                                                        <hr class="bg-gray-500">
                                                        
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label>Status: </label> <span class="badge bg-danger">
                                                                        <?php 
                                                                        if($salary['data']['trx_status'] == 'decline'){
                                                                            echo 'Declined';
                                                                        }else{
                                                                            echo '';
                                                                        }
                                                                        ?>
                                                                    </span>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label>Worked Time: </label> <span class="small ml-4"><?= $salary['data']['admin_worktime']; ?></span>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label>Amount Requested: </label> <span class="small ml-4">N<?= $salary['data']['admin_amount']; ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label>Request Date: </label> <span class="small ml-2 "><?= date('d, M, Y, h:i a', strtotime($salary['data']['request_time'])) ?></span>
                                                                </div>
                                                                <div class="mb-3">
                                                            <label>Declined Date: </label> 
                                                            <span class="small ml-4">
                                                            <?php 
                                                                $adminId = $salary['data']['admin_id'];
                                                                $salId = $salary['data']['id'];
                                                                $appDateQuery = "SELECT date FROM trx_notification WHERE admin_id='$adminId' AND sal_id='$salId' LIMIT 1";
                                                                $appDateQueryRun = mysqli_query($conn, $appDateQuery);
                                                                if($appDateQueryRun){
                                                                    if(mysqli_num_rows($appDateQueryRun) > 0){
                                                                        $row = mysqli_fetch_assoc($appDateQueryRun);
                                                                        $appDate = $row['date'];
                                                                    }
                                                                }
                                                                echo date('d, M, Y, h:i a', strtotime($appDate));
                                                            ?>
                                                            </span>
                                                        </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-md-3 ml-auto">
                                                    <?php 
                                                        $adminUserName = $salary['data']['admin_username'];
                                                        $query = "SELECT image FROM admins WHERE username='$adminUserName'";
                                                        $adminImg = mysqli_query($conn, $query);
                                                        if($adminImg){
                                                            if(mysqli_num_rows($adminImg) > 0){
                                                                $row = mysqli_fetch_assoc($adminImg);
                                                                $image = $row['image'];
                                                            }
                                                        }
                                                    ?>
                                                        <div style="width: 100%; height: 15rem;" class="bg-gray-300 rounded">
                                                        <?php if($image != '') : ?>
                                                        <img src="../../<?= $image; ?>" alt="" width="100%" height="100%">
                                                        <?php else : ?>
                                                        <img src="assets2/img/undraw_profile.svg" alt="" width="100%" height="100%">
                                                        <?php endif; ?>
                                                        </div>
                                                        <div class="mt-2">
                                                            <a href="delete-declined-trx.php?id=<?= $item['id'] ?>"
                                                                    class="btn btn-danger"
                                                                    onclick="return confirm('Are you sure you want to delete this transaction Record?')"
                                                                >
                                                                Delete Record
                                                            </a>
                                                        </div>
                                                    </div>
                                                    </div>
                                            </form>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            <?php
        }else{
            echo '<div class="p-2">'. $salary['message'] . '</h5>';
        }
    }else{
        echo '<div class="p-2">Something Went Wrong</div>';
    }

?>

<?php include('includes/footer.php') ?>