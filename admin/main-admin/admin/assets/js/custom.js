$(document).ready(function (){
    alertify.set('notifier', 'position', 'top-right');

    $(document).on('click', '.increment', function (){

        var $quantityInput = $(this).closest('.qtyBox').find('.qty');
        var productId = $(this).closest('.qtyBox').find('.prodId').val();
        var currentValue = parseInt($quantityInput.val());

        if(!isNaN(currentValue)){
            var qtyVal = currentValue + 1;
            $quantityInput.val(qtyVal);
            quantityIncDec(productId, qtyVal);
        }
    });

    $(document).on('click', '.decrement', function (){

        var $quantityInput = $(this).closest('.qtyBox').find('.qty');
        var productId = $(this).closest('.qtyBox').find('.prodId').val();
        var currentValue = parseInt($quantityInput.val());
        
        if(!isNaN(currentValue) && currentValue > 1){
            var qtyVal = currentValue - 1;
            $quantityInput.val(qtyVal);
            quantityIncDec(productId, qtyVal);
        }
    });

    function quantityIncDec(prodId, qty){
        $.ajax({
            type: "POST",
            url: "orders-code.php",
            data: {
                'productIncDec': true,
                'product_id': prodId,
                'quantity': qty
            },
            success: function (response) {
                var res = JSON.parse(response);

                if(res.status == 200){
                    $('#productArea').load(' #productContent');
                    alertify.success(res.message);
                }else{
                    $('#productArea').load(' #productContent');
                    alertify.error(res.message);
                }
            }
        });
    }

    // Proceed to place order button clicked
    $(document).on('click', '.proceedToPlace', function () {

        var cphone = $('#cphone').val();
        var payment_mode = $('#payment_mode').val();

        if(payment_mode == ''){
            swal("Select Payment Mode","Select Your payment mode","warning");
            return false;
        }

        if(cphone == '' && !$.isNumeric(cphone)){
            swal("Enter Phone Number","Enter Valid Phone Number","warning");
            return false;
        } 
        
        var data = {
            'proceedToPlaceBtn': true,
            'cphone': cphone,
            'payment_mode': payment_mode,
        };

        $.ajax({
            type: "POST",
            url: "orders-code.php",
            data: data,
            success: function (response) {
                var res = JSON.parse(response);
                if(res.status == 200){
                    window.location.href = "order-summary.php";

                }else if(res.status == 404){

                    swal(res.message, res.message, res.status_type, {
                        buttons: {
                            catch: {
                                text: "Add Customer",
                                value: "catch"
                            },
                            cancel: "Cancel"
                        }
                    })
                    .then((value) => {
                        switch(value){

                            case "catch":
                                $('#c_phone').val(cphone);
                                $('#addCustomerModal').modal('show');
                                break;
                            default: 
                        }
                    });

                }else{
                    swal(res.message, res.message, res.status_type);
                }
            }
        });
    });

    // Add Customer to customers table
    $(document).on('click', '.saveCustomer', function () {

        var c_name = $('#c_name').val();
        var c_phone = $('#c_phone').val();
        var c_email = $('#c_email').val();

        if(c_name != '' && c_phone != '')
        {
            if($.isNumeric(c_phone)){
                var data = {
                    'saveCustomerBtn': true,
                    'name': c_name,
                    'phone': c_phone,
                    'email': c_email,
                }

                $.ajax({
                    type: "POST",
                    url: "orders-code.php",
                    data: data,
                    success: function (response) {
                        var res = JSON.parse(response);

                        if(res.status == 200){
                            swal(res.message, res.message, res.status_type);
                            $('#addCustomerModal').modal('hide');
                        }else if(res.status == 422){
                            swal(res.message, res.message, res.status_type);
                        }else{
                            swal(res.message, res.message, res.status_type);
                        }
                    }
                });

            }else{
                swal('Enter Valid Phone Number', '', 'warning');
            }
        }
        else
        {
            swal('Please Fill required fields', '', 'warning');
        }
    });

    // Send Admin a message
    $(document).on('click', '.sendMessage', function () {

        var s_name = $('#s_name').val();
        var s_email = $('#s_email').val();
        var s_message = $('#s_message').val();

        if(s_name != '' && s_email != '' && s_message != '')
        {
            var data = {
                'sendMessageBtn': true,
                's_name': s_name,
                's_email': s_email,
                's_message': s_message,
            }

            $.ajax({
                type: "POST",
                url: "mailer.php",
                data: data,
                success: function (response) {
                    var res = JSON.parse(response);

                    if(res.status == 200){
                        swal(res.message, res.message, res.status_type);
                        $('#contactAdminModal').modal('.close');
                    }else if(res.status == 422){
                        swal(res.message, res.message, res.status_type);
                    }else{
                        swal(res.message, res.message, res.status_type);
                    }
                }
            });
        }
        else
        {
            swal('Please Fill required fields', '', 'warning');
        }
    });

      // Save Admin Card
      $(document).on('click', '#saveMcard', function () {

        var adminId = $('#admin_id').val();
        var cardType = $('#card_type').val();
        var cardNumber = $('#mcard_number').val();
        var cardHolder = $('#card_holder').val();
        var card_mm_ex_date = $('#card_mm_ex_date').val();
        var card_yy_ex_date = $('#card_yy_ex_date').val();
        var cardCvv = $('#card_cvv').val();

        if(cardNumber != '' && cardHolder != '' && card_mm_ex_date != '' && card_yy_ex_date != '' && cardCvv != '')
        {
            var data = {
                'saveMcardBtn': true,
                'admin_id': adminId,
                'card_type': cardType,
                'mcard_number': cardNumber,
                'card_holder': cardHolder,
                'card_mm_ex_date': card_mm_ex_date,
                'card_yy_ex_date': card_yy_ex_date,
                'card_cvv': cardCvv,
            }

            $.ajax({
                type: "POST",
                url: "card.php",
                data: data,
                success: function (response) {
                    var res = JSON.parse(response);

                    if(res.status == 200){
                        swal(res.message, res.message, res.status_type);
                    }else if(res.status == 422){
                        swal(res.message, res.message, res.status_type);
                    }else{
                        swal(res.message, res.message, res.status_type);
                    }
                }
            });
        }
        else
        {
            swal('Please Fill required fields', '', 'warning');
            return false;
        }
    });

    // Save Admin Card
    $(document).on('click', '#saveVcard', function () {

        var adminId = $('#admin_id').val();
        var cardType = $('#card_type').val();
        var cardNumber = $('#vcard_number').val();
        var cardHolder = $('#card_holder').val();
        var card_mm_ex_date = $('#card_mm_ex_date').val();
        var card_yy_ex_date = $('#card_yy_ex_date').val();
        var cardCvv = $('#card_cvv').val();

        if(cardNumber != '' && cardHolder != '' && card_mm_ex_date != '' && card_yy_ex_date != '' && cardCvv != '')
        {
            var data = {
                'saveVcardBtn': true,
                'admin_id': adminId,
                'card_type': cardType,
                'vcard_number': cardNumber,
                'card_holder': cardHolder,
                'card_mm_ex_date': card_mm_ex_date,
                'card_yy_ex_date': card_yy_ex_date,
                'card_cvv': cardCvv,
            }

            $.ajax({
                type: "POST",
                url: "card.php",
                data: data,
                success: function (response) {
                    var res = JSON.parse(response);

                    if(res.status == 200){
                        swal(res.message, res.message, res.status_type);
                    }else if(res.status == 422){
                        swal(res.message, res.message, res.status_type);
                    }else{
                        swal(res.message, res.message, res.status_type);
                    }
                }
            });
        }
        else
        {
            swal('Please Fill required fields', '', 'warning');
            return false;
        }
    });


    // Billing Information
    $(document).on('click', '.saveBillInfo', function () {

        var admin_id = $('#admin_id').val();
        var p_fname = $('#p_fname').val();
        var p_mname = $('#p_mname').val();
        var p_lname = $('#p_lname').val();
        var p_email = $('#p_email').val();
        var p_phone = $('#p_phone').val();
        var p_add_phone = $('#p_add_phone').val();
        var p_address = $('#p_address').val();
        var p_add_address = $('#p_add_address').val();
        var p_nearB = $('#p_nearB').val();
        var p_state = $('#p_state').val();
        var p_pCode = $('#p_pCode').val();
        // var c_name = $('#c_name').val();
        // var c_land_line = $('#c_land_line').val();
        // var c_address = $('#c_address').val();
        // var c_add_address = $('#c_add_address').val();
        // var c_nearB = $('#c_nearB').val();
        // var c_state = $('#c_state').val();
        // var c_pCode = $('#c_pCode').val();

        if(p_fname != '' && p_mname != '' && p_lname != '' && p_email != '' && p_phone != '' && p_address != '' && p_nearB != '' && p_state != '' && p_pCode != '')
        {
            var data = {
                'saveBillInfoBtn': true,
                'admin_id': admin_id,
                'p_fname': p_fname,
                'p_mname': p_mname,
                'p_lname': p_lname,
                'p_email': p_email,
                'p_phone': p_phone,
                'p_add_phone': p_add_phone,
                'p_address': p_address,
                'p_add_address': p_add_address,
                'p_nearB': p_nearB,
                'p_state': p_state,
                'p_pCode': p_pCode,
            }

            $.ajax({
                type: "POST",
                url: "code.php",
                data: data,
                success: function (response) {
                    var res = JSON.parse(response);

                    if(res.status == 200){
                        swal(res.message, res.message, res.status_type);
                        $('#billInfoModal').modal('.close');
                    }else if(res.status == 422){
                        swal(res.message, res.message, res.status_type);
                    }else{
                        swal(res.message, res.message, res.status_type);
                    }
                }
            });
        }
        else
        {
            swal('Please Fill required fields', '', 'warning');
        }
    });

    $(document).on('click', '#saveOrder', function () {

        $.ajax({
            type: "POST",
            url: "orders-code.php",
            data: {
                'saveOrder': true
            },
            success: function (response) {
                var res = JSON.parse(response);

                if(res.status == 200){
                    swal(res.message, res.message, res.status_type);
                    $('#orderPlaceSuccessMessage').text(res.message);
                    $('#orderSuccessModal').modal('show');

                }else{
                    swal(res.message, res.message, res.status_type);
                }
            }
        });

    });


});

function printMyBillingArea() {
    var divContents = document.getElementById("myBillingArea").innerHTML;
    var a = window.open('', '');
    a.document.write('<html><title>D-Stores</title>');
    a.document.write('<body style="font-family: fangsong;">');
    a.document.write(divContents);
    a.document.write('</body></html>');
    a.document.close();
    a.print();
}

window.jsPDF = window.jspdf.jsPDF;
var docPDF = new jsPDF();

function downloadPDF(invoiceNo) {

    var elementHTML = document.querySelector('#myBillingArea');
    docPDF.html( elementHTML, {
        callback: function() {
            docPDF.save(invoiceNo + '.pdf');
        },
        x: 15,
        y: 15,
        width: 170,
        windowWidth: 650
    });

}

if (document.readyState == 'loading'){
    document.addEventListener("DOMContentLoaded", ready);
} else{
ready();
}

function ready(){
    countMsg();
    OpenEn();
}

function countMsg(){
    var msgNum = document.querySelector('.count-msg');
    var msgBox = document.getElementsByClassName('msg-box');
    msgNum.innerHTML = msgBox.length;
    console.log(msgNum);
}

function OpenEn(){
    var enClose = document.querySelector('#enClose');
    var enOpen = document.querySelector('#enOpen');
    
    enClose.style.display = "none";
    enOpen.style.display = "block";
}