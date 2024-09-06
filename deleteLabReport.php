<?php
require_once "config.php";
require_once "session.php";

if (!isset($_SESSION["userid"]) || empty($_SESSION["userid"])) {
    header("location: login.php");
    exit;
}

$Patient_Number = $_SESSION["userid"];

try {
    $query = $db->prepare("SELECT Report_Number, Date, Report_Type FROM lab_reports WHERE Patient_Number = ?");
    $query->bind_param("i", $Patient_Number);
    $query->execute();
    $result = $query->get_result();

    if (!$result) {
        throw new Exception("Error executing SQL query: " . $db->error);
    }
} catch (Exception $e) {
    echo "Caught exception: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            padding-top: 500px;
            background-image: url('https://img.freepik.com/free-vector/white-background-with-blue-tech-hexagon_1017-19366.jpg?w=900&t=st=1709404718~exp=1709405318~hmac=c2bc7121338492b34064448c232c4c465e17ba95d99800fde257d798890ee162');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        table {
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
            width: 90%;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid transparent;
            text-align: center;
            padding: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        th {
            background-color: #f2f2f2;
        }

        td{
            background-color: #cea0e8;
        }

        a {
            text-decoration: none;
            color: #0066cc;
        }
        .ErrorHeading {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
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
                                <li><a class="dropdown-item" href="deleteReport.php">Delete Report</a></li>
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
                            <a href="logout.php" class="btn btn-danger active" role="button" aria-pressed="true">Log Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
<div class="container mt-5">
    <h2 align="center"><strong>Delete Report</strong></h2>
    <?php if ($result && $result->num_rows > 0): ?>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Serial Number</th>
                <th>Report Number</th>
                <th>Date</th>
                <th>Report Type</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $serialNumber = 1;
            while ($row = $result->fetch_assoc()):
            ?>
                <tr>
                    <td><?= $serialNumber++ ?></td>
                    <td><?= $row['Report_Number'] ?></td>
                    <td><?= $row['Date'] ?></td>
                    <td><?= $row['Report_Type'] ?></td>
                    <td>
                        <button class="btn btn-danger delete-btn" data-case="<?= $row['Report_Number'] ?>">Delete</button>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div align='center' class='ErrorHeading'>
            <h5><strong>No records found.</strong></h5>
        </div>
    <?php endif; ?>
</div>

<script>
    const deleteButtons = document.querySelectorAll('.delete-btn');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const caseNumber = this.dataset.case;
            const confirmDelete = confirm('Are you sure you want to delete this report?');
            if (confirmDelete) {
                window.location.href = `deleteLabReport_process.php?Report_Number=${caseNumber}`;
            }
        });
    });
</script>

</body>
</html>
