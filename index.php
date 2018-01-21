<?php
session_start();
error_reporting();
include_once("header.php");
include_once("database/db.php");
?>
<?php
function login(){
if(isset($_POST['submit'])){
	
	$usrname = $_POST['usrname'];
	$pwd = $_POST['pwd'];
	$query=mysql_query("select * from student where username='$usrname' and password='$pwd'");
    $rows= mysql_num_rows($query);
	if($rows>0){
		$_SESSION['username']=$usrname;
		//echo "logged in";
		echo "<script>window.open('topics.php','_self')</script>";
	} else{
		echo "<p class='alert alert-danger' style='margin-top:5px;'>Invalid Username or Password</p>";
	}
}
}
if(isset($_POST['register'])){
	$usrname = $_POST['usrname'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$pwd = $_POST['cpwd'];
	$insert="insert into student(username,password,name,phone,email) values('$usrname','$pwd','$name',$phone,'$email')";
	$run=mysql_query($insert);
	if($run>0){
		echo "<p class='alert alert-success'><strong>Successfully Registered !</strong></p>";
	}
		else{
			echo "<p class='alert alert-danger fade in'>Some Error Occured, Please try again !</p>";
		}
}
?>
	


<html>
<head>
<style>
#news2{
	  background-color:#2767a5;
	  height:350px;
	  width: 250px;
	  border-radius:20px;
	  
  }
  .popular{
	list-style-type: none;
	text-align: center; 
	width:200px;
	border:1px solid black;
	background-color: white;
	border-radius: 20px;
	height: 245px;
	padding-left: 0px;
}
	
	.popular li{
		text-align:center;
		padding: 20px 0px 20px 0px;
		
		}
	
	ul.popular li:not(:last-child){ 
		border-bottom: 1px solid #f2f0eb;}
	
	.popular li a:hover{
		
		color: black;}
	
	.popular li a{
		text-decoration: none; 
		font-size: 15px;
		color: #white;
	}
.mrq2{
	text-align: center; 
	border-radius: 20px;
	margin: 0px 0px 10px;
}
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.js"></script>
</head>
<body background="images/mems.png">
<div class="container-fluid" style="margin-top:25px;">
<div class="col-sm-2">
<div id="news2">
<p>&nbsp<p><h3 align="center" style="color:white; font-family: Times, Times New Roman, serif;">Articles</h3>
<center><ul class="popular">
<marquee direction="up" class="mrq2" height="245px;" onMouseOver="this.stop();" onMouseOut="this.start();">
<li><a href="#">Hydrogen peroxide vapor sensor using metal-phthalocyanine functionalized carbon nanotubes.</a></li>
<li><a href="#">Resonance Raman and Electronic Absorption Study of Fre-Base Tetraphenylporphine Diacid Dispersed in Polymethylcyanoacrylate.</a></li>
<li><a href="#">Turn Your Entrepreneurial Dream into A Successful Business Venture.</a></li>
<li><a href="#">Last date extended for UG Courses 2017-18.</a></li>
</marquee>
</ul></center>
</div>
</div>
<div class="col-sm-7">
	<h2 align="center">Welcome Aboard</h2>
	<h3 align="center">Online Examination Portal</h3>
	</div>
<div class="col-sm-3" style="background-color:rgba(255,255,255,0.5); border:1px solid #d8d8d8">
<fieldset><legend>LOGIN</legend>
	<form method="POST">
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" id="email" placeholder="Enter your Institute Roll No." name="usrname">
    </div>
    <div class="form-group">
      <label for="pwd">Password</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
    <button type="submit" class="bt" name="submit">Login »</button>
	<?php login();?>
  </form>
  <p style="float:right;">If not already registered then <button type="button" id="myBtn" class="bt">Register</button></p>
  </fieldset>
  <script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>
  <div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:#2767a5;"><span class="glyphicon glyphicon-lock"></span>REGISTER</h4>
        </div>
        <div class="modal-body">
          <form method="POST">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" id="usrname" name="usrname" placeholder="Enter your Institute Roll No. here" required
			     pattern="[0-9]+[0-9]+[a-zA-Z]+[a-zA-Z]+[a-zA-Z]+[0-9]+[0-9]">
            </div>
			<div class="form-group">
              <label for="name"><span class="glyphicon glyphicon-user"></span> Name</label>
              <input type="text" class="form-control" id="usrname" name="name" placeholder="Enter your Full Name" required>
            </div>
			<div class="form-group">
              <label for="phone"><span class="glyphicon glyphicon-user"></span> Phone</label>
              <input type="text" class="form-control" id="usrname" name="phone" placeholder="Enter your Number" required>
            </div>
			<div class="form-group">
              <label for="email"><span class="glyphicon glyphicon-envelope"></span> Email</label>
              <input type="email" class="form-control" id="usrname" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
              <label for="password"><span class="glyphicon glyphicon-eye-close"></span> Password</label>
              <input type="password" class="form-control" id="pwd" placeholder="Set a password" required>
            </div>
			<div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-close"></span> Confirm Password</label>
              <input type="password" class="form-control" id="cpwd" name="cpwd" required>
            </div>
            
            <button type="submit" name="register" class="btn btn-default btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Register</button>
          </form>
        </div>
        <div class="modal-footer">
          <h6>If already registered then login at <a href="index.php">HomePage</a></h6>
        </div>
      </div>
    </div>
  </div> 
</div>
</div>
</div>
</body>
</html>
<?php 
include_once("footer.html");
?>