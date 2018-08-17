<?php
session_start();
if($_SESSION['num'] == '2')
	echo '';
else
	header("Location: login.php");
?>