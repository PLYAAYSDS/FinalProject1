<?php
    include('function/koneksi.php');
    if(isset($_POST['cari_keyword']))
    {
        $cari_keyword = $connect->real_escape_string($_POST['cari_keyword']);
        $sqlSiswa="SELECT id,nama FROM item WHERE nama LIKE '%$cari_keyword%'";
        $resSiswa=$connect->query($sqlSiswa);
 
        if($resSiswa === false) {
            trigger_error('Error: ' . $connect->error, E_USER_ERROR);
        }else{
            $rows_returned = $resSiswa->num_rows;
        }
 
 $bold_cari_keyword = '<strong>'.$cari_keyword.'</strong>';
 if($rows_returned > 0){
            while($rowSiswa = $resSiswa->fetch_assoc()) 
            { 
                echo "<a href='selengkapnya.php?item_id=".$rowSiswa['id']."'><p>" . $rowSiswa['nama'] . "</p></a>"; 
            }
        }else{
            echo '<div class="show" align="left"><font color="red">Produk tidak ditemukan.</font></div>'; 
        }
    } 
?>