<?php
    require 'function/koneksi.php';
    include 'common/header.php';
?>

<h3><span class="glyphicon glyphicon-edit"></span>  Edit Menu</h3>
<a class="btn" href="list_menu.php"><span class="glyphicon glyphicon-chevron-left"></span>  Kembali</a>
<?php
$id = mysql_real_escape_string($_GET['id']);
$det = mysql_query("select * from menu where id_menu ='$id'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>					
<form action="edit_proses.php" method="post" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="id" value="<?php echo $d['id_menu'] ?>"></td>
			</tr>
                        <tr>
                            <td> Gambar </td>
                            <td>
                                <input type="file" name="gambar" class="form-control">
                            </td>
                        </tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" class="form-control" name="nama" value="<?php echo $d['nama'] ?>"></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td><input type="text" class="form-control" name="harga" value="<?php echo $d['harga'] ?>"></td>
			</tr>
                        <tr>
                            <td> Kategori </td>
                            <td> 
                                <input type="radio" name="kategori" value="1"> Makanan <br/>
                                <input type="radio" name="kategori" value="3"> Minuman
                            </td>
                        </tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php 
}
?>

<?php
    include 'common/footer.php';
?>