<?php
session_start();

// User authentication logic here
// If the user is authenticated successfully:

$_SESSION['login_time'] = time(); // Store the login timestamp
$_SESSION['total_seconds'] = 0; // Initialize total seconds worked
header("Location: admin.php"); // Redirect to admin page
exit();
?>
<?php
session_start();
session_unset(); // Clear the session
session_destroy(); // Destroy the session
header("Location: index.php"); // Redirect to login page
exit();
?>
<?php
session_start();

if (isset($_SESSION['login_time'])) {
    $current_time = time();
    $_SESSION['total_seconds'] = $current_time - $_SESSION['login_time'];
    echo $_SESSION['total_seconds'];
} else {
    echo 0; // No time tracked if not logged in
}
?>

<?php

session_start();
if (!isset($_SESSION['login_time'])) {
    header("Location: index.php");
    exit();
}

// Calculate the worked seconds from session
$workedSeconds = isset($_SESSION['total_seconds']) ? $_SESSION['total_seconds'] : 0;
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
        <button id="logoutButton">Logout</button>
    </div>
    
    <script>
        let totalSeconds = <?php echo $workedSeconds; ?>;
        const maxSecondsPerDay = 3 * 60 * 60; // 3 hours in seconds
        const salaryPerSecond = 15 / 3600; // $15 per hour divided by 3600 seconds
        let interval = null;

        function updateSalary() {
            totalSeconds++;
            const hours = Math.floor(totalSeconds / 3600);
            const minutes = Math.floor((totalSeconds % 3600) / 60);
            const seconds = totalSeconds % 60;
            const salaryEarned = totalSeconds * salaryPerSecond;

            document.getElementById('timeWorked').innerText = 
                ${pad(hours)}:${pad(minutes)}:${pad(seconds)};
            document.getElementById('salaryEarned').innerText = salaryEarned.toFixed(2);

            if (totalSeconds >= maxSecondsPerDay) {
                clearInterval(interval);
            }
        }

        function pad(num) {
            return num.toString().padStart(2, '0');
        }

        function fetchElapsedTime() {
            fetch('update_time.php')
                .then(response => response.text())
                .then(data => {
                    totalSeconds = parseInt(data, 10);
                    if (totalSeconds < maxSecondsPerDay && !interval) {
                        interval = setInterval(updateSalary, 1000);
                    } else {
                        updateSalary();
                    }
                });
        }

        document.getElementById('logoutButton').addEventListener('click', function() {
            clearInterval(interval);
            window.location.href = 'logout.php';
        });

        // Fetch elapsed time on page load and start updating
        fetchElapsedTime();
    </script>
</body>
</html>