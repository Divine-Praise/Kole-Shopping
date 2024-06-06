<?php include('includes/header.php') ?>


<!-- Message Modal-->
<?php
    $paramValue = checkParamId('id');
    if(!is_numeric($paramValue)){
        echo '<h5>Id is not an Integer</h5>';
        // return false;
    }
    $message = getById('a_message', $paramValue);
    if($message){
        if($message['status'] == 200){

?>
    <div>
        <div class="modal-dialog" role="document">

                <div class="modal-content shadow">
                    <div class="modal-header">
                        <a href="Amessage-view.php?id=<?= $message['data']['id'] ?>" style="text-decoration: none;"><i class="fas fa-fw fa-arrow-left fs-5 text-secondary"></i></a>
                        <h5 class="text-truncate modal-title" id="exampleModalLabel">Replying <?= $message['data']['s_name']; ?>.</h5>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">

                            <label>Sender:</label>
                            <input type="text" readonly class="form-control border border-none" value="admin@kolestore.com">
                            <!-- <br> -->

                            <label class="mt-2">To:</label>
                            <input type="text" readonly class="form-control border border-none" value="<?= $message['data']['s_email'] ?>">
                            <!-- <br> -->

                            <label class="mt-2">Sender message:</label>
                            <textarea name="" readonly class="form-control border border-none" rows="4"><?= $message['data']['s_message'] ?></textarea>
                            <!-- <br> -->

                            <label class="mt-2">Your reply:</label>
                            <textarea name="" class="form-control" rows="5"></textarea>
                            <!-- <br> -->

                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="Amessage.php" class="btn btn-danger">Close</a>
                        <button type="button" class="btn text-white" style="background: #495057;">Send <i class='bx bx-send'></i></button>
                    </div>
                </div>
        </div>
    </div>
<?php
    }
    else
    {
        echo '<h5>'. $message['message'] . '</h5>';
    }
    }
    else
    {
        echo '<h5>Something Went Wrong</h5>';
        // return false;
    }
            
?>

<?php include('includes/footer.php') ?>