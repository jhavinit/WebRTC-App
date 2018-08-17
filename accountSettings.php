<?php
require 'db.php';
$callerId = $_GET['callerId'];
if(isset($_POST['submit']))
{
$name = $_FILES['file']['name'];
$tmp_name = $_FILES['file']['tmp_name'];
if(isset($name)&&!empty($name)){
  $username = $_POST['username'];
  $type = mime_content_type($tmp_name);
    if($type == 'application/pdf' || $type == 'application/msword' || $type == 'application/vnd.ms-excel' || $type == 'text/plain' || $type == 'image/jpeg' || $type == 'image/png' || $type == 'text/pdf' || $type == 'image/svg' ){
        $path = $callerId;
        $path = str_replace(' ', '_', $path);
      if(move_uploaded_file($tmp_name, "dp/$path")){
            $query = "UPDATE UserDetails SET Username = '$username', ProfilePhoto = 'dp/$path' WHERE CallerId = '$callerId'";
            mysqli_query($conn, $query);
            $status = 'Successfully the (<strong>'.$name.'</strong>) file has been uploaded!';
      }else{
          $status = 'There was an error uploading the file.';
      }
    }
    else{
      $status = 'File format not supported';
    }
  }
  else{
      $status = 'Please choose a file';
  }
  $username = $_POST['username'];
  $query = "UPDATE UserDetails SET Username = '$username' WHERE CallerId = '$callerId'";
  mysqli_query($conn, $query);
 header("Location: login.php"); 
}
?>

<DOCTYPE! html>
<html>
<head>
    <title>Account Settings</title>
</head>
<body id="accSettBody">
<link rel="stylesheet" type="text/css" href="styles.css">
<script src="account.js"></script>

<center>
<div style="width: 600px" style="height: 900px" id="accBlock">    
    <center><h1 id="acc_Sett">ACCOUNT SETTINGS</h1></center>

<center>
    <div id="accounts_box">
    <h3 style="color: white">STEP-2</h3>
    <p style="color: red">Please Fill In The Details To Complete Account Settings</p>
    <hr>
    <form action="accountSettings.php?callerId=<?php echo $callerId?>" method="POST" enctype="multipart/form-data" id="form1">
      <label for="username" style="color: white"><b> USER NAME </b></label>
      <input type="text" placeholder="Enter Username" name="username" required>           
      <label for="choosepic" style="color: white"><b>CHOOSE PICTURE</b></label>
      <input type="file" name="file">
      <div class="clearfix">
        <center><button type="submit" class="signupbtn1" name="submit"><a href="login.php" style="text-decoration: none;">LOGIN</a></button></center>
      </div>
    </form>
    </div>
</center>
</div>
</center>
</body>
</html>