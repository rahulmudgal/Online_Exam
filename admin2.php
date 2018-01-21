<?php
session_start();
error_reporting();
include_once("header.php");
include_once("database/db.php");
if(!isset($_SESSION['admn'])){
	header("location: index.php");
}
?>
<html>
<head>
<style>
.tb{
	margin-top:50px;
}
.tb tr th{
	padding:0px 20px;
}

.th:hover{
	position:relative;
	width:110%;
	height:auto;
	border:1px solid #f7975b;
	border-radius:10px;
	box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}
</style>
<title>Dashboard</title>
</head>
<body>
<div align="right" style="padding:10px 20px 10px 0px"><a href="logout.php"><button type="button" class="btn btn-danger">Logout</button></a></div>
<div align="center">
<table class="tb">
<tr>
<th class="tbh"><a href="subjects.php"><img class="th" src="images/subjects.png" alt="Not available"><br>Subjects</a></th>
<th class="tbh"><a href="results.php"><img  class="th" src="images/results.png" alt="Not available"><br>Results<a/></th>
<th colspan="2"><a href="students.php"><img class="th" src="images/sa.png" alt="Not available"><br>Registered Students<a/></th>
</tr>   
</table> 
</div>
</body>
</html>