<?php
 
$host="localhost"; // Host name 
$username="p1d4ti06"; // Mysql username 
$password="p1d4ti06"; // Mysql password 
$db_name="p1d4ti06_apululos"; // Database name 
$tbl_name="fquestions"; // Table name 
 
// Connect to server and select database.
$conn = mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
mysqli_select_db($conn,"$db_name")or die("cannot select DB");
 
// get data that sent from form 
$topic=$_POST['topic'];
$detail=$_POST['detail'];
$name=$_POST['name'];
$email=$_POST['email'];
 
date_default_timezone_set('Asia/Jakarta');
$datetime=date("d/m/y H:i:s"); //create date time
 
$sql="INSERT INTO $tbl_name(topic, detail, name, email, datetime)VALUES('$topic', '$detail', '$name', '$email', '$datetime')";
$result=mysqli_query($conn,$sql);
 
if($result){
	header("location:main_forum.php");
}
else {
	echo "ERROR";
}
//mysql_close();
?>