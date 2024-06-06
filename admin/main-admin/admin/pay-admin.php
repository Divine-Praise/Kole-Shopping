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

<main class="main-content position-relative border-radius-lg ">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-10 m-auto">
                <div class="card">
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
                    <div class="card-header pb-0 px-3 d-flex" style="justify-content: space-between;">
                        <h6 class="mb-0"><?= $salary['data']['admin_username']; ?> Salary request</h6>
                        <div><a href="pending_trx.php" class="btn text-white" style="background: #495057;">Back</a></div>
                    </div>
                    <hr class="bg-gray-600 m-0">
                    <div class="card-body pt-4 p-3">
                        <form action="#" method="POST">
                            <div class="row">
                                        <div class="col-md-7">
                                            <input type="hidden" value="<?= $salary['data']['id']; ?>">
                                            <h6 class="mb-0">Sub Admin Information</h6>
                                            <hr class="bg-gray-500">
                                            <div class="mb-3">
                                                <label>User Name: </label> <span class="small ml-4"><?= $salary['data']['admin_username']; ?></span>
                                            </div>
                                            <div class="mb-3">
                                                <label>Full Name: </label> <span class="small ml-4"><?= $salary['data']['admin_fullname']; ?></span>
                                            </div>
                                            <div class="mb-3">
                                                <label>Email: </label> <span class="small ml-4"><?= $salary['data']['admin_email']; ?></span>
                                            </div>
                                            <div class="mb-3">
                                                <label>Phone Number: </label> <span class="small ml-4"><?= $salary['data']['admin_phone']; ?></span>
                                            </div>
                                            <hr class="bg-gray-500">
                                            <h6 class="mb-0">Bank Acct Details</h6>
                                            <hr class="bg-gray-500">
                                            
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <div class="mb-3">
                                                        <label>Bank Acct Number: </label> <span class="small ml-4"><?= $salary['data']['admin_acct_no']; ?></span>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Name Reg With Bank: </label> <span class="small ml-4"><?= $salary['data']['admin_acct_name']; ?></span>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Bank: </label> <span class="small ml-4"><?= $salary['data']['admin_acct_bank']; ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="mb-3">
                                                        <label>Worked Time: </label> <span class="small ml-2"><?= $salary['data']['admin_worktime']; ?></span>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Amount Requested: </label> <span class="small ml-2">N<?= $salary['data']['admin_amount']; ?></span>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Date: </label> <span class="small ml-2"><?= date('d, M, Y, h:i a', strtotime($salary['data']['request_time'])) ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 ml-auto">
                                            <div style="width: 100%; height: 15rem;" class="bg-gray-300 rounded">
                                            <?php
                                            $adminUsername = $salary['data']['admin_username'];
                                            $query = "SELECT image FROM admins WHERE username='$adminUsername'";
                                            $adminImg = mysqli_query($conn, $query);
                                            if($adminImg){
                                                if(mysqli_num_rows($adminImg) > 0){
                                                    $row = mysqli_fetch_assoc($adminImg);
                                                    $image = $row['image'];
                                                }
                                            }
                                            ?>
                                                <?php if($image > 0) : ?>
                                                <img src="../../<?= $image; ?>" width="100%" height="100%" alt="">
                                                <?php else: ?>
                                                <img src="assets2/img/undraw_profile.svg" width="100%" height="100%" alt="">
                                                <?php endif; ?>
                                            </div>
                                            <div class="mt-5">
                                                <a href="con-to-pay-admin.php?id=<?= $salary['data']['id']; ?>" class="btn btn-success">Continue to pay</a>
                                                <a href="decline_trx.php?id=<?= $salary['data']['id'] ?>"
                                                        class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to decline this transaction?')"
                                                    >
                                                    Decline
                                                </a>
                                            </div>
                                        </div>
                                    <?php
                                        }
                                        else
                                        {
                                            echo '<h5>'. $salary['message'] . '</h5>';
                                        }
                                    }
                                    else
                                    {
                                        echo '<h5>Something Went Wrong</h5>';
                                        // return false;
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