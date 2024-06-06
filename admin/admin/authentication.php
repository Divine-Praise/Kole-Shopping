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
    }
}
else
{
    redirect('../login.php', 'Login to access Your Dashboard');
}

if(!isset($_SESSION['login_time'])){
    redirect('../login.php', 'Unable to Count Salary');
    echo '
    <script>
        clearInterval(interval);
        interval = null;
    </script>
    ';
}else{
    ?>
        <script>

            let totalSeconds = 0;
            const maxSecondsPerDay = 3 * 60 * 60; // 3 hours in seconds
            const salaryPerSecond = 15 / 3600; // $15 per hour divided by 3600 seconds
            let interval = null;

            if (!interval && totalSeconds < maxSecondsPerDay) {
                interval = setInterval(updateSalary, 1000);
            }

            function updateSalary() {
                if (totalSeconds >= maxSecondsPerDay) {
                    clearInterval(interval);
                    interval = null;
                    return;
                }
                totalSeconds++;
                const hours = Math.floor(totalSeconds / 3600);
                const minutes = Math.floor((totalSeconds % 3600) / 60);
                const seconds = totalSeconds % 60;
                const salaryEarned = totalSeconds * salaryPerSecond;
            
                document.getElementById('timeWorked').innerText = 
                    `${pad(hours)}:${pad(minutes)}:${pad(seconds)}`;
                document.getElementById('salaryEarned').innerText = salaryEarned.toFixed(2);
            }
            
            function pad(num) {
                return num.toString().padStart(2, '0');
            }
        </script>
    <?php
}


?>