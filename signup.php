<?php
require 'db.php';
$email = $_POST['email'];
$password = $_POST['psw'];
$psw_rpt = $_POST['psw-repeat'];
$query = "SELECT * FROM UserDetails WHERE Email = '$email'";
$result = mysqli_query($conn, $query);
if($row = mysqli_fetch_array($result))
{
	header("Location: signup.html?status=2");	
}
else if($password != $psw_rpt)
{
	header("Location: signup.html?status=3");
}
else
{
	$phash = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));
	$query = "INSERT INTO UserDetails(Email, Password) VALUES ('$email', '$phash')";
	mysqli_query($conn, $query);
	$query = "SELECT CallerId FROM UserDetails WHERE Email = '$email'";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result);
	$callerId = $row['CallerId'];
	header("Location: accountSettings.php?callerId=".$callerId); 
}
?>