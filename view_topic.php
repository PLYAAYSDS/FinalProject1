<?php 
include("config.php");
include("functions.php");
?>
<script type='text/javascript' src='js/jquery.pack.js'></script>
<script type='text/javascript'>
$(function(){
	$("a.reply").click(function() {
		var id = $(this).attr("id");
		$("#parent_id").attr("value", id);
		$("#name").focus();
	});
});
</script>
<style type='text/css'>
html, body, div, h1, h2, h3, h4, h5, h6, ul, ol, dl, li, dt, dd, p, blockquote,
pre, form, fieldset, table, th, td { margin: 0; padding: 0; }

body {
font-size: 14px;
line-height:1.3em;
}

a, a:visited {
outline:none;
color:#7d5f1e;
}

.clear {
clear:both;
}

#wrapper {
	width:720px;
	margin:0px auto;
	padding:15px 0px;
}

.comment {
	padding:5px;
	border:2px solid #7d5f1e;
	margin-top:15px;
	list-style:none;
}

.aut {
	font-weight:bold;
}

.timestamp {
	font-size:85%;
	float:right;
}

#comment_form {
	margin-top:15px;
}

#comment_form input {
	font-size:1.2em;
	margin:0 0 10px;
	padding:3px;
	display:block;
	width:100%;
}

#comment_body {
	display:block;
	width:100%;
	height:150px;
}

#submit_button {
	text-align:center; 
	clear:both;
}
</style>
<?php
 
$host="localhost"; // Host name 
$username="p1d4ti06"; // Mysql username 
$password="p1d4ti06"; // Mysql password 
$db_name="p1d4ti06_apululos"; // Database name 
$tbl_name="fquestions"; // Table name 
 
// Connect to server and select databse.
$conn = mysqli_connect("$host", "$username", "$password")or die("cannot connect"); 
mysqli_select_db($conn,"$db_name")or die("cannot select DB");
 
// get value of id that sent from address bar 
$id=$_GET['id'];
$sql="SELECT * FROM $tbl_name WHERE id='$id'";
$result=mysqli_query($conn,$sql);
$rows=mysqli_fetch_array($result);


?>
<?php
	require_once(dirname(__FILE__).'/common/header.php');
	require_once(dirname(__FILE__).'/database.php');

	$resItem = getProfile($_SESSION['username']);
	while($item = mysqli_fetch_array($resItem)){
		$name = $item['name'];
		$email = $item['email'];
	}
?>
<div id='wrapper'>
<div class="container text" style="padding:0;width:100%;background-color:white">
	<div class="col-md-12" style="padding:0;width:100%;background-color:white">
	<h4>Topik Pertanyaan</h4><br>
<!-- <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
	<tr>
		<td><table width="100%" border="0" cellpadding="3" cellspacing="1" bordercolor="1" bgcolor="#ffffff">
	<tr>
		<td bgcolor="#F8F7F1" rowspan="3" style="width:80px"><strong>By :</strong> <?php echo $rows['name']; ?> <br> <strong>Email : </strong><?php echo $rows['email'];?></td>
		<td bgcolor="#F8F7F1" colspan="2" style="text-align: right"><?php echo $rows['datetime']; ?></td>
	</tr>
	<tr>
		<td colspan="4" bgcolor="#F8F7F1" ><strong><?php echo $rows['topic']; ?></strong></td>
	</tr>
 
	<tr>
		<td colspan="4" bgcolor="#F8F7F1" ><?php echo $rows['detail']; ?></td>
	</tr>
 
	<tr>
		
	</tr>
	 
	<tr>
		
	</tr>
		</td>
	</tr>
</table> -->
<li class='comment'>
	<div class="aut"><?php echo $rows['name']; ?></div>
	<div class="aut"><?php echo $rows['email']; ?></div><br>
	<center><h5><div class='comment-body'><?php echo $rows['topic']; ?></div><br></h5></center>
	<div class='comment-body'><?php echo $rows['detail']; ?></div><br>
	<div class='timestamp'><?php echo $rows['datetime']; ?></div><br>
</li>
<BR>

<h4>Jawaban</h4><br>
<?php
 
$tbl_name2="fanswer"; // Switch to table "forum_answer"
$sql2="SELECT * FROM $tbl_name2 WHERE question_id='$id'AND parent_id = 0";
$result2=mysqli_query($conn,$sql2);
/*while($rows=mysqli_fetch_array($result2)){*/
?>

<ul>
<?php
while($row = mysqli_fetch_assoc($result2)):
	getComments($row);
endwhile;
?>
</ul>
</div>

<!--coba-->
<?php

 
$sql3="SELECT view FROM $tbl_name WHERE id='$id'";
$result3=mysqli_query($conn,$sql3);
$rows=mysqli_fetch_array($result3);
$view=$rows['view'];
 
// if have no counter value set counter = 1
if(empty($view)){
$view=0;
$sql4="INSERT INTO $tbl_name(view) VALUES('$view') WHERE id='$id'";
$result4=mysqli_query($conn,$sql4);
}
 
// count more value
$addview=$view+1;
$sql5="update $tbl_name set view='$addview' WHERE id='$id'";
$result5=mysqli_query($conn,$sql5);

?>
 
<BR>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
	<tr>
		<form name="form1" method="post" action="add_answer.php?<?php echo 'id='.$id; ?>">
		<td>
			<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
				<tr>
					<td colspan="2" width="18%"><strong></strong></td>
				</tr>
				<tr>
					<td colspan="2" width="79%"><input name="a_name" type="hidden" id="a_name" size="45" required="" value="<?php echo $name; ?>"></td>
				</tr>
				</tr>
				<tr>
					<td colspan="2"><strong></strong></td>
				</tr>
				<tr>
					<td colspan="2"><input name="a_email" type="hidden" id="a_email" size="45" required="" value="<?php echo $email; ?>"></td>
				</tr>
				</tr>
				<tr>
					<td colspan="2" valign="top"><!-- <strong>Jawaban</strong> --></td>
				</tr>
				<tr>
					<td colspan="2"><textarea name="a_answer" cols="87" rows="5" id="a_answer" required="" required="" placeholder="Masukkan Jawaban Anda"></textarea></td>
					<td><input type='hidden' name='parent_id' id='parent_id' value='0'/></td>
				</tr>
				</tr>
				<tr>
					<td><input name="id" type="hidden" value="<?php echo $id; ?>"></td>
					<td><input type="submit" name="Submit" value="Submit"> <input type="reset" name="Submit2" value="Reset"></td>
				</tr>
			</table>
		</td>
		</form>
	</tr>
	</table>
</BR></td></tr></table>
</div>
</div>
</div>
</div>

<?php
	require_once(dirname(__FILE__).'/common/footer.php');
?>
