<?php
	session_start(); //making session


	global $conn;
	$conn = mysqli_connect("localhost", "p1d4ti06", "p1d4ti06");
	if(!$conn){
		die("database connect problem");
	}
	$db_use = mysqli_select_db($conn, "p1d4ti06_apululos") or die("select db problem!!");

	//Fungsi untuk mengeksekusi query
	function execQ($strQ){
		global $conn;
		$res = mysqli_query($conn, $strQ);

		return $res;
	}


	function getItemDetail($itemId){
		$strQ = "select * from item where id = ".$itemId;
		
		$resItem = execQ($strQ);
		
		return $resItem;
	}
	
	
	function getAllItems(){
		$strQ = "select * from produk";
		
		$resItems = execQ($strQ);
		
		return $resItems;
	}

	 function liveSearch($term){
                $strQ = "SELECT * FROM item WHERE nama LIKE '" . $term . "%'";
     
                return $strQ;
        }
?>
