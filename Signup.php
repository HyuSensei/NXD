<?php 
require_once('DBconfig.php');
$json = file_get_contents('php://input');
 
 // decoding the received JSON and store into $obj variable.
 $obj = json_decode($json,true);
 
 // Populate User name from JSON $obj array and store into $name.
$name = $obj['name'];
 
// Populate User email from JSON $obj array and store into $email.
$username = $obj['username'];
 
// Populate Password from JSON $obj array and store into $password.
$password = $obj['password'];
 
//Checking Email is already exist or not using SQL query.
$CheckSQL = "SELECT * FROM users WHERE username='$username'";
 
// Executing SQL Query.
$check = mysqli_fetch_array(mysqli_query($connect,$CheckSQL));
if(isset($check)){
 
 $EmailExistMSG = 'Email Already Exist, Please Try Again !!!';
 
 // Converting the message into JSON format.
$EmailExistJson = json_encode($EmailExistMSG);
 
// Echo the message.
echo $EmailExistJson ; 
 
 }
 else{
 
 // Creating SQL query and insert the record into MySQL database table.
$Sql_Query = "insert into users (name,username,password) values ('$name','$username','$password')";
 
 if(mysqli_query($connect,$Sql_Query)){
 
 // If the record inserted successfully then show the message.
$MSG = 'User Registered Successfully' ;
 
// Converting the message into JSON format.
$json = json_encode($MSG);
 
// Echo the message.
 echo $json ;
 
 }
 else{
 echo 'Try Again';
 }
 }
 mysqli_close($connect);
?>