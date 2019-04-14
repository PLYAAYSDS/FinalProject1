<?php
// Load file koneksi.php
include "function/koneksi.php";

// Ambil Data yang Dikirim dari Form
$nama = $_POST['nama'];
$deskripsi = $_POST['desk'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$name = $_POST['name'];
$kategori = $_POST['kategori'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

  
// Rename nama fotonya dengan menambahkan tanggal dan jam upload
$fotobaru = date('dmYHis').$foto;
// Set path folder tempat menyimpan fotonya
$path = "images/".$fotobaru;
// Proses upload
if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
  // Proses simpan ke Database
  $query = "INSERT INTO item VALUES('', '$nama', '$fotobaru', '$deskripsi', '$harga', '$stok', '$kategori','$name')";
  $sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query
  $lastID = mysqli_insert_id($connect);
  
  if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :      
    header("location: CRUD.php"); // Redirect ke halaman CRUD.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
  }
}else{
  // Jika gambar gagal diupload, Lakukan :
  echo "Maaf, Gambar gagal untuk diupload.";
  echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
}

?>