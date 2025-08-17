<?php
session_start();
include 'db_connect.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prevent empty fields
    if (empty($email) || empty($password)) {
        $error = "Please enter both email and password.";
    } else {
        // Check user in database (without password hashing — for demo purposes)
        $stmt = $conn->prepare("SELECT * FROM admin WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        // If user exists
        if ($result->num_rows > 0) {
            $_SESSION['email'] = $email;
            header("Location: media_system/index.php");
            exit();
        } else {
            $error = "Invalid email or password.";
        }

        $stmt->close();
    }
}
?>