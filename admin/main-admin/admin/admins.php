<?php include('includes/header.php'); ?>

<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false" style="background: #495057; border-radius: 15px;">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-gray-500" style="text-decoration: none;" href="index.php">Home</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Employees</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Employees</h6>
        </nav>
    </div>
</nav>
<!-- End Navbar -->

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold" style="color: #495057">Employees
                <a href="admins-create.php" class="btn float-end text-white" style="background: #495057;">Add Employee</a>
            </h5>
        </div>
        <div class="card-body">

            <?php alertMessage(); ?>

            <?php
                // $admins = getAll('admins');
                $admin_type = 'employee';
                $query = "SELECT * FROM admins WHERE admin_type='$admin_type'";
                $admins = mysqli_query($conn, $query);
                if(!$admins){
                    echo "<h4>Something Went Wrong!</h4>";
                    return false;
                }
                if(mysqli_num_rows($admins) > 0){
                    
            ?>

            <div class="table-responsive">
                <table id="dataTable" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Gender</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Acct Bal</th>
                            <th>Bonus Bal</th>
                            <th>User Status</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($admins as $adminItem) : ?>
                            <tr>
                                <td><?= $adminItem['id'] ?></td>
                                <?php if($adminItem['image'] != '') : ?>
                                <td><img src="../../<?= $adminItem['image'] ?>" class="bg-gray-400" width="50px" height="50px"></td>
                                <?php else : ?>
                                <td><img src="assets2/img/undraw_profile.svg" width="50px" height="50px" class="bg-gray-400" ></td>
                                <?php endif; ?>
                                <td>
                                    <?php 
                                        if($adminItem['gender'] == 'male'){
                                            echo '<i class="fas fa-male"></i> M';
                                        }else{
                                            echo '<i class="fas fa-female"></i> F';
                                        }
                                    ?>
                                </td>
                                <td><?= $adminItem['username'] ?></td>
                                <td><?= $adminItem['email'] ?></td>
                                <td>N<?= $adminItem['acct_bal'] ?></td>
                                <td>N<?= $adminItem['bonus'] ?></td>
                                <td>
                                    <?php  
                                        if($adminItem['is_ban'] == 1){
                                            echo '<span class="badge bg-danger">Banned</span>';
                                        }else{
                                            echo '<span class="badge bg-primary">Active</span>';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <a href="admins-edit.php?id=<?= $adminItem['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                                    <a href="admins-delete.php?id=<?= $adminItem['id'] ?>"
                                         class="btn btn-danger btn-sm"
                                         onclick="return confirm('Are you sure you want to delete this Admin')"
                                    >
                                        Delete
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
                            <h4 class="mb-0">No Record found</h4>
                        </tr>
                    <?php
                }
            ?>

        </div>
    </div>
</div> 

<?php include('includes/footer.php'); ?>