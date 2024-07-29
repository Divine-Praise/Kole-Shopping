<?php
session_start();


$loginTime = $_SESSION['login_time'];
$currentTime = strtotime( time());
$workedSeconds = $currentTime - $loginTime;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }
        .container h2 {
            margin-bottom: 20px;
        }
        .results {
            margin-top: 20px;
        }
        #logoutButton {
            margin: 10px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome, Admin</h2>
        <div class="results" id="results">
            <p>Time Worked: <span id="timeWorked">00:00:00</span></p>
            <p>Salary Earned: $<span id="salaryEarned">0.00</span></p>
        </div>
        <!-- <button id="logoutButton">Logout</button> -->
    </div>
    
    <script>
        let totalSeconds = <?php echo $workedSeconds; ?>;
        const salaryPerSecond = 15 / 3600; // $15 per hour divided by 3600 seconds
        let interval = setInterval(updateSalary, 1000);

        document.getElementById('logoutButton').addEventListener('click', function() {
            clearInterval(interval);
            window.location.href = 'logout.php';
        });

        function updateSalary() {
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
</body>
</html>