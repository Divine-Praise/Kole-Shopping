<?php include('includes/header.php'); ?>

<!-- link card css -->
<link rel="stylesheet" href="assets/css/card.css">

<div class="card-container row">

    <div class="card-box-container">

        <div class="front">
            <div class="image">
                <img src="arg_assets/img/curved-images/curved-11.jpg" alt="">
                <img src="arg_assets/img/logos/visa.png" alt="">
            </div>
            <div class="card-number-box">####&nbsp;&nbsp;&nbsp;####&nbsp;&nbsp;&nbsp;####&nbsp;&nbsp;&nbsp;####</div>
            <div class="flexbox">
                <div class="box">
                    <span>card holder</span>
                    <div class="card-holder-name">full name</div>
                </div>
                <div class="box">
                    <span>expires</span>
                    <div class="expiration">
                        <span class="exp-month">mm</span> / 
                        <span class="exp-year">yy</span>
                    </div>

                </div>
            </div>
        </div>

        <div class="back">
            <div class="stripe"></div>
            <div class="box">
                <span>cvv</span>
                <div class="cvv-box"></div>
                <img src="arg_assets/img/logos/visa.png" alt="">
            </div>
        </div>
    </div>

    <div class="form col-md-5">
        <input type="hidden" id="admin_id" value="<?=  $_SESSION['loggedInUser']['user_id']; ?>">
        <input type="hidden" id="card_type" value="Visa card">
        <div class="inputBox">
            <span>card number</span>
            <input type="text" maxlength="16" class="card-number-input" id="vcard_number">
        </div>
        <div class="inputBox">
            <span>card holder</span>
            <input type="text" class="card-holder-input" id="card_holder">
        </div>
        <div class="flexbox">
            <div class="inputBox">
                <span>expiration mm</span>
                <select id="card_mm_ex_date" class="month-input">
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
                <select id="card_yy_ex_date" class="year-input">
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
                <input type="text" maxlength="4" class="cvv-input" id="card_cvv">
            </div>
        </div>
        <input type="button" value="submit" class="submit-btn" id="saveVcard">
    </div>
</div>

<?php include('includes/footer.php'); ?>