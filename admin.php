<?php
session_start();
include_once("header.php");
include_once("database/db.php");
$_SESSION['admn']="1";
if(isset($_POST['submit']))
{
	$loginid=$_POST['loginid'];
	$adminpwd=$_POST['adminpwd'];
	if($loginid=='rahul' && $adminpwd=='54321'){
		echo "<script>window.open('admin2.php','_self')</script>";
	}
	else{
		echo "Error";
	}
}
?>
<html>
<head>
<title>Admin Panel</title>
<style>
.adlog{
	margin-top:7%;
	align:center;
	width: 40%;
	border: 1px solid #d8d8d8;
	background-color:white;
}
</style>
</head>
<body background="images/mems.png">
<div class="container adlog">
<div>
<fieldset><legend>ADMIN LOGIN PANEL</legend>
	<form method="POST">
    <div class="form-group">
      <label for="loginid">Login ID</label>
      <input type="text" class="form-control" id="loginid" name="loginid">
    </div>
    <div class="form-group">
      <label for="pwd">Password</label>
      <input type="password" class="form-control" id="adminpwd" name="adminpwd">
    </div>
    <button type="submit" class="bt" name="submit">Login »</button>
	<p>&nbsp</p>
  </form>
  
  </fieldset>
</div>
</div>
</body>
</html>