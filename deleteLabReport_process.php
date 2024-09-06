<?php
require_once "config.php";
require_once "session.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["Report_Number"])) {
    $reportNumber = $_GET["Report_Number"];

    $query = $db->prepare("DELETE FROM lab_reports WHERE Report_Number = ?");
    $query->bind_param("i", $reportNumber);

    if ($query->execute()) {
        header("location: deleteLabReport.php");
        exit;
    } else {
        echo "Error deleting report: " . $query->error;
        header("location: deleteLabReport.php");
        exit;
    }

    $query->close();
    mysqli_close($db);
} else {
    // Invalid request method or missing report number
    echo "Invalid request.";
    header("location: deleteLabReport.php");
    exit;
}
?>
