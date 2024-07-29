<?php 
if(isset($_SESSION['loggedIn']))
{
    $email = validate($_SESSION['loggedInUser']['email']);

    $query = "SELECT * FROM admins WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 0)
    {
        logoutSession();
        redirect('../login.php', 'Access Denied!');
    }
    else
    {
        $row = mysqli_fetch_assoc($result);
        if($row['is_ban'] == 1){
            logoutSession();
            redirect('../login.php', 'Your account has been banned! Please contact admin.');
        }

        if($row['admin_otp'] <= 0){
            logoutSession();
            redirect(header('Location: ../otp.php'));
        }

        if($row['admin_type'] == 'admin'){
            logoutSession();
            redirect('../../login.php', 'Access Denied!.');
        }
    }
}
else
{
    redirect('../login.php', 'Login to access Your Dashboard');
}

if(!isset($_SESSION['login_time'])){
    redirect('../login.php', 'No time tracked if not logged in');
    // echo '
    // <script>
    //     clearInterval(interval);
    //     interval = null;
    // </script>
    // ';
}else{

    $current_time = time();
    $_SESSION['total_seconds'] = $current_time -  $_SESSION['login_time'];

    $workedSeconds = isset($_SESSION['total_seconds']) ? $_SESSION['total_seconds'] : 0;
}


?>