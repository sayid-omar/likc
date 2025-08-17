<?php 
// include database connection file
require_once'db_connect.php';
if(isset($_POST['submit']))
{
// Posted Values  
$name=$_POST['name'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];
//echo "name is $name email is $email password is $password";


   
//Insert data into database

$sql = "INSERT INTO messages (name, email, subject, message) 
       VALUES ('$name', '$email', '$subject','$message')";
        if ($conn->query($sql) === TRUE) {
echo "<script>alert('Thank you for your messaging us, we will contact you soonly!');</script>";
echo "<script>window.location.href='index.html'</script>"; 

} else {
echo "<script>alert('Something went wrong. Please try again');</script>";
echo "<script>window.location.href='index.html'</script>"; 
}
}
// Close the connection
$conn->close();

?>
