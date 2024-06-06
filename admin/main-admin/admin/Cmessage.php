<?php include('includes/header.php') ?>


<!-- Main Content -->
<div class="row m-0" style="display: flex; justify-content: center; align-items: center;">
    <div class="row mt-4">
        <h6 class="col-md-6 py-3 text-white" style="background: #495057; margin: auto; border-bottom-left-radius: 20px; border-bottom-right-radius: 20px;">
            Message Center
            <div class="float-end">
                <i class="fas fa-envelope-open fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">
                    <?php 
                        $msgStatus = 'unread';
                        $allMsg = mysqli_query($conn, "SELECT * FROM message WHERE status='$msgStatus' ");

                        if($allMsg){
                            if(mysqli_num_rows($allMsg) > 0){
                                $totalUnreadMsg = mysqli_num_rows($allMsg);
                                echo $totalUnreadMsg;
                            }else{
                                echo "0";
                            }
                        }else{
                            echo 'Something Went Wrong!';
                        }
                    ?>
                </span>
                <i class="text-gray-400">(<span class="count-msg">0</span>)</i>
            </div>
        </h6>
    </div>
    <div class="col-sm-5 mt-1 bg-white shadow mb-4 pb-4 m-0" style="height: 62vh; overflow-y: scroll;">

        <!-- Dropdown - Messages -->
        <div class="row">
            <?php alertMessage(); ?>

            <?php 

                // $message = getAll('message');
                $query = "SELECT * FROM message ORDER BY id DESC";
                $message = mysqli_query($conn, $query);
                if(!$message){
                    echo '<h5>Something Went Wrong</h5>';
                    return false;
                }

                if(mysqli_num_rows($message) > 0){
                    foreach($message as $msg){
                        ?>
                            <a href="Cmessage-proccess.php?id=<?= $msg['id'] ?>" style="text-decoration: none;" name="msgClicked">
                                <div class="msg-box dropdown-item d-flex align-items-center py-2" data-toggle="modal" data-target="#msgModal">
                                    <div class="mr-3">
                                            <?php if($msg['gender'] != 'male') : ?>
                                            <img class="rounded-circle" src="assets2/img/undraw_profile_3.svg" width="50px" height="50px" alt="...">
                                            <?php elseif($msg['gender'] != 'female') :?>
                                            <img class="rounded-circle" src="assets2/img/undraw_profile_2.svg" width="50px" height="50px" alt="...">
                                            <?php else : ?>
                                            <img class="rounded-circle" src="assets2/img/undraw_profile.svg" width="50px" height="50px" alt="...">
                                            <?php endif; ?>
                                            <?php if($msg['status'] == 'unread') : ?>
                                            <div class="status-indicator bg-info" style="width: 10px; height: 10px; border-radius: 50%"></div>
                                            <?php else:  ?>
                                            <div class="status-indicator bg-gray-400" style="width: 10px; height: 10px; border-radius: 50%; position: absolute;"></div>
                                            <?php endif; ?>

                                    </div>
                                    <?php if($msg['status'] == 'unread') : ?>
                                        <div class="font-weight-bold text-truncate">
                                            <div class="text-truncate"><?= $msg['s_message'] ?></div>
                                            <div class="small text-gray-500"><?= $msg['s_name'] ?> · <?= date('d, M, Y, h:i a', strtotime($msg['sent'])) ?></div>
                                        </div>
                                    <?php else: ?>
                                        <div class="text-truncate">
                                            <div class="text-truncate"><?= $msg['s_message'] ?></div>
                                            <div class="small text-gray-500"><?= $msg['s_name'] ?> · <?= date('d, M, Y, h:i a', strtotime($msg['sent'])) ?></div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div>
                                    <a href="Cmessage-delete.php?id=<?= $msg['id']; ?>"
                                        onclick="return confirm('Are you sure you want to delete this Message?')" style="text-decoration: none; width: 25px;"
                                        class="text-white"
                                        >
                                        <i class="fas fa-trash float-end mr-1"
                                            style="width: 25px; height: 25px; border-radius: 5px; background: #dc3545; display: grid; place-content: center; font-size: .8rem">
                                        </i>
                                    </a>
                                </div>
                                <div class="text-truncate">
                                    <hr class="m-0 p-0 bg-gray-500">
                                </div>
                            </a>
                        <?php
                    }
                }else{
                    echo '<h5>No Record Found!</h5>';
                }


            ?>
    </div>
</div>

<?php include('includes/footer.php') ?>