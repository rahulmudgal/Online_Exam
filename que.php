<?php
include_once("header.php");
include_once("database/db.php");
$et=$_GET['sd'];
if(isset($_POST['submit'])){
	$qdesc=$_POST['desc'];
	$oans1=$_POST['ans1'];
	$oans2=$_POST['ans2'];
	$oans3=$_POST['ans3'];
	$oans4=$_POST['ans4'];
	$trueans=$_POST['trueans'];
$insert="INSERT INTO mst_question(sub_id,que_desc,ans1,ans2,ans3,ans4,true_ans) VALUES($et,'$qdesc','$oans1','$oans2','$oans3','$oans4',$trueans)";
$run=mysql_query($insert);
if($run>0){
	echo "<h5 class='alert alert-success'>Added !</h5>";
}
else{
     echo "<h5 class='alert alert-danger'>Some Error Occured, Please try again</h5>";
}
}
?>
<html>
<head>

<style>
.tb tr {
	padding-top:10px;
}
.add{
	border: 2px solid #2767a5;
	color:#2767a5; 
	background-color:white;
	font-size:18px;
	margin-top:20px;
}
.add:hover{
	
	color:white;
	background-color:#2767a5;
}
</style>
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>

</head>
<body>
<div align="center"style="margin:30px; width:100%;">


<form method="POST">
<table width="80%" class="tb">
<tr><th>Subject ID:</th><td><input class="form-control" type="text" name="subid" placeholder="<?php echo $et?>" disabled></td></tr>
<tr><th>Question:</th><td><input class="form-control" type="text" name="desc" id="focusedInput"></td></tr>
<tr><th>Option 1:</th><th><input class="form-control opt" type="text" name="ans1"></td></tr>
<tr><th>Option 2:</th><th><input class="form-control opt" type="text" name="ans2"></td></tr>
<tr><th>Option 3:</th><th><input class="form-control opt" type="text" name="ans3"></td></tr>
<tr><th>Option 4:</th><th><input class="form-control opt" type="text" name="ans4"></td></tr>
<tr><th>True Ans:</th><td><input class="form-control opt" type="text" name="trueans"></td></tr>

<tr><td></td><td><button name="submit" type="submit" class="add" id="submit">Add</button>
</td>
</tr>
</table>
</form>

</body>

</html>




