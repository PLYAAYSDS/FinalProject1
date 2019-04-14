<?php
/*database.php
  database function
*/
	global $con;
	
	$con = mysqli_connect("localhost", "p1d4ti06", "p1d4ti06");
	if (!$con) {
		die("database connect problem");
	}
	$db_use = mysqli_select_db($con, "p1d4ti06_apululos") or die("selet db problem !!");
	
	function execQ($strQ){
		global $con;
		
		$res = mysqli_query($con, $strQ);
	
		return $res;		
	}
	
	function closeConn()
	{
		global $con;
		
		$res = mysqli_close($con);
		
		return $res;		
		
	}
	function getItemDetail($itemId){
		$strQ = "select * from item where id = ". $itemId;
		
		$resItem = execQ($strQ);
		
		return $resItem;
	}
	
	function getAllItems(){
		$strQ = "select * from item";
		
		$resItems = execQ($strQ);
		
		return $resItems;
	}
	function getCategory($catId){
		$strQ = "select * from item where kategori = ". $catId;
		$resCat = execQ($strQ);
                
                return $resCat;
	}
	function getAllCategories(){
		$strQ = "select * from item_categories";
		$resCat = execQ($strQ);
		
                if(mysqli_num_rows($resCat)!=0){
                    $ret = array();
                    while($data = mysqli_fetch_assoc($resCat)){
                        array_push($ret, array(
                            'id' => $data['id'],
                            'nama' => $data['Nama'],
                            'desc' => $data['Desc'],
                            'image' => $data['image'],
                        ));
                    }
                    return $ret;
                } else {
                    return false;
                }
	}
	
	function getAllItemByCategory($catId){
		$strQ = "select * from item where kategori = ".$catId;
		$resCat = execQ($strQ);
		
		return $resCat;
	}
        
        function liveSearch($term){
                $strQ = "SELECT * FROM item WHERE name LIKE '" . $term . "%'";
                
                return $strQ;
        }
	
	function getUser($username, $password)	{
		$strQ = "select * from user where username = '".$username."'and password = '".$password."'";
		
		$resUsr = execQ($strQ);
		
		if (mysqli_num_rows($resUsr) > 0) {
			return $resUsr;
		}else{
			return NULL;
		}
	}	

	function getProfile($username){
		$strQ = "SELECT * FROM user WHERE username='$username'";
		$resItem = execQ($strQ);

		return $resItem;
	}

?>
