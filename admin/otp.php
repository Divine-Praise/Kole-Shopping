<?php require 'config/function.php'; 

$adminId = $_SESSION['loggedInUser']['user_id'];
$query = "SELECT * FROM admins WHERE id='$adminId' LIMIT 1";
$result = mysqli_query($conn, $query);
if($result){
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);
        $hasedPassword = $row['admin_otp'];
        if($hasedPassword > 0){
            header('Location: confirm-otp.php');
            exit;
        }else{
            ?>
                <!doctype html>
                    <html lang="en">
                        <head>
                            <meta charset="utf-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1">
                            <title>Set Pin</title>
                            <link rel="stylesheet" href="assets/css/bootstrap.min.css">

                            <!-- Link Admin Panel 2 -->
                            <!-- Custom fonts for this template-->
                            <link href="admin/assets2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
                            <link
                            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
                            rel="stylesheet">

                            <!-- Custom styles for this template-->
                            <link href="admin/assets2/css/sb-admin-2.min.css" rel="stylesheet">
                            
                            <link rel="stylesheet" href="assets/css/style.css">
                        </head>
                        <body class="bg-primary">
                            <div id="layoutAuthentication">
                                <div id="layoutAuthentication_content">
                                    <main>
                                        <div class="container">
                                            <div class="row justify-content-center">
                                                <div class="col-lg-5">
                                                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                                                        <?php alertMessage(); ?>
                                                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Set PIN</h3></div>
                                                        <div class="card-body">
                                                            <div class="small mb-3 text-muted">Enter a 4(four) digits pin for your account</div>
                                                            <form action="proccess.php" method="POST">
                                                                <div class="form-floating mb-3">
                                                                    <input class="form-control" id="inputEmail" type="password" maxlength="4" name="one_time_pwd" placeholder="eg: 4123" />
                                                                    <label for="inputEmail">Pin</label>
                                                                </div>
                                                                <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                                                    <button type="submit" name="saveOneTimePwd" class="btn btn-primary">Save Pin</a>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="card-footer text-center py-3">
                                                            <div class="small"><a class="small" href="login.php" style="text-decoration: none;">Return to login</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </main>
                                </div>
                            </div>
                        </body>
                    </html>
            <?php
        }
    }else{
        redirect('login.php', 'You have not added an Otp yet, login to add otp');
    }
}else{
    redirect('login.php', 'User not found please contact admin');
}

?>
