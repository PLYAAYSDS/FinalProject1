<?php
require_once(dirname(__FILE__).'/common/header.php');
require_once(dirname(__FILE__).'/database.php');

$resItem = getProfile($_SESSION['username']);
  while($item = mysqli_fetch_array($resItem)){
    $name = $item['name'];
?>
<div class="container text-center" style="min-height:110%;position: relative;width: 100%">
  <div class="col-md-2"></div>
  <div class="col-md-8">
  <br><h2><span class='glyphicon glyphicon-plus'></span>&nbsp;Tambah Data Ulos</h2><br>
  <form method="post" action="proses_simpan.php" enctype="multipart/form-data">
  <table cellpadding="8" width="100%">
  <tr>
    <td width="40px">Nama</td>
    <td width="10px">:</td>
    <td><input type="text" name="nama" style="width: 100%"></td>
  </tr>
  <tr style="height: 5px">
  </tr>
  <tr>
    <td width="40px">Deskripsi</td>
    <td width="10px">:</td>
    <td><input type="textarea" name="desk" style="width: 100%"></td>
  </tr>
  <tr style="height: 5px">
  </tr>
  <tr>
    <td>harga</td>
    <td width="10px">:</td>
    <td><input type="text" name="harga" style="width: 100%"></td>
  </tr>
  <tr style="height: 5px">
  </tr>
  <tr>
    <td>stok</td>
    <td width="10px">:</td>
    <td><input type="text" name="stok" style="width: 100%"></td>
  </tr>
  <tr style="height: 5px">
  </tr>
  <tr>
    <td>kategori</td>
    <td width="10px">:</td>
    <td>
      <select name="kategori" style="width: 100%">
        <option value="1">ulos pernikahan</option>
        <option value="2">ulos duka cita</option>
        <option value="3">ulos tardidi</option>
        <option value="4">ulos memasuki rumah baru</option>
        <option value="5">ulos sehari-hari</option>
      </select>
    </td>
  </tr>
  <tr style="height: 5px">
  </tr>
  <tr>
    <td>Foto</td>
    <td width="10px">:</td>
    <td><input type="file" name="foto"></td>
  </tr>
  <tr style="height: 5px">
  </tr>
  <tr>
    <td><input type="hidden" name="name" value="<?php echo $name; ?>"></td>
  </tr>
  </table>
<?php
  }
?>
  <hr>
  <input type="submit" value="Simpan">
  <a href="CRUD.php"><input type="button" value="Batal"></a>
  </form>
  </div>
</div>
<?php

require_once(dirname(__FILE__).'/common/footer.php');

?>