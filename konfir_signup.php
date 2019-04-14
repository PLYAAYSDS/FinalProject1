<?php
include "koneksi.php";
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$alamat = $_POST['alamat'];
$notelepon = $_POST['nomor'];
$role = 2;
$_SESSION['nomor'] = $notelepon;
$cek_username=mysqli_num_rows(mysqli_query($conn,"SELECT username FROM user WHERE username='$_POST[username]'"));

if ($cek_username == 0){
	$daftar = 'insert into user (`nama`,`username`,`password`,`alamat`,`nomor`,`role`) VALUES (?,?,?,?,?,?)';
	$statement = $conn->prepare($daftar);
	$statement->bind_param('ssssdi',$nama,$username,$password,$alamat,$notelepon,$role);
	$statement->execute();
			echo "<script>alert('Berhasil Mendaftar sebagai $username')</script>";
			echo "<meta http-equiv='refresh' content='1 url=login.php'>";
	}
	else if($cek_username > 0)
	{
	echo "<script>alert('$username sudah ada, silahkan mencoba mendaftar dengan nama lain')</script>";
	echo "<meta http-equiv='refresh' content='1 url=login.php'>";
}
?>
