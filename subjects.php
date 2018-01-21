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
<th>Subject ID</th>
<th>Subject Name</th>
<th>Action</th>
</tr>
   <?php
   $fetch_data = "select * from subjects";
   $fetch = mysql_query("$fetch_data");
   while($row = mysql_fetch_array($fetch)){
	   $id = $row[0];
	   $sname= $row[1];
	   ?>
	   <tr>
	   <td><?php echo $id?></td>
	   <td><?php echo $sname?></td>
	   <td><a href="que.php?sd=<?php echo $id?>">Add Questions to this subjects !</a></td>
	   </tr>
	   
   <?php }?>
   </table>
   </body>
   </html>