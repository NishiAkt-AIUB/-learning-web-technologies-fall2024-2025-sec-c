<?php
// Define variables and set to empty values
$name = $email = $password = $confirmPassword = "";
$nameErr = $emailErr = $passwordErr = $confirmPasswordErr = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Name validation
    if (empty($_POST["name"])) {
        $nameErr = "Name is required.";
    } else {
        $name = $_POST["name"];
    }

    // Email validation
    if (empty($_POST["email"])) {
        $emailErr = "Email is required.";
    } else {
        $email = $_POST["email"];
        // Check if the email address is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format.";
        }
    }

    // Password validation
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required.";
    } else {
        $password = $_POST["password"];
        if (strlen($password) < 8) {
            $passwordErr = "Password must be at least 8 characters long.";
        }
    }

    // Confirm Password validation
    if (empty($_POST["confirmPassword"])) {
        $confirmPasswordErr = "Please confirm your password.";
    } else {
        $confirmPassword = $_POST["confirmPassword"];
        if ($password !== $confirmPassword) {
            $confirmPasswordErr = "Passwords do not match.";
        }
    }

    // If no errors, process the form data (e.g., store in a database or display a success message)
    if (empty($nameErr) && empty($emailErr) && empty($passwordErr) && empty($confirmPasswordErr)) {
        // For example, print the success message:
        echo "Registration successful!";
        // You can store the data in a database or send a confirmation email here
    } else {
        // Show error messages (if any)
        echo "There were errors in the form submission:<br>";
        echo $nameErr . "<br>";
        echo $emailErr . "<br>";
        echo $passwordErr . "<br>";
        echo $confirmPasswordErr . "<br>";
    }
}
?>
