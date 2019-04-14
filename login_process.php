<?php
	session_start();
	include 'function/koneksi.php';
	
	
	if(isset($_GET['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
	
		$query = mysqli_query($connect,"SELECT * FROM user where username='$username' AND password='$password'");
		$masuk = mysqli_fetch_array($query);
		

		if ($masuk == FALSE) {
			echo "<script>alert('Nama pengguna dan kata sandi tidak valid')</script>";
			echo 'Please wait while you are redirect';
			echo "<meta http-equiv='refresh' content='1 url=login.php'>";
		}	
		else if ($query == TRUE) {
			if ($masuk == TRUE) {
				$_SESSION['username'] = $masuk['username'];
				$_SESSION['user_id'] = $masuk['ID'];
				if($masuk['role_id'] == 1) {
					$_SESSION['admin'] = 1;
					header("location:CRUD.php");
				}
				elseif($masuk['role_id'] == 2){
					$_SESSION['username'] = $masuk['username'];
					$_SESSION['user_id'] = $masuk['ID'];
					$_SESSION['user'] = 2;
					header("location:index.php");
				}
			}
		}
	}
	
	if(isset($_GET['logout'])){
		$_SESSION['admin'] = 0;
		$_SESSION['user'] = 0;
		header("location:index.php");
	}
	?>