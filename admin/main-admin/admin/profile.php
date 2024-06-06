<?php 
include('includes/header.php');
?>

<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false" style="background: #495057; border-radius: 15px;">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-gray-500" style="text-decoration: none;" href="index.php">Home</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Profile</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Profile</h6>
        </nav>
    </div>
</nav>
<!-- End Navbar -->

<div class="container-fluid py-4">

    <?php alertMessage(); ?>

    <form action="code2.php" method="POST" enctype="multipart/form-data">

            <?php
                $adminId = $_SESSION['loggedInUser']['user_id'];
                $query = "SELECT * FROM admins WHERE id='$adminId'";
                $adminRes = mysqli_query($conn, $query);
                if($adminRes){
                    if(mysqli_num_rows($adminRes) > 0){
                        $admins = mysqli_fetch_assoc($adminRes);
                        ?>
                            <input type="hidden" name="adminId" value="<?= $admins['id']; ?>">
                            <div class="row">       
                                <div class="col-md-8">
                                    <div class="card shadow-sm mb-4">
                                        <div class="card-header bg-white pb-0">
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0">Edit Profile</p>
                                            <a href="index.php" class="btn text-white btn-sm ms-auto" style="background: #495057;">Back</a>
                                        </div>
                                        </div>
                                        <div class="card-body">
                                        <p class="text-uppercase text-sm">Admin Information</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Username</label>
                                                <input class="form-control" type="text" name="username" value="<?= $admins['username']; ?>">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Email address</label>
                                                <input class="form-control" type="email" name="email" value="<?= $admins['email']; ?>">
                                            </div>
                                            </div>
                                            <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">First name</label>
                                                <input class="form-control" type="text" name="firstname" value="<?= $admins['firstname']; ?>">
                                            </div>
                                            </div>
                                            <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Last name</label>
                                                <input class="form-control" type="text" name="lastname" value="<?= $admins['lastname']; ?>">
                                            </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="">Phone Number *</label>
                                                <input type="number" name="phone" value="<?= $admins['phone']; ?>" required class="form-control" />
                                            </div>
                                        </div>
                                        <hr class="horizontal dark">
                                        <p class="text-uppercase text-sm">Contact Information</p>
                                        <div class="row">
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Address</label>
                                                <input class="form-control" type="text" name="address" value="<?= $admins['address']; ?>">
                                            </div>
                                            </div>
                                            <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">City</label>
                                                <input class="form-control" type="text" name="city" value="<?= $admins['city']; ?>">
                                            </div>
                                            </div>
                                            <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Country</label>
                                                <input class="form-control" type="text" name="country" value="<?= $admins['country']; ?>">
                                            </div>
                                            </div>
                                            <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Postal code</label>
                                                <input class="form-control" type="text" maxlength="6" name="postal_code" value="<?= $admins['postal_code']; ?>">
                                            </div>
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
                                            <a href="javascript:;" data-toggle="modal" data-target="#viewProfilePhoto">
                                                <?php if($admins['image'] != '') : ?>
                                                <img src="../<?= $admins['image'] ?>" class="rounded-circle img-fluid border border-2 border-white bg-secondary">
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
                                                        <input type="file" value="Upload Your Profile Picture" class="form-control" name="image">
                                                    </div>
                                                    <div class="col-md-5">
                                                        <button class="btn text-white float-end" style="background: #495057;" name="updateMainProfile">Save Changes</button>
                                                    </div>
                                                </div>
                                        </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        <?php
                    }else{
                        echo 'No User Found';
                    }
                }else{
                    echo 'Something Went Wrong';
                }
            ?>
    </form>
</div>

<?php include('includes/footer.php'); ?>