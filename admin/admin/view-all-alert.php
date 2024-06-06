<?php include('includes/header.php'); ?>

<!-- Nav Item - Alerts -->
<li class="nav-item no-arrow mx-1" style="list-style-type: none;">
    <!-- Dropdown - Alerts -->
    <div class="row my-5">
        <div class="col-md-5 m-auto shadow m-0 p-0">
        <h6 class="dropdown-header py-2 text-white px-3 rounded" style="background: #6f42c1; display: flex; justify-content: space-between; align-items: center;">
            Alerts Center
            <a class="nav-link float-end" href="#" style="text-decoration: none;">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <?php         
                    $adminID = $_SESSION['loggedInUser']['user_id'];
                    $msgStatus = 'unread';
                    $query = "SELECT * FROM trx_notification WHERE admin_id='$adminID' AND msg_status='$msgStatus' ORDER BY id DESC";
                    $notifyCount = mysqli_query($conn, $query);
                    $notifyCount = mysqli_query($conn, $query);
                    if(!$notifyCount){
                        echo '<div class="p-2">Something Went Wrong</div>';
                    }
                    if(mysqli_num_rows($notifyCount) > 0){
                        ?>
                            <span class="badge badge-danger badge-counter"><?php echo mysqli_num_rows($notifyCount); ?></span>
                        <?php
                    }else{
                        echo '';
                    }
                
                    ?>
                <span class="fs-6 text-gray-300">
                    <i>(
                    <?php         
                        $adminID = $_SESSION['loggedInUser']['user_id'];
                        $query = "SELECT * FROM trx_notification WHERE admin_id='$adminID' ORDER BY id DESC";
                        $notifyCount = mysqli_query($conn, $query);
                        $notifyCount = mysqli_query($conn, $query);
                        if(!$notifyCount){
                            echo '<div class="p-2">Something Went Wrong</div>';
                        }
                        if(mysqli_num_rows($notifyCount) > 0){
                            echo mysqli_num_rows($notifyCount);
                        }else{
                            echo '0';
                        }
                
                    ?>
                    )</i>
                </span>
            </a>
        </h6>
        <div style="height: 60vh; overflow-y: scroll;" class="bg-white">
                    <?php alertMessage(); ?>
            <?php 
                $adminID = $_SESSION['loggedInUser']['user_id'];
                $query = "SELECT * FROM trx_notification WHERE admin_id='$adminID' ORDER BY id DESC";
                $notify = mysqli_query($conn, $query);

                if($notify){
                    if(mysqli_num_rows($notify) > 0){
                        foreach($notify as $item){
                            ?>
                            <div>
                                <a class="dropdown-item d-flex align-items-center py-3" href="proccess_trx.php?id=<?= $item['id']; ?>">
                                    <div class="mr-3">
                                        <?php if($item['status'] == 'success') : ?>
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                        <?php elseif($item['status'] == 'decline') : ?>
                                        <div class="icon-circle bg-danger">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                        <?php elseif($item['status'] == 'request') : ?>
                                            <div class="icon-circle bg-warning">
                                                <i class="fas fa-exclamation-triangle text-white"></i>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="text-truncate">
                                        <div class="small text-gray-500"><?= date('d, M, Y, h:i a', strtotime($item['date'])) ?></div>
                                        <?php if($item['msg_status'] == 'unread') : ?>
                                        <span class="font-weight-bold"><?= $item['message'] ?></span>
                                        <?php else : ?>
                                        <span><?= $item['message'] ?></span>
                                        <?php endif; ?>
                                    </div>
                                </a>
                                <a href="delete-trx.php?id=<?= $item['id']; ?>"
                                    onclick="return confirm('Are you sure you want to delete this Message?')" style="text-decoration: none; width: 25px;"
                                    class="text-white"
                                    >
                                    <i class="fas fa-trash float-end mr-3"
                                        style="width: 25px; height: 25px; border-radius: 5px; background: #dc3545; display: grid; place-content: center; font-size: .8rem">
                                    </i>
                                    <div class="text-truncate">
                                        <hr class="bg-gray-500">
                                    </div>
                                </a>
                            </div>
                            <?php
                        }
                    }else{
                        echo "<div class='p-3'>There's no message for you here</div>";
                    }
                }else{
                    echo "<div class='p-3'>Something Went wrong</div>";
                }
            
            ?>
        </div>
        </div>
    </div>
</li>

<?php include('includes/footer.php'); ?>
