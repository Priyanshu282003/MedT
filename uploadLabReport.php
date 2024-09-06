<?php
session_start();

// var_dump($_SESSION);
if(!isset($_SESSION["userid"]) || empty($_SESSION["userid"])) {
    header("location: login.php");
    exit;
}

$user = $_SESSION["user"];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Uplaod Lab Report</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    <style>

        body{
            background-image: url('https://img.freepik.com/free-vector/white-background-with-blue-tech-hexagon_1017-19366.jpg?w=900&t=st=1709404718~exp=1709405318~hmac=c2bc7121338492b34064448c232c4c465e17ba95d99800fde257d798890ee162');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            padding-top: 190px;
        } 
    </style>
    
    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <div>
            <nav class="navbar bg-body-tertiary fixed-top" data-bs-theme="dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="welcome.php">MedTrack</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="history.php">History</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Reports
                            </a>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="createReport.php">Add Report</a></li>
                            <li><a class="dropdown-item" href="modifyReport.php">Edit Report</a></li>
                            <li>
                            </li>
                            <li><a class="dropdown-item" href="deleterReport.php">Delete Report</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                                <a class="nav-link active dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Lab Reports
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="labReports.php">View Lab Report</a></li>
                                <li><a class="dropdown-item" href="uploadLabReport.php">Add Lab Report</a></li>
                                <li>
                                </li>
                                <li><a class="dropdown-item" href="deleteLabReport.php">Delete Lab Report</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="profile.php">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="btn btn-danger active" role="button"  aria-pressed="true">Log Out</a>
                        </li>
                        </ul>
                    </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="wrapper">
            <div class="title">
            Upload LAB Report
            </div>
            <form action="uploadLabReport_process.php" method="POST" class="form" name="form1" enctype="multipart/form-data" id="registrationForm" onsubmit="">
            <div class="inputfield" style="margin-bottom: 1px;">
                <label for="report_type">Report Type (*)</label>
                <input type="text" name="report_type" id="report_type" class="input" placeholder="Report Type">
            </div><br> 
            <div class="inputfield">
                <label for="lab_report">Lab Report (*)</label>
                <input type="file" name="lab_report" id="lab_report" accept=".pdf, .jpg, .jpeg, .png">
            </div>
            <div class="inputfield">
                <input type="submit" value="Add Report" class="btn">
            </div>
            </form>
        </div>
    </body>
</html>