<?php
require_once(dirname(__FILE__).'/common/header.php');

?>
<div class="container" style="min-height:100%;position: relative">
  <h1>Data Ulos</h1>
  <span class='glyphicon glyphicon-plus'></span><a href="form_simpan.php">Tambahkan</a><br><br>
  <table border="0" class="table" width="100%" style="text-align: center;">
  <tr>
    <th width="200px">Foto</th>
    <th width="100px" style="text-align: center;">Nama</th>
    <th width="300px" style="text-align: center;">Deskripsi</th>
    <th width="100px" style="text-align: center;">Harga</th>
    <th width="100px" style="text-align: center;">Stok</th>
    <th width="100px" style="text-align: center;">Kategori</th>
    <th width="100px" style="text-align: center;">Aksi</th>
    <th width="100px" style="text-align: center;">Dimasukkan oleh</th>
  </tr>
  <?php
  // Load file koneksi.php
  include "function/koneksi.php";
  
  $query = "SELECT * FROM item"; // Query untuk menampilkan semua data siswa
  $sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query
  
  while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
    $harga=number_format($data['harga'],0,",",".");
    echo "<tr>";
    echo "<td><img src='images/".$data['foto']."' width='200' height='200'></td>";
    echo "<td>".$data['nama']."</td>";
    echo "<td style='text-align:justify'>".$data['desk']."</td>";
    echo "<td> $harga </td>";
    echo "<td>".$data['stok']."</td>";
    echo "<td>".$data['kategori']."</td>";
    echo "<td><span class='glyphicon glyphicon-edit'></span><a href='form_ubah.php?id=".$data['id']."'>edit</a><br>";
    echo "<span class='glyphicon glyphicon-remove'></span><a href='proses_hapus.php?id=".$data['id']."'>Hapus</a></td>";
    echo "<td>".$data['name']."</td>";
    echo "</tr>";
  }
  ?>
  </table>
  <br>
</div>
<?php
require_once(dirname(__FILE__).'/common/footer.php');
?>