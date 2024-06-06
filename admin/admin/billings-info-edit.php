<?php include('includes/header.php') ?>
<?php

$paramValue = checkParamId('id');
if(!is_numeric($paramValue)){
    echo '<h5>Id is not an integer</h5>';
    return false;
}

$adminId = $_SESSION['loggedInUser']['user_id'];
$query = "SELECT * FROM bill_info WHERE id = '$paramValue'";
$billInfo = mysqli_query($conn, $query);

if($billInfo){
    if(mysqli_num_rows($billInfo) > 0){
        foreach($billInfo as $item){
            ?>
            <div class="" id="billEditInfoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Billing Information</h1><br>
                            <a href="billing.php" class="btn-close" data-dismiss="modal" aria-label="Close"></a>
                        </div>
                        <div class="modal-body">
                            <?= alertMessage(); ?>
                            <div class="px-3 float-end" style="font-size: 0.8rem">* required</div>
                            <form action="code.php" method="POST">
                                <input type="hidden" name="bill_id" value="<?= $item['id'] ?>">
                                <p class="fs-6" id="exampleModalLabel">Personal information</p>
                                <div class="mb-3">
                                    <label>First Name*</label>
                                    <input type="text" class="form-control" name="p_fname" value="<?= $item['p_fname'] ?>" >
                                </div>
                                <div class="mb-3">
                                    <label>Middle Name*</label>
                                    <input type="text" class="form-control" name="p_mname" value="<?= $item['p_mname'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label>Last Name*</label>
                                    <input type="text" class="form-control" name="p_lname" value="<?= $item['p_lname'] ?>" >
                                </div>
                                <div class="mb-3">
                                    <label>Email Address *</label>
                                    <input type="email" class="form-control" name="p_email" value="<?= $item['p_email'] ?>">
                                </div>

                                <p class="" id="exampleModalLabel">Contact Information</p>
                                <div class="mb-3">
                                    <label>Phone No *</label>
                                    <input type="number" class="form-control" name="p_phone" value="<?= $item['p_phone'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label>Additional Phone No</label>
                                    <input type="number" class="form-control" name="p_add_phone" value="<?= $item['p_add_phone'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label>Billing Address *</label>
                                    <input type="text" class="form-control" name="p_address" value="<?= $item['p_address'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label>Additional Address</label>
                                    <input type="text" class="form-control" name="p_add_address" value="<?= $item['p_add_address'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label>Nearest Bus-stop *</label>
                                    <input type="text" class="form-control" name="p_nearB" value="<?= $item['p_nearB'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label>State *</label>
                                    <input type="text" class="form-control" name="p_state" value="<?= $item['p_state'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label>Postal code *</label>
                                    <input type="text" maxlength="6" class="form-control" name="p_pCode" value="<?= $item['p_pCode'] ?>">
                                </div>

                                <!-- <p class="" id="exampleModalLabel">Company Information (if applicable)</p>
                                <div class="mb-3">
                                    <label>Company Name *</label>
                                    <input type="text" class="form-control" id="c_name">
                                </div>
                                <div class="mb-3">
                                    <label>Company Land Line *</label>
                                    <input type="text" class="form-control" id="c_land_line">
                                </div>
                                <div class="mb-3">
                                    <label>Company Address *</label>
                                    <input type="text" class="form-control" id="c_address">
                                </div>
                                <div class="mb-3">
                                    <label>Additional Address</label>
                                    <input type="text" class="form-control" id="c_add_address">
                                </div>
                                <div class="mb-3">
                                    <label>Nearest Bus-stop</label>
                                    <input type="text" class="form-control" id="c_nearB">
                                </div>
                                <div class="mb-3">
                                    <label>State *</label>
                                    <input type="text" class="form-control" id="c_state">
                                </div>
                                <div class="mb-3">
                                    <label>Postal code *</label>
                                    <input type="text" maxlength="6" class="form-control" id="c_pCode">
                                </div> -->
                            </div>
                            <div class="modal-footer">
                                <a href="billing.php"  class="btn btn-secondary" data-dismiss="modal">Back</a>
                                <button type="submit" class="btn text-white" name="updateBillInfo" style="background: #6f42c1;">Save Info!</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
        }
    }else{
        echo '<h5>No Billing Information Found</h5>';
    }
}else{
    echo '<h5>Something Went Wrong</h5>';
}


?>

<?php include('includes/footer.php') ?>