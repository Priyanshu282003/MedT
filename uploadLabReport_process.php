<?php
session_start();

if (!isset($_SESSION["userid"]) || empty($_SESSION["userid"])) {
    header("location: login.php");
    exit;
}

require_once "config.php";

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_SESSION["userid"])) {
            $patientNumber = $_SESSION["userid"];
            $error = "";

            var_dump($patientNumber);

            // Check if file is uploaded
            if (isset($_FILES["lab_report"]) && $_FILES["lab_report"]["error"] === UPLOAD_ERR_OK) {
                // Prepare other parameters
                $date = date("Y-m-d");
                $reportType = $_POST["report_type"];

                // Read file contents
                $fileContents = file_get_contents($_FILES["lab_report"]["tmp_name"]);

                // var_dump($fileContents);

                // Prepare the INSERT query
                $insertQuery = $db->prepare("INSERT INTO lab_reports (Report_Type, Date, Report, Patient_Number) VALUES (?, ?, ?, ?)");

                // Bind parameters
                $insertQuery->bind_param("sssi", $reportType, $date, $fileContents, $patientNumber);

                // Execute the query
                if ($insertQuery->execute()) {  
                    $error .= '<p class="success">Lab report uploaded successfully!</p>';
                    header("location: labReports.php");
                    exit;
                } else {
                    // Database insertion failed, log the error
                    error_log("Database insertion failed: " . $db->error);
                    $error .= '<p class="error">Something went wrong! ' . $db->error . '</p>';
                    header("location: uploadLabReport.php");
                    exit;
                }

                // Check for errors during binding
                if ($insertQuery->errno) {
                    error_log("Binding parameters failed: " . $insertQuery->error);
                    $error .= '<p class="error">Binding parameters failed: ' . $insertQuery->error . '</p>';
                    header("location: uploadLabReport.php");
                    exit;
                }

                $insertQuery->close();


            } else {
                $error .= '<p class="error">No file uploaded or file upload error occurred.</p>';
                header("location: uploadLabReport.php");
                exit;
            }
        } else {
            echo "Patient number is not set in the session.";
            header("location: uploadLabReport.php");
        }
    }
} catch (Exception $e) {
    // Exception occurred, log the error
    error_log("Exception occurred: " . $e->getMessage());
    echo "Caught exception: " . $e->getMessage();
}
?>
