<?php
require 'db_connect.php';//to call for a bd connection
if(isset($_POST['submit'])){//check that the button is pressed
	if(
	!empty($_POST['userName'])
	&&!empty($_POST['userCourse']))//check for empty fields
{
$user=$_POST['userName'];
$course=$_POST['userCourse'];//get user inputs
mysql_select_db("store");//select your db
$query="SELECT user from info where user='".$user."'";
$fetch=mysql_query($query);//check whether the record exists
if(mysql_num_rows($fetch)==1)//if true then
echo "The Username ".$user." already exists";
else{//if it is a new record
$query="INSERT into info values('".$user."','".$course."')";
if(mysql_query($query))
echo "Data recorded";
}
}
}
else
	echo "All fields Required";
?>
<html>
<head>
<title>Simple DB Insert Example</title>
	</head>
<body>
	<!--A simple html form to allow user interaction-->
<form action="insert.php" method="POST">
	User Name<input type="text" name="userName" >
	<br> <br>
	Course <input type="text" name="userCourse" >
	<br> <br>
	
	<input type="Submit" name="submit">
</form>
</body>
