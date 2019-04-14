<?php
	require_once('function/koneksi.php');


?>
<?php
$host="localhost"; // Host name 
$username="p1d4ti06"; // Mysql username 
$password="p1d4ti06"; // Mysql password 
$db_name="p1d4ti06_apululos"; // Database name 
$tbl_name="fquestions"; // Table name 
 
// Connect to server and select databse.
$conn = mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
mysqli_select_db($conn,"$db_name")or die("cannot select DB");
 
$sql="SELECT * FROM $tbl_name ORDER BY id DESC";
// OREDER BY id DESC is order result by descending
 
$result=mysqli_query($conn,$sql);


?>
<?php
	require_once(dirname(__FILE__).'/common/header.php');
?>

 <div class="container text-center" style="padding:0;width:90%;background-color:white;min-height:110%;position: relative">
	<div class="col-md-12" style="padding:0;width:100%;background-color:white"><br>
	<center><h2><strong>Topik</strong></h2></center>
	<?php
if(isset($_SESSION['user']))
{
	echo "<a href='new_topic.php'><h4 style='text-align:right'><button type='succes'><strong>Buat topik baru</strong></button></h4></a>";
}else if(isset($_SESSION['admin'])){
	echo "<a href='new_topic.php'><h4 style='text-align:right'><button type='succes'><strong>Buat topik baru</strong></button></h4></a>";
}else{
	echo "<a href='error.php'><h4 style='text-align:right'><button type='succes'><strong>Buat topik baru</strong></button></h4></a>";
}
?>
	<BR>
		<table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
			<tr>
				<td width="53%" align="center" bgcolor="#E6E6E6"><strong>Judul</strong></td>
				<td width="15%" align="center" bgcolor="#E6E6E6"><strong>Dilihat</strong></td>
				<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Dijawab</strong></td>
				<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Tanggal/Waktu</strong></td>
			</tr>
 
<?php
 
// Start looping table row
while($rows = mysqli_fetch_array($result)){
?>
<?php
if(isset($_SESSION['admin']))
{
echo "
<tr>
	<td bgcolor='#FFFFFF'><a href='view_topic.php?id=".$rows['id']."'>".$rows['topic']."</a><BR></td>
	<td align='center' bgcolor='#FFFFFF'>".$rows['view']."</td>
	<td align='center' bgcolor='#FFFFFF'>".$rows['reply']."</td>
	<td align='center' bgcolor='#FFFFFF'>".$rows['datetime']."</td>
</tr>";

}else if(isset($_SESSION['user'])){
echo "
<tr>
	<td bgcolor='#FFFFFF'><a href='view_topic.php?id=".$rows['id']."'>".$rows['topic']."</a><BR></td>
	<td align='center' bgcolor='#FFFFFF'>".$rows['view']."</td>
	<td align='center' bgcolor='#FFFFFF'>".$rows['reply']."</td>
	<td align='center' bgcolor='#FFFFFF'>".$rows['datetime']."</td>
</tr>";

}else{
echo '
<tr>
	<td bgcolor="#FFFFFF"><a href="error.php">'.$rows['topic'].'</a><BR></td>
	<td align="center" bgcolor="#FFFFFF">'.$rows['view'].'</td>
	<td align="center" bgcolor="#FFFFFF">'.$rows['reply'].'</td>
	<td align="center" bgcolor="#FFFFFF">'.$rows['datetime'].'</td>
</tr>';
}
?>
<?php
// Exit looping and close connection 
}
//mysql_close();
?>
 
<tr>
<!-- <?php
if(isset($_SESSION['user']))
{
	echo "<td colspan='5' align='right' bgcolor='#E6E6E6'><a href='new_topic.php'><strong>Buat topik baru</strong> </a></td>";
}else if(isset($_SESSION['admin'])){
	echo "<td colspan='5' align='right' bgcolor='#E6E6E6'><a href='new_topic.php'><strong>Buat topik baru</strong> </a></td>";
}else{
	echo "<td colspan='5' align='right' bgcolor='#E6E6E6'><a href='error.php'><strong>Buat topik baru</strong> </a></td>";
}
?> -->
</tr>
</table>
</BR>
</td>
</tr>
</table>
</div>
</div>
<?php
	require_once(dirname(__FILE__).'/common/footer.php');
?>