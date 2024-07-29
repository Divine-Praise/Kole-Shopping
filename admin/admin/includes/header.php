<?php 
require '../config/function.php';
require 'authentication.php';

if (!isset($_SESSION['login_time'])) {
    header("Location: index.php");
    exit();
}

// Calculate the worked seconds from session
$workedSeconds = isset($_SESSION['total_seconds']) ? $_SESSION['total_seconds'] : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>

    <!-- bootstrap5 -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

    <!-- <link href="assets/css/style.min.css" rel="stylesheet" /> -->
    <link href="assets/css/styles.css" rel="stylesheet" />

    <!-- <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script> -->
    
    <!-- Alertify Link -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>


    <!-- Select Link -->
    <link href="assets/css/select2.min.css" rel="stylesheet" />

    <link href="assets/css/custom.css" rel="stylesheet" />

    <!-- Admin 2 Links -->
    
    <!-- Custom fonts for this template-->
    <link href="assets2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets2/css/sb-admin-2.min.css" rel="stylesheet">

    
    <!-- data table -->
    <!-- <link rel="stylesheet" href="assets/css/dataTables.min.css"> -->

    <!-- Custom styles for this page -->
    <link href="assets2/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
<body id="page-top">

<!-- link to contact admin form -->
<abbr title="Contact Admin">
  <div class="contact-admin" data-toggle="modal" data-target="#contactAdminModal">
      <i class="fas fa-comments fa-2x text-gray-300"></i>
  </div>
</abbr>



<!-- Page Wrapper -->
<div id="wrapper">

  <?php include('sidebar.php'); ?>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

    <?php include('navbar.php'); ?>

    <!-- <div class="tcontainer">
        <h2>Real-Time Salary Calculator</h2>
        <div class="results" id="results">
            <p>Time Worked: <span id="timeWorked">00:00:00</span></p>
            <p>Salary Earned: $<span id="salaryEarned">0.00</span></p>
        </div>
    </div> -->