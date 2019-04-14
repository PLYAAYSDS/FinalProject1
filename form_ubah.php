<?php
require_once(dirname(__FILE__).'/common/header.php');
require_once(dirname(__FILE__).'/database.php');

$resItem = getProfile($_SESSION['username']);
  while($item = mysqli_fetch_array($resItem)){
    $name = $item['name'];
?>
  <?php
  // Load file koneksi.php
  include "function/koneksi.php";
  
  // Ambil data NIS yang dikirim oleh index.php melalui URL
  $id = $_GET['id'];
  
  // Query untuk menampilkan data item berdasarkan NIS yang dikirim
  $query = "SELECT * FROM item WHERE id='".$id."'";
  $sql = mysqli_query($connect, $query);  // Eksekusi/Jalankan query dari variabel $query
  $data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql
  ?>
<div class="container text-center" style="min-height:110%;position: relative;width: 100%">
  <br><h2></font><span class="glyphicon glyphicon-edit"></span>Ubah data ulos</h2><br>
  <div class="col-md-2"></div>
  <div class="col-md-8">
  <form method="post" action="proses_ubah.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
  <table cellpadding="8"  width="100%">
  <tr>
    <td>Nama</td>
    <td width="10px">:</td>
    <td><input type="text" name="nama" value="<?php echo $data['nama']; ?>" style="width: 100%"></td>
  </tr>
  <tr style="height: 5px">
  </tr>
  <tr>
    <td>Deskripsi</td>
    <td width="10px">:</td>
    <td><input type="textarea" name="desk" value="<?php echo $data['desk']; ?>" style="width: 100%"></td>
  </tr>
  <tr style="height: 5px">
  </tr>
  <tr>
    <td>harga</td>
    <td width="10px">:</td>
    <td><input type="text" name="harga" value="<?php echo $data['harga']; ?>" style="width: 100%"></td>
  </tr>
  <tr style="height: 5px">
  </tr>
  <tr>
    <td>Stok</td>
    <td width="10px">:</td>  
    <td><input type="text" name="stok" value="<?php echo $data['stok']; ?>" style="width: 100%"></td>
  </tr>
  <tr style="height: 5px">
  </tr>
  <tr>
    <td>Kategori</td>
    <td width="10px">:</td>
    <td><select name="kategori" style="width: 100%">
        <option value="1">ulos pernikahan</option>
        <option value="2">ulos duka cita</option>
        <option value="3">ulos tardidi</option>
        <option value="4">ulos memasuki rumah baru</option>
        <option value="5">ulos sehari-hari</option>
      </select></td>
  </tr>
  <tr style="height: 5px">
  </tr>
  <tr>
    <td rowspan="2">Foto</td>
    <td width="10px" rowspan="2">:</td>
    <td>
      <input type="checkbox" name="ubah_foto" value="true"> Ceklis jika ingin mengubah foto<br>
      <input type="file" name="foto">
    </td>
  </tr>
  <tr>
    <td><input type="hidden" name="name" value="<?php echo $name; ?>"></td>
  </tr>
  </table>
  <hr>
  <input type="submit" value="Ubah">
  <a href="CRUD.php"><input type="button" value="Batal"></a>
  <hr>
  
  </form>
  </div>
  <div class="col-md-3"></div>
  </div>

<?php
  }
?>
<?php
require_once(dirname(__FILE__).'/common/footer.php');

?>