<?php
include_once("database/db.php");
$sbi=$_GET['sdi'];
$qr="delete from student where username='$sbi'";
$run=mysql_query("$qr");
if($run>0){
	echo "<script>window.open('students.php','_self')</script>";
}
else{
	echo "Error";
}

?>