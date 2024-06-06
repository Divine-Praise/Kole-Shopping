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
            <div class="col-lg-4 m-auto">
                <?php alertMessage(); ?>
                <div class="card pb-3">
                    <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                        <h6 class="mb-0">Making Payment</h6>
                        </div>
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
                        <div class="col-6 text-end">
                            <a href="pay-admin.php?id=<?= $salary['data']['id']; ?>" class="btn btn-outline-primary btn-sm mb-0">Back</a>
                        </div>
                    </div>
                    </div>
                    <div class="card-body p-3 pb-0">
                        <label>You're about to Make a salary payment to <?= $salary['data']['admin_username']; ?></label>
                        <hr class="bg-gray-500">
                       
                                        <form action="payadmin-code.php" method="POST">
                                            <input type="hidden" name="salary_id" value="<?= $salary['data']['id']; ?>">
                                            <?php  
                                            $sal_user = $salary['data']['admin_username'];
                                            $query = "SELECT username FROM admins WHERE username='$sal_user' LIMIT 1";
                                            $query_run = mysqli_query($conn, $query);
                                            if(mysqli_num_rows($query_run) > 0){
                                                $row = mysqli_fetch_assoc($query_run);
                                                $adminUsername = $row['username'];
                                            }
                                            ?>
                                            <input type="hidden" name="admin_username" value="<?= $adminUsername ?>">
                                            <div class="mb-2">
                                                <label>account number:</label>
                                                <input type="text" readonly name="acct_no" value="<?= $salary['data']['admin_acct_no']; ?>" class="form-control">
                                            </div>
                                            <div class="mb-2">
                                                <label>account name:</label>
                                                <input type="text" readonly name="acct_name" value="<?= $salary['data']['admin_acct_name']; ?>" class="form-control">
                                            </div>
                                            <div class="mb-2">
                                                <label>Bank:</label>
                                                <select name="bank_code" class="form-select">
                                                    <?php if($salary['data']['admin_acct_bank'] == 'GTB Bank') : ?>
                                                    <option value="058" selected>GTB Bank</option>
                                                    <?php elseif($salary['data']['admin_acct_bank'] == 'Access Bank') : ?>
                                                    <option value="044" selected>Access Bank</option>
                                                    <?php elseif($salary['data']['admin_acct_bank'] == 'FCMB') : ?>
                                                    <option value="214" selected>FCMB</option>
                                                    <?php elseif($salary['data']['admin_acct_bank'] == 'Zenith Bank') : ?>
                                                    <option value="057" selected>Zenith Bank</option>
                                                    <?php elseif($salary['data']['admin_acct_bank'] == 'Opay') : ?>
                                                    <option value="004" selected>Opay</option>
                                                    <?php else : ?>
                                                    <option value="" selected>No Bank Provided</option>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                            <div class="mb-2">
                                                <label>amount(N):</label>
                                                <input type="text" name="amount" readonly value="<?= $salary['data']['admin_amount']; ?>" class="form-control">
                                            </div>
                                            <div class="mb-2">
                                                <label>Do you wish tip this employee? enter amount below(N):</label>
                                                <input type="number" name="bonus" class="form-control">
                                            </div>
                                            <hr class="bg-gray-500">
                                            <label>Note that this amount will be deducted from your payment gateway account.(N)</label>
                                            <hr class="bg-gray-500">
                                            <center><button type="submit" class="btn btn-primary" name="payAdminBtn">Pay <?= $salary['data']['admin_username']; ?> Now</button></center>
                                        </form>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include('includes/footer.php'); ?>