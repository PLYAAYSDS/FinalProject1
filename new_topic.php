<?php
	require_once(dirname(__FILE__).'/common/header.php');
	require_once(dirname(__FILE__).'/database.php');

	$resItem = getProfile($_SESSION['username']);
	while($item = mysqli_fetch_array($resItem)){
		$name = $item['name'];
		$email = $item['email'];
	}
?>
<br>
<div class="container" style="min-height:100%;position: relative">
	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
		<tr>
			<form id="form1" name="form1" method="post" action="add_new_topic.php">
				<td>
					<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
						<h2><strong>Buat topic baru</strong></h2>
						<br>
						
						<h4>Topik</h4><input name="topic" type="text" id="topic" size="50" placeholder="masukkan judul topik anda" />
						<br>
						<h4>Detail</h4>
							
							<textarea name="detail" cols="140" rows="10" id="detail" placeholder="masukkan deskripsi topik anda"></textarea>
						<tr>
							<td><strong></strong></td>
							<td></td>
							<td><input name="name" type="hidden" id="name" size="50" value="<?php echo $name; ?>" /></td>
						</tr>
						<tr>
							<td><strong></strong></td>
							<td></td>
							<td><input name="email" type="hidden" id="email" size="50" value="<?php echo $email; ?>" /></td>
						</tr>
						<tr style="height: 10px">
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td><input type="submit" name="Submit" value="Buat" /> 
							<input type="reset" name="Submit2" value="Reset" /></td>
						</tr>
					</table>
				</td>
			</form>
		</tr>
	</table>
</div>
<?php
	require_once(dirname(__FILE__).'/common/footer.php');
?>
