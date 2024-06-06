<?php include('includes/header.php') ?>


<!-- Message Modal-->
<?php
    $paramValue = checkParamId('id');
    if(!is_numeric($paramValue)){
        echo '<h5>Id is not an Integer</h5>';
        // return false;
    }
    $message = getById('message', $paramValue);
    if($message){
        if($message['status'] == 200){

?>
    <div>
        <div class="modal-dialog" role="document">
            <div class="modal-content shadow">
                <div class="modal-header">
                    <a href="message.php" style="text-decoration: none;"><i class="fas fa-fw fa-arrow-left fs-5 text-secondary"></i></a>
                    <h5 class="modal-title" id="exampleModalLabel">Message</h5>
                </div>
                <div class="modal-body">
                    <div class="card-body">

                        <label>From:</label>
                        <h6><?= $message['data']['s_name'] ?></h6>

                        <label>Email:</label>
                        <h6><?= $message['data']['s_email'] ?></h6>
                        <br>
                        <label>Message:</label>
                        <h6><?= $message['data']['s_message'] ?></h6><br>

                        <h6 class="float-end small">Sent: <span><?= date('d, M, Y, h:i a', strtotime($message['data']['sent'])) ?></span></h6>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="message-delete.php?id=<?= $message['data']['id']; ?>"
                        onclick="return confirm('Are you sure you want to delete this Message?')"
                        class="btn btn-danger" type="button" data-dismiss="modal"
                        >
                        Delete
                    </a>
                    <a class="btn text-white" style="background: #6f42c1;" href="message-reply.php?id=<?= $message['data']['id']; ?>"><i class="fas fa-reply"></i> Reply</a>
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