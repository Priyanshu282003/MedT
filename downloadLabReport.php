<?php
require_once "config.php";
require_once "session.php";

// Check if the Report_Number is provided in the URL
if (!isset($_GET["Report_Number"]) || empty($_GET["Report_Number"])) {
    // Redirect if Report_Number is not provided
    header("location: history.php");
    exit;
}

// Fetch the Report_Number from the URL
$reportNumber = $_GET["Report_Number"];

// Prepare and execute the query to fetch the lab report details
$query = $db->prepare("SELECT Report_Number, Report_Type, Report FROM lab_reports WHERE Report_Number = ?");
$query->bind_param("i", $reportNumber);
$query->execute();
$result = $query->get_result();

// Check if a lab report with the provided Report_Number exists
if ($result->num_rows === 0) {
    // Redirect if no lab report found with the provided Report_Number
    header("location: history.php");
    exit;
}

// Fetch the lab report details from the result
$row = $result->fetch_assoc();

// Extract file extension from the Report_Type
$extension = pathinfo($row["Report_Type"], PATHINFO_EXTENSION);

// Set the Content-Type header based on the file extension
switch ($extension) {
    case "pdf":
        $contentType = "application/pdf";
        break;
    case "jpg":
    case "jpeg":
        $contentType = "image/jpeg";
        break;
    case "png":
        $contentType = "image/png";
        break;
    // Add more cases for other supported file types if needed
    default:
        $contentType = "application/octet-stream";
}

// Set headers to force download with filename and extension
header("Content-Disposition: attachment; filename=\"" . $row["Report_Type"] . "\"");
header("Content-Type: " . $contentType);
header("Content-Length: " . strlen($row["Report"]));

// Output the file contents
echo $row["Report"];
?>
