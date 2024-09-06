<?php
session_start();

if (!isset($_SESSION["userid"]) || empty($_SESSION["userid"])) {
    header("location: login.php");
    exit;
}

$user = $_SESSION["user"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if symptoms are selected
    if (isset($_POST["symptoms"]) && !empty($_POST["symptoms"])) {
        // Sanitize and process the selected symptoms
        $selectedSymptoms = $_POST["symptoms"];
        
        // Display the selected symptoms
        echo "<h3>Selected Symptoms:</h3>";
        echo "<ul>";
        foreach ($selectedSymptoms as $symptom) {
            echo "<li>$symptom</li>";
        }
        echo "</ul>";
        
        // Further actions such as sending the symptoms to a prediction model can be performed here
    } else {
        echo "<p>No symptoms selected!</p>";
    }
}
?>
