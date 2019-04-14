<?php
	require_once(dirname(__FILE__).'/common/header.php');
?>
<div class="container" style="min-height:89%;position: relative">
<?php
 
$host="localhost"; // Host name 
$username="p1d4ti06"; // Mysql username 
$password="p1d4ti06"; // Mysql password 
$db_name="p1d4ti06_apululos"; // Database name 
$tbl_name="fanswer"; // Table name 
 
// Connect to server and select databse.
$conn = mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
mysqli_select_db($conn,"$db_name")or die("cannot select DB");
 
// Get value of id that sent from hidden field 
$id=$_GET['id'];
 
// Find highest answer number. 
$sql="SELECT MAX(a_id) AS Maxa_id FROM $tbl_name WHERE question_id='$id'";
$result=mysqli_query($conn,$sql);
$rows=mysqli_fetch_array($result);
 
// add + 1 to highest answer number and keep it in variable name "$Max_id". if there no answer yet set it = 1 
if ($rows) {
	$Max_id = $rows['Maxa_id']+1;
}
else {
	$Max_id = 1;
}
 
// get values that sent from form 
$a_name=$_POST['a_name'];
$a_email=$_POST['a_email'];
$a_answer=$_POST['a_answer']; 
$parent_id = ($_POST['parent_id']);
date_default_timezone_set('Asia/Jakarta');
$datetime=date("d/m/y H:i:s"); // create date and time
// Insert answer 
$sql2="INSERT INTO fanswer(question_id, a_id, a_name, a_email, a_answer, a_datetime, parent_id)VALUES('$id', '$Max_id', '$a_name', '$a_email', '$a_answer', '$datetime', '$parent_id')";
$result2=mysqli_query($conn,$sql2);
$lastID = mysqli_insert_id($conn);
 
if($result2){
	/*echo "Successful<BR>";
	echo "<a href='view_topic.php?id=".$id."'>".$lastID."View your answer</a>";*/
 	header('location:view_topic.php?id='.$id.'');
// If added new answer, add value +1 in reply column 
	$tbl_name2="fquestions";
	$sql3="UPDATE $tbl_name2 SET reply='$Max_id' WHERE id='$id'";
	$result3=mysqli_query($conn,$sql3);
	$name = $_SESSION['username'];
	$getid = $_SESSION['user_id'];

	$sql4 = "INSERT INTO user_forum(user_id,answer_id,id)VALUES('$getid','$lastID','')";
	$result2=mysqli_query($conn,$sql4);
}
else {
	echo $result2;
	echo $id."<br>";
	echo $a_name."<br>";
	echo $a_email."<br>";
	echo $a_answer."<br>"; 
	echo $Max_id."<br>";
	echo "ERROR";
}
 
// Close connection
//mysql_close();
?>
<?php
 
/*// Connect to server and select databse.
$cons = mysqli_connect("$host", "$username", "$password", "$db_name");

// Get value of id that sent from hidden field 
$a_name = $_SESSION['username'];

$sql4 = "INSERT INTO user_forum(answer_id,username)VALUES('$lastID',$a_name')";
$result2=mysqli_query($conn,$sql4);*/
?>
</div>
<?php
	require_once(dirname(__FILE__).'/common/footer.php');
?>