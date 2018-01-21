<?php
mysql_connect("localhost","root","") or die("<h1>Couldn't connect to Database !</h1>");
mysql_select_db("online_exam") or die("<h1>Couldn't find Database !</h1>");

$sidb=$_GET['si'];
if(isset($_POST['submit'])){
	$qdesc=$_POST['desc'];
	$oans1=$_POST['ans1'];
	$oans2=$_POST['ans2'];
	$oans3=$_POST['ans3'];
	$oans4=$_POST['ans4'];
	$trueans=$_POST['trueans'];
$insert="INSERT INTO mst_question(sub_id,que_desc,ans1,ans2,ans3,ans4,true_ans) VALUES($sidb,'$qdesc','$oans1','$oans2','$oans3','$oans4',$trueans)";
$run=mysql_query($insert);
if($run>0){
	echo "Added !";
}
else{
     echo "Some Error Occured, Please try again";
}
}
?>