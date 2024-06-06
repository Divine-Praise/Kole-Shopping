<?php include('includes/header.php'); ?> 

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

<div class="card-body p-3 row" style="height: 78vh; display: flex; justify-content: center;  align-items: center;">

    <div class="col-md-4 py-1" style="border: 1px solid rgba(0,0,0,.3); border-radius: 5px;">
    
        <?= alertMessage(); ?>
        <h4 class="text-dark text-center mb-0 mt-1">Select Card</h4>
        <p class="text-gray-500 text-center mt-1">select the type of card to add</p>

        <form action="card.php" method="POST">
            <div class="col-md-12 my-4">
                <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                <img class="w-10 me-3 mb-0" src="arg_assets/img/logos/mastercard.png" alt="logo">
                <h6 class="mb-0">Master Card</h6>
                <input type="radio" class="ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Select Card" name="card" value="master-card">
                </div>
            </div>

            <div class="col-md-12 my-4">
                <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                <img class="w-10 me-3 mb-0" src="arg_assets/img/logos/visa.png" alt="logo">
                <h6 class="mb-0">Visa Card</h6>
                <input type="radio" class="ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Select Card" name="card" value="visa-card">
                </div>
            </div>
            <center><input type="submit" value="Continue to adding card" name="cardSelect" class="btn btn-gray-700"></center>
        </form>
    </div>
</div>

<?php include('includes/footer.php'); ?> 