<?php
session_start();
error_reporting(1);
include_once("database/db.php");
extract($_POST);
extract($_GET);
extract($_SESSION);
$_SESSION['sid']=$subid;
/*$rs=mysql_query("select * from mst_question where test_id=$tid",$cn) or die(mysql_error());
if($_SESSION[qn]>mysql_num_rows($rs))
{
unset($_SESSION[qn]);
exit;
}*/
?>
<html>
<head>
<meta charset="utf-8">
<link href="css/teststyle.css" rel="stylesheet" type="text/css">
<title>Online Quiz</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body background="images/mems.png" style="font-family: Times, Times New Roman, serif;">
<?php
include_once("header.php");


$rs=mysql_query("select * from mst_question where sub_id=$sid") or die(mysql_error());
if(!isset($_SESSION[qn]))
{
	$_SESSION[qn]=0;
	mysql_query("delete from useranswer where sess_id='" . session_id() ."'") or die(mysql_error());
	$_SESSION[trueans]=0;
	
}
else
{	
		if($submit=='Next Question' && isset($ans))
		{
				mysql_data_seek($rs,$_SESSION[qn]);
				$row= mysql_fetch_row($rs);	
				mysql_query("insert into useranswer(sess_id, sub_id, que_desc, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', $sid, '$row[2]', '$row[3]', '$row[4]', '$row[5]', '$row[6]',$row[7], $ans)");
				if($ans==$row[7])
				{
							$_SESSION[trueans]=$_SESSION[trueans]+1;
				}
				$_SESSION[qn]=$_SESSION[qn]+1;
		}
		else if($submit=='Get Result' && isset($ans))
		{
				mysql_data_seek($rs,$_SESSION[qn]);
				$row= mysql_fetch_row($rs);	
				mysql_query("insert into useranswer(sess_id, sub_id, que_desc, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', $sid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]',$row[7],$ans)");
				if($ans==$row[7])
				{
							$_SESSION[trueans]=$_SESSION[trueans]+1;
				}
				echo "<h1 class=head1> Result</h1>";
				$_SESSION[qn]=$_SESSION[qn]+1;
				echo "<Table align=center><tr class=tot><th style='font-size:20px;'>Total Questions: <th style='font-size:20px;'> $_SESSION[qn]";
				echo "<tr class=tans><th style='font-size:20px;'>True Answers: <thstyle='font-size:20px;'>".$_SESSION[trueans];
				$w=$_SESSION[qn]-$_SESSION[trueans];
				echo "<tr class=fans><th style='font-size:20px;'>Wrong Answer: <th style='font-size:20px;'> ". $w;
				echo "</table>";
				mysql_query("insert into result(login,sub_id,test_date,score) values('$username',$sid,'".date("Y/m/d")."',$_SESSION[trueans])") or die(mysql_error());
				
				unset($_SESSION[qn]);
			
				unset($_SESSION[sid]);
				unset($_SESSION[trueans]);
				exit;
		}
}
$rs=mysql_query("select * from mst_question where sub_id=$sid") or die(mysql_error());
if($_SESSION[qn]>mysql_num_rows($rs)-1)
{
unset($_SESSION[qn]);
echo "<h1 class=head1>Some Error  Occured</h1>";
session_destroy();
echo "Please <a href=index.php> Start Again</a>";

exit;
}
mysql_data_seek($rs,$_SESSION[qn]);
$row= mysql_fetch_row($rs);
echo "<form name=myfm method=post action=test.php>";
echo "<table align='center' class='testtab'> <tr><td> <table class='testtab2'>";
$n=$_SESSION[qn]+1;
echo "<tr class='que'><td><span class=style2>Que ".  $n .": $row[2]</style>";
echo "<tr class='opt'><td class=style8> <input type=radio name=ans value=1>$row[3]";
echo "<tr class='opt'><td class=style8><input type=radio name=ans value=2>$row[4]";
echo "<tr class='opt'><td class=style8><input type=radio name=ans value=3>$row[5]";
echo "<tr class='opt'><td class=style8><input type=radio name=ans value=4>$row[6]";

if($_SESSION[qn]<mysql_num_rows($rs)-1)
echo "<tr><td><input type=submit name=submit class='bt nextq' value='Next Question'></form>";
else
echo "<tr><td><input type=submit name=submit class='bt nextq' value='Get Result'></form>";
echo "</table></table>";
?>
</body>
</html>
<?php 
include_once("footer.html");
?>