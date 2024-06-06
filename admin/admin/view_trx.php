<?php include('includes/header.php'); ?>

<!-- Message Modal-->
<?php
    $paramValue = checkParamId('id');
    if(!is_numeric($paramValue)){
        echo '<h5>Id is not an Integer</h5>';
        // return false;
    }
    $alert = getById('trx_notification', $paramValue);
    if($alert){
        if($alert['status'] == 200){

?>

<div
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alert Message</h5>
                <button class="close" type="button" aria-label="Close">
                    <a href="view-all-alert.php" style="text-decoration: none" class="text-gray-700"><span aria-hidden="true">×</span></a>
                </button>
            </div>
            <div class="modal-body">
                <?= $alert['data']['message']; ?>.
                <p class="float-end small mt-4"><?= date('d, M, Y, h:i a', strtotime($alert['data']['date'])) ?></p>
            </div>
            <div class="modal-footer">
                <a class="btn btn-secondary" href="view-all-alert.php">Back</a>
                <a class="btn btn-danger"
                onclick="return confirm('Are you sure you want to delete this Alert?')"
                href="delete-trx.php?id=<?= $alert['data']['id']; ?>">Delete</a>
            </div>
        </div>
    </div>
</div>

<?php
    }
    else
    {
        echo '<h5>'. $alert['message'] . '</h5>';
    }
    }
    else
    {
        echo '<h5>Something Went Wrong</h5>';
        // return false;
    }
            
?>


<?php include('includes/footer.php'); ?>