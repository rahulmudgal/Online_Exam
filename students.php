<?php
include_once("header.php");
include_once("database/db.php");

?>
<html>
<head>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="css/tablestyle.css" rel="stylesheet" type="text/css">
</head>
<body>
<table align="center" class="subtable">
<tr>
<th>User Id</th>
<th>Name</th>
<th>Phone</th>
<th>Email</th>
<th>Login ID</th>
<th>Password</th>
<th>Action</th>
</tr>
   <?php
   $fetch_data = "select * from student";
   $fetch = mysql_query("$fetch_data");
   while($row = mysql_fetch_array($fetch)){
	   $id = $row[0];
	   $uname= $row[1];
	   $pwd = $row[2];
	   $name= $row[3];
	   $ph = $row[4];
	   $email= $row[5];
	   ?>
	   <tr>
	   <td><?php echo $id?></td>
	   <td><?php echo $name?></td>
	   <td><?php echo $ph?></td>
	   <td><?php echo $email?></td>
	   <td><?php echo $uname?></td>
	   <td><?php echo $pwd?></td>
	   <td><a class="btn btn-danger" href="deletestudent.php?sdi=<?php echo $uname?>">Delete</a></td>
	   </tr>
	   
   <?php }?>
   </table>
   </body>
   </html>