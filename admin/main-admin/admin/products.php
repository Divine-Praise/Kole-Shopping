<?php include('includes/header.php'); ?>

<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false" style="background: #495057; border-radius: 15px;">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-gray-500" style="text-decoration: none;" href="index.php">Home</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Products</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Products</h6>
        </nav>
    </div>
</nav>
<!-- End Navbar -->

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold" style="color: #495057">Products
                <a href="products-create.php" class="btn float-end text-white" style="background: #495057;">Add Product</a>
            </h5>
        </div>
        <div class="card-body">

            <?php alertMessage(); ?>

            <?php
                $products = getAll('products');
                if(!$products){
                    echo "<h4>Something Went Wrong!</h4>";
                    return false;
                }
                if(mysqli_num_rows($products) > 0){
                    
            ?>

            <div class="table-responsive">
                <table id="dataTable" class="table table-striped table-bordered align-items-center justify-center" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($products as $item) : ?>
                            <tr>
                                <td><?= $item['id'] ?></td>
                                <td>
                                    <img src="../<?= $item['image']; ?>" style="width: 50px; height: 50px;" alt="Img">
                                </td>
                                <td><?= $item['name'] ?></td>
                                <td>
                                    <?php  
                                        if($item['status'] == 1){
                                            echo '<span class="badge bg-danger">Hidden</span>';
                                        }else{
                                            echo '<span class="badge bg-primary">Visible</span>';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <a href="products-edit.php?id=<?= $item['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                                    <a
                                        href="products-delete.php?id=<?= $item['id'] ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this Product')"
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