<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        <form
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                    aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn text-white" style="background: #6f42c1;" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                    aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search"
                                aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn text-white" style="background: #6f42c1;" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                </a>
                <!-- Dropdown - Alerts -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header" style="background: #6f42c1;">
                        Alerts Center
                    </h6>
                        <?php 
                            $adminID = $_SESSION['loggedInUser']['user_id'];
                            $query = "SELECT * FROM trx_notification WHERE admin_id='$adminID' ORDER BY id DESC LIMIT 3";
                            $notify = mysqli_query($conn, $query);

                            if($notify){
                                if(mysqli_num_rows($notify) > 0){
                                    foreach($notify as $item){
                                        ?>
                                            <a class="dropdown-item d-flex align-items-center" href="proccess_trx.php?id=<?= $item['id']; ?>">
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
                                                <div>
                                                    <div class="small text-gray-500"><?= date('d, M, Y, h:i a', strtotime($item['date'])) ?></div>
                                                    <?php if($item['msg_status'] == 'unread') : ?>
                                                    <span class="font-weight-bold"><?= $item['message'] ?></span>
                                                    <?php else : ?>
                                                    <span class=""><?= $item['message'] ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </a>
                                        <?php
                                    }
                                }else{
                                    echo "<div class='p-3'>There's no message for you here</div>";
                                }
                            }else{
                                echo "<div class='p-3'>Something Went wrong</div>";
                            }
                        
                        ?>
                    <?php if(mysqli_num_rows($notify) >= 3) : ?>
                    <a class="dropdown-item text-center small text-gray-500" href="view-all-alert.php">Show All Alerts</a>
                    <?php else : echo ''; ?>
                    <?php endif; ?>
                </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-envelope fa-fw" id="enClose"></i>
                    <i class='fas fa-envelope-open fa-fw' id="enOpen" style="display: none;"></i>
                    <!-- Counter - Messages -->
                           
                    <?php 
                        $msgStatus = 'unread';
                        $allMsg = mysqli_query($conn, "SELECT * FROM message WHERE status='$msgStatus' ");

                        if($allMsg){
                            if(mysqli_num_rows($allMsg) > 0){
                                $totalUnreadMsg = mysqli_num_rows($allMsg);
                                ?>
                                    <span class="count-unread-msg1 badge badge-danger badge-counter"><?= $totalUnreadMsg ?></span>
                                <?php
                            }else{
                                echo '';
                            }
                        }else{
                            echo 'Something Went Wrong!';
                        }
                    ?>
                </a>

                <!-- Dropdown - Messages -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="messagesDropdown">
                    <h6 class="dropdown-header" style="background: #6f42c1;">
                        Message Center
                    </h6>
                    <?php 

                        // $message = getAll('message');
                        $query = "SELECT * FROM message ORDER BY id DESC LIMIT 4";
                        $message = mysqli_query($conn, $query);
                        if(!$message){
                            echo '<h5>Something Went Wrong</h5>';
                            return false;
                        }

                        if(mysqli_num_rows($message) > 0){
                            foreach($message as $msg){
                    ?>
                        <a class="dropdown-item d-flex align-items-center" href="message-proccess.php?id=<?= $msg['id'] ?>">
                            <div class="dropdown-list-image mr-3">
                                <?php if($msg['gender'] != 'male') : ?>
                                <img class="rounded-circle" src="assets2/img/undraw_profile_3.svg" alt="...">
                                <?php elseif($msg['gender'] != 'female') :?>
                                <img class="rounded-circle" src="assets2/img/undraw_profile_2.svg" alt="...">
                                <?php else : ?>
                                <img class="rounded-circle" src="assets2/img/undraw_profile.svg" alt="...">
                                <?php endif; ?>
                                <?php if($msg['status'] == 'unread') : ?>
                                <div class="status-indicator bg-info"></div>
                                <?php else:  ?>
                                <div class="status-indicator bg-gray-400"></div>
                                <?php endif; ?>
                            </div>
                            <?php if($msg['status'] == 'unread') : ?>
                            <div class="font-weight-bold">
                                <div class="text-truncate"><?= $msg['s_message']; ?></div>
                                <div class="small text-gray-500"><?= $msg['s_name']; ?> · <?= date('d, M, Y, h:i a', strtotime($msg['sent'])) ?></div>
                            </div>
                            <?php else : ?>
                            <div>
                                <div class="text-truncate"><?= $msg['s_message']; ?></div>
                                <div class="small text-gray-500"><?= $msg['s_name']; ?> · <?= date('d, M, Y, h:i a', strtotime($msg['sent'])) ?></div>
                            </div>
                            <?php endif; ?>
                        </a>
                    <?php
                            }
                        }else{
                            echo '<h5>No Record Found!</h5>';
                        }
                    ?>
                    <?php if(mysqli_num_rows($message) >= 4) : ?>
                    <a class="dropdown-item text-center small text-gray-500" href="./message.php" onclick="OpenEn()">Read More Messages</a>
                    <?php else : echo ''; ?>
                    <?php endif; ?>
                </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <?php
                
                $query = "SELECT * FROM admins";
                $result = mysqli_query($conn, $query);
                if($result){
                    if(mysqli_num_rows($result) == 1){
                        $row = mysqli_fetch_assoc($result);
                    }
                }
                
            ?>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['loggedInUser']['username']; ?></span>
                    <?php if($row['image'] != '') : ?>
                    <img class="img-profile rounded-circle bg-secondary" src="../<?= $row['image']; ?>">
                    <?php else :  ?>
                    <img class="img-profile rounded-circle bg-secondary" src="assets2/img/undraw_profile.svg" alt="...">
                    <?php endif; ?>
                </a>

                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="./profile.php">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>

                    <a class="dropdown-item" href="./settings.php">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Settings
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Activity Log
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->