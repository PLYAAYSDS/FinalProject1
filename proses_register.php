<?php
include "function/koneksi.php";
$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$role_id = 2;
$cek_username=mysqli_num_rows(mysqli_query($connect,"SELECT username FROM user WHERE username='$_POST[username]'"));

if ($cek_username == 0){
	$daftar = 'insert into user (`name`,`username`,`password`,`email`,`role_id`) VALUES (?,?,?,?,?)';
	$statement = $connect->prepare($daftar);
	$statement->bind_param('ssssi',$name,$username,$password,$email,$role_id);
	$statement->execute();
	echo "<script>alert('Selamat, anda telah berhasil mendaftar')</script>";
	echo "<meta http-equiv='refresh' content='1 url=login.php'>";
}else if($cek_username > 0)
	{
	echo "<script>alert('$username sudah ada, silahkan mencoba mendaftar dengan nama lain')</script>";
	echo "<meta http-equiv='refresh' content='1 url=login.php'>";
}

?>
