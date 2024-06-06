<?php include('includes/header.php');?>

  
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

  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" style="background: #495057;" id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Home</a></li>
          <li class="breadcrumb-item text-sm text-white active" aria-current="page">Billing</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Billing</h6>
      </nav>
    </div>
  </nav>
  <!-- End Navbar -->

  <!-- Main Content -->
  <div class="container-fluid py-4">
      <div class="row">
        <?= alertMessage(); ?>
        <div class="col-lg-8">
          <div class="row">
            <div class="col-xl-6 mb-xl-0 mb-4">
              <div class="card bg-transparent shadow-xl">
                <div class="overflow-hidden position-relative border-radius-xl" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/card-visa.jpg');">
                  <span class="mask bg-gradient-dark"></span>
                  <div class="card-body position-relative z-index-1 p-3">
                    <i class="fas fa-wifi text-white p-2"></i>
                    <h5 class="text-white mt-4 mb-5 pb-2">4562&nbsp;&nbsp;&nbsp;1122&nbsp;&nbsp;&nbsp;4594&nbsp;&nbsp;&nbsp;7852</h5>
                    <div class="d-flex">
                      <div class="d-flex">
                        <div class="me-4">
                          <p class="text-white text-sm opacity-8 mb-0">Card Holder</p>
                          <h6 class="text-white mb-0">Jack Peterson</h6>
                        </div>
                        <div>
                          <p class="text-white text-sm opacity-8 mb-0">Expires</p>
                          <h6 class="text-white mb-0">11/22</h6>
                        </div>
                      </div>
                      <div class="ms-auto w-20 d-flex align-items-end justify-content-end">
                        <img class="w-60 mt-2" src="arg_assets/img/logos/mastercard.png" alt="logo">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6">
              <div class="row">
                <div class="col-md-6" data-toggle="modal" data-target="#requestSalaryModal" style="cursor: pointer;">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg shadow text-center border-radius-lg bg-gradient-dark">
                        <i class="fas fa-landmark opacity-10"></i>
                      </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center mb-0">Salary</h6>
                      <span class="text-xs">Belong Interactive</span>
                      <hr class="horizontal dark my-3">
                      <?php
                        $adminId = $_SESSION['loggedInUser']['user_id'];
                        $query = "SELECT acct_bal FROM admins WHERE id = '$adminId'";
                        $acct_bal = mysqli_query($conn, $query);

                        if(mysqli_num_rows($acct_bal) > 0){
                          foreach($acct_bal as $item){
                            ?>
                            <h5 class="mb-0">N<?= $item['acct_bal']  ?></h5>
                            <?php
                          }
                        }
                      ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mt-md-0 mt-4">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg shadow text-center border-radius-lg bg-gradient-dark">
                        <i class="fas fa-landmark opacity-10"></i>
                      </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center mb-0">Bonus</h6>
                      <span class="text-xs">Freelance Bonus</span>
                      <hr class="horizontal dark my-3">
                      <?php
                        $adminId = $_SESSION['loggedInUser']['user_id'];
                        $query = "SELECT bonus FROM admins WHERE id='$adminId'";
                        $acct_bal = mysqli_query($conn, $query);

                        if(mysqli_num_rows($acct_bal) > 0){
                          foreach($acct_bal as $item){
                            ?>
                            <h5 class="mb-0">N<?= $item['bonus'] ?></h5>
                            <?php
                          }
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12 mb-lg-0 mb-4">
              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Payment Method</h6>
                    </div>
                    <div class="col-6 text-end">
                      <a class="btn bg-gradient-dark mb-0" href="card-type.php"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Card</a>
                    </div>
                  </div>
                </div>

                <div class="card-body p-3">
                  <div class="row">

                  <?php 
                      $adminId = $_SESSION['loggedInUser']['user_id'];
                      $query = "SELECT * FROM card WHERE admin_id='$adminId' ORDER BY id DESC LIMIT 2";
                      $card = mysqli_query($conn, $query);
                      
                      if(mysqli_num_rows($card) > 0)
                      {
                        ?>
                        <?php foreach($card as $item) : ?>
                          <div class="col-md-6 mb-md-0 mb-4">
                            <div class="card card-body border card-plain border-radius-lg d-flex align-items-center gap-3 flex-row">
                              <?php if($item['card_type'] == 'Master card') : ?>
                              <img class="w-10 me-3 mb-0" src="arg_assets/img/logos/mastercard.png" alt="logo">
                              <?php elseif($item['card_type'] == 'Visa card') : ?>
                              <img class="w-10 me-3 mb-0" src="arg_assets/img/logos/visa.png" alt="logo">
                              <?php endif; ?>
                              <h6 class="mb-0">****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;
                                <?= substr($item['card_number'],12, 4); ?>
                              </h6>
                              <?php if($item['card_type'] == 'Master card') : ?>
                              <a href="master-card-edit.php?id=<?= $item['id']; ?>" class="ms-auto">
                                <i class="fas fa-pencil-alt text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Card"></i>
                              </a>
                              <a class="text-danger text-gradient mb-0" href="card-delete.php?id=<?= $item['id'] ?>"
                              onclick="return confirm('Are you sure you want to delete this billing Info?')"
                              ><i class="far fa-trash-alt me-2"></i></a>
                              <?php elseif($item['card_type'] == 'Visa card') : ?>
                                <a href="visa-card-edit.php?id=<?= $item['id']; ?>" class="ms-auto">
                                <i class="fas fa-pencil-alt text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Card"></i>
                              </a>
                              <a class="text-danger text-gradient mb-0" href="card-delete.php?id=<?= $item['id'] ?>"
                              onclick="return confirm('Are you sure you want to delete this Card?')"
                              ><i class="far fa-trash-alt me-2"></i></a>
                              <?php endif; ?>
                            </div>
                          </div>
                        <?php endforeach; ?>
                        <?php
                      }else{
                        echo '';
                      }
                  ?>
                  <?php
                    if(mysqli_num_rows($card) > 0)
                    {
                      ?>
                        <div class="mt-3">
                          <a href="view-all-card.php" class="float-end">View Your Cards</a>
                        </div>
                      <?php
                    }else{
                      echo '';
                    }
                  ?>

                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card pb-3">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-6 d-flex align-items-center">
                  <h6 class="mb-0">Invoices</h6>
                </div>
                <div class="col-6 text-end">
                  <a href="view-all-invoice.php" class="btn btn-outline-primary btn-sm mb-0">View All</a>
                </div>
              </div>
            </div>
            <div class="card-body p-3 pb-0">
              <ul class="list-group">
                <?php 
                  $adminId = $_SESSION['loggedInUser']['user_id'];
                  $admin = 'sub_admin';
                  $query = "SELECT * FROM orders 
                  WHERE order_placed_by_id='$adminId' 
                  AND admins='$admin'
                  ORDER BY id DESC LIMIT 5";
                  $orders = mysqli_query($conn, $query);

                  if($orders){
                    if(mysqli_num_rows($orders) > 0){
                      ?>
                      <?php foreach ($orders as $item)  : ?>
                         <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                          <div class="d-flex flex-column">
                            <h6 class="mb-1 text-dark font-weight-bold text-sm"><?= date('F, d, Y', strtotime($item['order_date'])) ?></h6>
                            <span class="text-xs">#<?= $item['invoice_no'] ?></span>
                          </div>
                          <div class="d-flex align-items-center text-sm">
                            N<?= $item['total_amount'] ?>
                            <a href="orders-view-print.php?track=<?= $item['tracking_no']; ?>" class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1"></i> PDF</a>
                          </div>
                        </li>
                      <?php endforeach; ?>
                      <?php
                    }else{
                      ?>
                       <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                          No Invoice found
                        </li>
                      <?php
                    }
                  }
                ?>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-7 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3 d-flex" style="justify-content: space-between;">
              <h6 class="mb-0">Billing Information</h6>
              <div class="float-end d-flex gap-2">
              <?php 
                  $adminId = $_SESSION['loggedInUser']['user_id'];
                  $query = "SELECT * FROM bill_info WHERE admin_id='$adminId' ORDER BY id DESC LIMIT 3";
                  $billInfo = mysqli_query($conn, $query);
                  ?>
                  <?php 
                  if(mysqli_num_rows($billInfo) >= 3){
                    echo '';
                  }else{
                    ?>
                    <button type="button" class="btn text-white float-end" style="background: #495057" data-toggle="modal" data-target="#billInfoModal">Add Info</button>
                    <?php
                  }
                  ?>
                  <a href="billing.php" class="btn text-white" style="background: #495057;"><i class="fas fa-reply"></i></a>
              </div>
            </div>
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <?php

                  if($billInfo){
                    
                    if(mysqli_num_rows($billInfo) > 0){

                      foreach($billInfo as $item){
                        ?>
                          <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div class="d-flex flex-column">
                              <h6 class="mb-3 text-sm"><?= $item['p_fname'] ?> <?= $item['p_lname'] ?></h6>
                              <span class="mb-2 text-xs">Phone Number: <span class="text-dark font-weight-bold ms-sm-2"><?= $item['p_phone'] ?></span></span>
                              <span class="mb-2 text-xs">Email Address: <span class="text-dark ms-sm-2 font-weight-bold"><?= $item['p_email'] ?></span></span>
                              <span class="text-xs">Address: <span class="text-dark ms-sm-2 font-weight-bold"><?= $item['p_address'] ?></span></span>
                            </div>
                            <div class="ms-auto text-end">
                              <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="billings-info-delete.php?id=<?= $item['id'] ?>"
                              onclick="return confirm('Are you sure you want to delete this billing Info?')"
                              ><i class="far fa-trash-alt me-2"></i>Delete</a>
                              <a class="btn btn-link text-dark px-3 mb-0" href="billings-info-edit.php?id=<?= $item['id'] ?>"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true" data-toggle="modal"></i>Edit</a>
                            </div>
                          </li>
                        <?php
                      }

                    }else{
                      echo "
                          <li class='list-group-item border-0 p-4 mb-2 bg-gray-100 border-radius-lg text-center'> 
                            Click on the add Info button to add a new billing information
                          </li>
                      ";
                    }

                  }else{
                    echo '<h5>Something Went Wrong</h5>';
                  }
                ?>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-5 mt-4">
          <div class="card h-100 mb-4">
            <div class="card-header pb-0 px-3">
              <div class="row">
                <div class="col-md-6">
                  <h6 class="mb-0">Your Salary Transaction's</h6>
                </div>
                <?php 
                  if(isset($_GET['date'])){
                    $adminId = $_SESSION['loggedInUser']['user_id'];
                    $salaryReqDate = validate($_GET['date']);
                    if($salaryReqDate != ''){
                      $query = "SELECT * FROM salary 
                      WHERE created_at='$salaryReqDate' 
                      AND admin_id='$adminId' ORDER BY id DESC LIMIT 6";
                    }else{
                      $query = "SELECT * FROM salary WHERE admin_id='$adminId' ORDER BY id DESC LIMIT 6";
                    }
                  }else{
                    $query = "SELECT * FROM salary WHERE admin_id='$adminId' ORDER BY id DESC LIMIT 6";
                  }
                  $salary = mysqli_query($conn, $query);
                  ?>
                      <div class="col-md-6 d-flex justify-content-end align-items-center">
                        <!-- <i class="far fa-calendar-alt me-2"></i> -->
                        <small>
                          <form action="" method="GET" class='d-flex gap-2'>
                            <input type="date" class="form-control" name="date"
                            value="<?= isset($_GET['date']) == true ? $_GET['date']:''; ?>" 
                            style="border: none; outline: none; background: none; box-shadow: 2px 2px 10px 0px rgba(0,0,0,.2)">
                            <button class="btn text-white" style="background: #495057;" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                            <a href="billing.php" class="btn text-white" style="background: #495057;"><i class="fas fa-reply"></i></a>
                          </form>
                        </small>
                      </div>
                    </div>
                  </div>
                  <div class="card-body pt-4 p-3">
          
                  <?php if(mysqli_num_rows($salary) == 0) : ?>
                  <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3"></h6>
                  <?php else : ?>
                  <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Newest</h6>
                  <?php endif; ?>
                  <ul class="list-group">
                <?php
                  if($salary){
                    if(mysqli_num_rows($salary) > 0){
                      foreach($salary as $item){
                        ?>
                          <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                              <?php if($item['trx_status'] == 'pending') : ?>
                                <button class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-exclamation"></i></button>
                              <?php elseif($item['trx_status'] == 'accept') : ?>
                                <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                              <?php else : ?>
                              <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-down"></i></button>
                              <?php endif; ?>
                              <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark text-sm">Salary Request</h6>
                                <span class="text-xs"><?= date('d F Y, h:i a', strtotime($item['request_time'])) ?></span>
                              </div>
                            </div>
                            <?php if($item['trx_status'] == 'pending') : ?>
                              <div class="d-flex align-items-center text-dark text-sm font-weight-bold">Pending</div>
                            <?php elseif($item['trx_status'] == 'accept') : ?>
                              <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">+ N <?= $item['admin_amount'] ?></div>
                            <?php else : ?>
                              <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold"> N <?= $item['admin_amount'] ?></div>
                            <?php endif; ?>
                          </li>
                        <?php
                      }
                    }else{
                    ?>
                    <div class="col-md-12 text-center">No Transaction Found</div>
                    <?php
                    }
                  }
                ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
</main>

<?php include('includes/footer.php') ?>