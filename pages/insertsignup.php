<?php
//coneccting to database
$phone=$_POST['phone_no'];
$uname=$_POST['uname'];
$pword=$_POST['pword'];


$db=mysqli_connect('localhost','root','','ututor') or die(mysqli_error());
$stsql="CREATE TABLE $uname(".
"mytopic varchar(30) NOT NULL,
score VARCHAR(2) NOT NULL);"  or die(mysqli_error($db));
mysqli_query($db,$stsql);


//iserting new user into the database
$strSQL="INSERT INTO users(phone_no,uname,password) VALUES('$phone','$uname','$pword')";
mysqli_query($db,$strSQL) or die("user Exist");
mysqli_close($db);
session_start();
$_SESSION['uname']=$uname;
	
	header("location:index.php");
echo "account created ";




?>
<html><body>
<a href="logintutorna.php">login here</a>
</body></html>