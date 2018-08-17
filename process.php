<?php
   session_start();
   $email = $_POST['email'];
   $password = $_POST['psw'];

   /*$email = stripcslashes($email);
   $password = stripcslashes($password);
   $email = mysql_real_escape_string($email);
   $password = mysql_real_escape_string($password);*/

   require 'db.php';

   $result = mysqli_query($conn, "select * from UserDetails where Email = '$email'")
              or die("Failed to query database".mysql_error());

   $row = mysqli_fetch_array($result);
   if(password_verify($password, $row['Password'])){
    echo $password;
    $_SESSION['num'] = 2;
   	echo "Login success!!! Welcome".$row['Email'];
   	$query = "SELECT CallerId, Username from UserDetails where Email = '$email'";
   	$result = mysqli_query($conn, $query)
              or die("Failed to query database".mysql_error());
    $rows = mysqli_fetch_array($result);
    $_SESSION["Username"] = $rows['Username'];
   	$_SESSION["CallerId"] = $rows['CallerId'];
    header("Location: dashboard.php");
   }           
   else{
   	echo "Failed to login.";
   }

   ?>