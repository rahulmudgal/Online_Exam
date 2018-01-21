<?php 
session_start();
error_reporting();
include_once("database/db.php");
include_once("header.php");
$username = $_SESSION['username'];
$rn="select name from student where username='$username'";
$fa=mysql_query($rn);
$rw=mysql_fetch_array($fa);
$temp = $rw[0];
?>
<html>
<head>
<style>

#tab tr{
	font-size:20px;
	border-bottom:1px solid #d8d8d8;
}
#tab tr th{ 
	padding: 10px;
}
#tab tr a{
	text-decoration:none;
	color:#2767a5;
}
ol li{
	border-bottom:1px solid #f7975b;
}

</style>
</head>
<body>
<div align="right" style="padding:10px 20px 10px 0px"><a href="logout.php"><button type="button" class="btn btn-danger">Logout</button></a></div>
<div id="intrs">
<h3>Please read the instructions below and proceed by selecting the subject.</h3>
<ol style="width:50%;font-size:20px;">
<li>Time allowed for exam: 2 hours.</li>
<li>Allowed materials: pencil and printed exam.</li>
<li>Not allowed: Textbook, keyboard, cell phone.</li>
</div>
<hr>
<h2 align="center">Select Subject for Exam</h2>
<table id="tab" align="center">
<?php
$fetch=mysql_query("select * from subjects");
while($row=mysql_fetch_array($fetch)){
	
echo "<tr><th><a href=test.php?subid=$row[0]>$row[1]</a></th></tr>";
 } ?>
</table>
</body>
</html>
<?php 
include_once("footer.html");
?>