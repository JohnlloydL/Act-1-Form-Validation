<?php
// Initialize an empty array for errors
$errors = [];

// Check if the form is submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $password = htmlspecialchars(trim($_POST['password'] ?? ''));

    // Validate input data
    if (empty($name)) {
        $errors[] = "Name is required.";
    } elseif (strlen($name) < 3) {
        $errors[] = "Name must be at least 3 characters long.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email is required.";
    }

    if (empty($password) || strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters long.";
    }

    // If there are no errors, display the input values
    if (empty($errors)) {
        echo "<h2>Registration Successful!</h2>";
        echo "<p>Name: " . $name . "</p>";
        echo "<p>Email: " . $email . "</p>";
        // Note: Password should not be displayed for security reasons
    } else {
        // Display errors
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
    // Add a back button
    echo "<button class='back-button' onclick='history.back()'>Go Back</button>";
    echo "</div>";

    echo "
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 30px;
        background-color: #f9f9f9;
    }
    h2 {
        color: green;
    }
    h1 {
        color: red;
    }
    ul {
        color: red;
        list-style-type: square;
    }
    .back-button {
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #007BFF;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }
    .back-button:hover {
        background-color: #0056b3;
    }
    .result-container {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        max-width: 500px;
        margin: auto;
    }
</style>
";
}
?>