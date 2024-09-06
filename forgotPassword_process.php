<?php
require_once "config.php";

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailInput = $_POST['email'];

    if ($query = $db->prepare("SELECT * FROM users WHERE email = ?")) {
        $query->bind_param('s', $emailInput);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row && isset($row['Email'])) {
                // Generate a unique token for password reset
                $token = uniqid();

                // Store the token and associated email in your database for future verification
                $sql = "INSERT INTO password_reset_tokens (email, token) VALUES (?, ?)";
                $stmt = $db->prepare($sql);
                $stmt->bind_param('ss', $emailInput, $token);
                $stmt->execute();
                $stmt->close();

                // Send the password reset email
                $subject = "Password Reset";
                $message = "Please click the following link to reset your password: http://localhost/reset_password.php?token=$token";
                $headers = "From: ayushghogre7@gmail.com";

                if (mail($emailInput, $subject, $message, $headers)) {
                    echo '<script>alert("Password reset instructions have been sent to your email address.");</script>';
                } else {
                    echo '<script>alert("Failed to send password reset instructions. Please try again later.");</script>';
                }
            } else {
                $error .= '<p class="error">Failed to fetch user data or email is not set.</p>';
                echo '<script>alert("Failed to fetch user data or email is not set.");</script>';
            }
        } else {
            $error .= '<p class="error">No User exists with that email address.</p>';
            echo '<script>alert("No user exists with that email address.");</script>';
        }
    } else {
        echo '<script>alert("An error occurred while preparing the SQL statement.");</script>';
    }
    $query->close();
}
mysqli_close($db);
?>
