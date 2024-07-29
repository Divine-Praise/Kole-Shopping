<?php 
if(isset($_SESSION['loggedIn']))
{
    $email = validate($_SESSION['loggedInUser']['email']);
    $admin_type = 'admin';
    $query = "SELECT * FROM admins WHERE email='$email' AND admin_type='$admin_type' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 0)
    {
        logoutSession();
        redirect('../../login.php', 'Access Denied!');
    }
    else
    {
        $row = mysqli_fetch_assoc($result);
        if($row['is_ban'] == 1){
            logoutSession();
            redirect('../../login.php', 'Your account has been banned! Please contact admin.');
        }
        if($row['admin_type'] == 'employee'){
            logoutSession();
            redirect('../../login.php', 'Access Denied!.');
        }
    }
}
else
{
    redirect('../../login.php', 'Login to access Your Dashboard');
}

?>