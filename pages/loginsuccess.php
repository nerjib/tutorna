<?php
$db=mysqli_connect('localhost','root','','ututor') or die(mysqli_error());


  if( isset($_COOKIE["uname"])){
	  
 $pn=$_COOKIE["phone_no"];
 $pass=$_COOKIE["pass"];
 $strsql="SELECT * FROM users WHERE phone_no='$pn' && password='$pass'"or die("mysqli_error()");
$rs=mysqli_query($db,$strsql);
while($row=mysqli_fetch_array($rs)){
	session_start();
	$_SESSION['uname']=$row['uname'];
	$uname=$row['uname'];
	setcookie("uname", "$uname", time()+2592000, "/","", 0);
	
	header("location:index.php");
 
 }
  }
  
 else{
 $pn=$_POST['phone_no'];
 $pass=$_POST['pword'];


$strsql="SELECT * FROM users WHERE phone_no='$pn' && password='$pass'"or die("mysqli_error()");
$rs=mysqli_query($db,$strsql);
while($row=mysqli_fetch_array($rs)){
	session_start();
	$_SESSION['uname']=$row['uname'];
	$uname=$row['uname'];
	setcookie("uname", "$uname", time()+2592000, "/","", 0);
	setcookie("phone_no", "$phone_no", time()+2592000, "/","", 0);
	setcookie("pass", "$pword", time()+2592000, "/","", 0);
	header("location:index.php");
}

echo("check usename or password");
 }
?>

<br/>
<div align="center">
<a href="logout.php"> Retry Login </a> 
dont Have account <a href="signup.php"> sign up here </a> 
</div>