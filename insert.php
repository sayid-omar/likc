<?php
session_start();

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "INSERT INTO admin (name, email, password)
            VALUES ('$name', '$email', '$password')";
          $result = $conn->query($sql);
   // If user exists
       if ($result->num_rows > 0) {
                    $_SESSION['email'] = $email;

  echo "Username already exists!";
} else {
  header("Location: login.html");
            exit();
}

    $conn->close();
}
?>
