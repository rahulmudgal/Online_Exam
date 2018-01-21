<?php
include_once("header.php");
include_once("database/db.php");

?>
<html>
<head>
<link href="css/tablestyle.css" rel="stylesheet" type="text/css">
</head>
<body>
<table align="center" class="subtable">
<tr>
<th>Roll No.</th>
<th>Subject Name</th>
<th>Subject ID</th>
<th>Test Date</th>
<th>Score</th>
</tr>
   <?php
   $fetch_data = "select subjects.sub_name, result.* from result join subjects where subjects.subid=result.sub_id";
   $fetch = mysql_query("$fetch_data");
   while($row = mysql_fetch_array($fetch)){
	   $sname = $row[0];
	   $tdate= $row[3];
	   $rno   = $row[1];
	   $sd    = $row[2];
	   $score = $row[4];
	   ?>
	   <tr>
	   <td><?php echo $rno?></td>
	   <td><?php echo $sname?></td>
	   <td><?php echo $sd?></td>
	   <td><?php echo $tdate?></td>
	   <td><?php echo $score?></td>
	   </tr>
	   
   <?php }?>
   </table>
   </body>
   </html>