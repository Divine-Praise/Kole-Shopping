<?php include('includes/header.php'); ?>

<!-- link card css -->
<link rel="stylesheet" href="assets/css/mastercard.css">

<?php
 $paramValue = checkParamId('id');
 if(!is_numeric($paramValue)){
     echo '<h5>'.$paramValue.'</h5>';
     return false;
 }

 $card = getById('card', $paramValue);
 if($card['status'] == 200)
 {
    ?>
        <div class="card-container row">

            <div class="card-box-container">

                <div class="front">
                    <div class="image">
                        <img src="arg_assets/img/curved-images/curved-10.jpg" alt="">
                        <img src="arg_assets/img/logos/mastercard.png" alt="">
                    </div>
                    <div class="card-number-box"><?= $card['data']['card_number']; ?></div>
                    <div class="flexbox">
                        <div class="box">
                            <span>card holder</span>
                            <div class="card-holder-name"><?= $card['data']['card_h_name']; ?></div>
                        </div>
                        <div class="box">
                            <span>expires</span>
                            <div class="expiration">
                                <span class="exp-month"><?= $card['data']['card_mm_ex_date']; ?></span> / 
                                <span class="exp-year"><?= $card['data']['card_yy_ex_date']; ?></span>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="back">
                    <div class="stripe"></div>
                    <div class="box">
                        <span>cvv</span>
                        <div class="cvv-box"></div>
                        <img src="arg_assets/img/logos/mastercard.png" alt="">
                    </div>
                </div>
            </div>

            <div class="form col-md-5">
                <?php alertMessage(); ?>
                <form action="card.php" method="POST">
                    <input type="hidden" name="admin_id" value="<?=  $_SESSION['loggedInUser']['user_id']; ?>">
                    <input type="hidden" name="card_type" value="<?= $card['data']['card_type'] ?>">
                    <input type="hidden" name="card_id" value="<?= $card['data']['id'] ?>">
                    <div class="inputBox">
                        <span>card number</span>
                        <input type="text" maxlength="16" class="card-number-input" name="mcard_number" value="<?= $card['data']['card_number']; ?>">
                    </div>
                    <div class="inputBox">
                        <span>card holder</span>
                        <input type="text" class="card-holder-input" name="card_holder" value="<?= $card['data']['card_h_name']; ?>">
                    </div>
                    <div class="flexbox">
                        <div class="inputBox">
                            <span>expiration mm</span>
                            <select name="card_mm_ex_date" class="month-input" value="<?= $card['data']['card_mm_ex_date']; ?>">
                                <option value="month" selected disabled>month</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                        <div class="inputBox">
                            <span>expiration yy</span>
                            <select name="card_yy_ex_date" class="year-input" value="<?= $card['data']['card_yy_ex_date']; ?>">
                                <option value="year" selected disabled>years</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                                <option value="2031">2031</option>
                                <option value="2033">2033</option>
                                <option value="2034">2034</option>    
                            </select>
                        </div>
                        <div class="inputBox">
                            <span>cvv</span>
                            <input type="text" maxlength="4" class="cvv-input" name="card_cvv">
                        </div>
                    </div>
                    <input type="submit" value="Update" class="submit-btn" name="updateMcard">
                </form>
            </div>
        </div>
    <?php
 }

?>


<?php include('includes/footer.php'); ?>