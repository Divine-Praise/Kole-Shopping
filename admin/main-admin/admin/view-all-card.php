<?php include('includes/header.php') ?>

<!-- link card css -->
<link rel="stylesheet" href="assets/css/bothcard.css">

<div class="row card-container">
    <!-- <div class="col-md-12"> -->
    <?php 
        $adminId = $_SESSION['loggedInUser']['user_id'];
        $query = "SELECT * FROM card WHERE admin_id='$adminId' ORDER BY id DESC";
        $card = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($card) > 0)
        {
        ?>
            <?php foreach($card as $item) : ?>
                <?php 
                if($item['card_type'] == 'Master card'){
                    ?>
                        <div class="mcard-box-container">

                            <div class="front">
                                <div class="image">
                                    <img src="arg_assets/img/curved-images/curved-10.jpg" alt="">
                                    <img src="arg_assets/img/logos/mastercard.png" alt="">
                                </div>
                                <div class="card-number-box"><?= $item['card_number'] ?></div>
                                <div class="flexbox">
                                    <div class="box">
                                        <span>card holder</span>
                                        <div class="card-holder-name"><?= $item['card_h_name'] ?></div>
                                    </div>
                                    <div class="box">
                                        <span>expires</span>
                                        <div class="expiration">
                                            <span class="exp-month"><?= $item['card_mm_ex_date'] ?></span> / 
                                            <span class="exp-year"><?= $item['card_yy_ex_date']; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <a href="visa-card-edit.php?id=<?= $item['id']; ?>" class="ms-auto">
                                    <i class="fas fa-pencil-alt text-white cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Card"></i>
                                </a>
                                <a class="text-white text-gradient mb-0 ml-2" href="card-delete.php?id=<?= $item['id'] ?>"
                                    onclick="return confirm('Are you sure you want to delete this Card?')">
                                    <i class="far fa-trash-alt me-2"></i>
                                </a>
                            </div>

                            <!-- <div class="back">
                                <div class="stripe"></div>
                                <div class="box">
                                    <span>cvv</span>
                                    <div class="cvv-box"></div>
                                    <img src="arg_assets/img/logos/mastercard.png" alt="">
                                </div>
                            </div> -->
                        </div>
                    <?php
                }else{
                    ?>
                         <div class="vcard-box-container">

                            <div class="front">
                                <div class="image">
                                    <img src="arg_assets/img/curved-images/curved-11.jpg" alt="">
                                    <img src="arg_assets/img/logos/visa.png" alt="">
                                </div>
                                <div class="card-number-box"><?= $item['card_number'] ?></div>
                                <div class="flexbox">
                                    <div class="box">
                                        <span>card holder</span>
                                        <div class="card-holder-name"><?= $item['card_h_name'] ?></div>
                                    </div>
                                    <div class="box">
                                        <span>expires</span>
                                        <div class="expiration">
                                            <span class="exp-month"><?= $item['card_mm_ex_date'] ?></span> / 
                                            <span class="exp-year"><?= $item['card_yy_ex_date'] ?></span>
                                        </div>

                                    </div>
                                </div>
                                <a href="visa-card-edit.php?id=<?= $item['id']; ?>" class="ms-auto">
                                    <i class="fas fa-pencil-alt text-white cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Card"></i>
                                </a>
                                <a class="text-danger text-gradient mb-0 ml-2" href="card-delete.php?id=<?= $item['id'] ?>"
                                    onclick="return confirm('Are you sure you want to delete this Card?')">
                                    <i class="far fa-trash-alt me-2"></i>
                                </a>
                            </div>

                            <!-- <div class="back">
                                <div class="stripe"></div>
                                <div class="box">
                                    <span>cvv</span>
                                    <div class="cvv-box"></div>
                                    <img src="arg_assets/img/logos/visa.png" alt="">
                                </div>
                            </div> -->
                        </div>
                    <?php
                }
                ?>
            <?php endforeach; ?>
            <?php
            }else{
            echo "<h5>You haven't added a card</h5>";
        }
        ?>
      
    <!-- </div> -->
</div>


<?php include('includes/footer.php') ?>