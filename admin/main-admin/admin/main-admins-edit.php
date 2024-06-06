<?php include('includes/header.php'); ?>


<div class="container-fluid py-4">

    <?php alertMessage(); ?>

    <form action="code2.php" method="POST" enctype="multipart/form-data">

            <?php
                $paramValue = checkParamId('id');
                if(!is_numeric($paramValue)){
                    echo '<h5>Id is not an Integer</h5>';
                    // return false;
                }
                $admins = getById('admins', $paramValue);
                if($admins){
                    if($admins['status'] == 200){

            ?>
            <input type="hidden" name="adminId" value="<?= $admins['data']['id']; ?>">
            <div class="row">       
                   <div class="col-md-8">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-white pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Edit Profile</p>
                            <a href="main-admins.php" class="btn text-white btn-sm ms-auto" style="background: #495057;">Back</a>
                        </div>
                        </div>
                        <div class="card-body">
                        <p class="text-uppercase text-sm">Admin Information</p>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Username</label>
                                <input class="form-control" type="text" name="username" required value="<?= $admins['data']['username']; ?>">
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Email address</label>
                                <input class="form-control" type="email" name="email" required value="<?= $admins['data']['email']; ?>">
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">First name</label>
                                <input class="form-control" type="text" name="firstname" required value="<?= $admins['data']['firstname']; ?>">
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Last name</label>
                                <input class="form-control" type="text" name="lastname" required value="<?= $admins['data']['lastname']; ?>">
                            </div>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <p class="text-uppercase text-sm">Contact Information</p>
                        <div class="row">
                            <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Address</label>
                                <input class="form-control" type="text" name="address" required value="<?= $admins['data']['address']; ?>">
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">City</label>
                                <input class="form-control" type="text" name="city" required value="<?= $admins['data']['city']; ?>">
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Country</label>
                                <input class="form-control" type="text" name="country" required value="<?= $admins['data']['country']; ?>">
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Postal code</label>
                                <input class="form-control" type="text" name="postal_code" value="<?= $admins['data']['postal_code']; ?>">
                            </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Phone Number *</label>
                                <input type="number" name="phone" value="<?= $admins['data']['phone']; ?>" required class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Password *</label>
                                <input type="password" name="password" class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">Is Ban *</label>
                                <br/>
                                <input type="checkbox" name="is_ban" <?= $admins['data']['is_ban'] == true ? 'checked':''; ?> style="width: 30px; height: 30px;" />
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="card card-profile shadow-sm">
                        <img src="assets2/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
                        <div class="row justify-content-center">
                        <div class="col-4 col-lg-4 order-lg-2">
                            <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                            <a href="javascript:;">
                                <?php if($admins['data']['image'] != '') : ?>
                                <img src="../<?= $admins['data']['image'] ?>" class="rounded-circle img-fluid border border-2 border-white bg-secondary">
                                <?php else: ?>
                                <img src="assets2/img/undraw_profile.svg" class="rounded-circle img-fluid border border-2 border-white bg-secondary">
                                <?php endif; ?>
                            </a>
                            </div>
                        </div>
                        </div>
                        <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                        <div class="d-flex justify-content-between">
                                <div class="row">
                                    <div class="col-md-7">
                                        <input type="file" value="../<?= $admins['data']['image'] ?>" class="form-control" name="image">
                                    </div>
                                    <div class="col-md-5">
                                        <button class="btn text-white float-end" style="background: #495057;" name="updateMainAdmin">Save Changes</button>
                                    </div>
                                </div>
                        </div>
                        </div>
                    </div> 
            <?php
                    }
                    else
                    {
                        echo '<h5>'. $admins['message'] . '</h5>';
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
    </form>
</div>

<?php include('includes/footer.php'); ?>