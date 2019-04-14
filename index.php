<?php
  /*produk.php*/

/*include functions*/
require_once(dirname(__FILE__).'/database.php');

require_once(dirname(__FILE__).'/common/header.php');

function limit_words($string, $word_limit){
    $words = explode(" ",$string);
    return implode(" ",array_splice($words,0,$word_limit));
}
?>

<br>
<div class="container" style="min-height:100%;position: relative">
<div class="col-md-10">
 <form class="navbar-form">
  <div class='web'>
        <input type="text" class="cari_keyword form-control" id="cari_keyword_id" placeholder="Cari Ulos..." />
        <div id="result"></div>
    </div>
</form>
  </div>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript">
$(function(){
$(".cari_keyword").keyup(function() 
{ 
    var cari_keyword_value = $(this).val();
    var dataString = 'cari_keyword='+ cari_keyword_value;
    if(cari_keyword_value!='')
    {
        $.ajax({
            type: "POST",
            url: "livesearch.php",
            data: dataString,
            cache: false,
            success: function(html)
                {
                    $("#result").html(html).show();
                }
        });
    }
    return false;    
});
 
$("#result").live("click",function(e){
    var $clicked = $(e.target);
    var $name = $clicked.find('.nama').html(); 
    var decoded = $("<div/>").html($name).text();
    $('#cari_keyword_id').val(decoded);
});
 
$(document).live("click", function(e) { 
    var $clicked = $(e.target);
    if (! $clicked.hasClass("cari_keyword")){
        $("#result").fadeOut(); 
    }
});
 
$('#cari_keyword_id').click(function(){
    $("#result").fadeIn();
});
});
</script>
  
  
  <script src="assets/js/bootstrap.min.js"></script>
<br><br>
<?php
if(!isset($_GET['pilih'])){
    echo "<center><h2>Kategori</h2></center><br>";
    $kategori = getAllCategories();
    foreach ($kategori as $data){
        echo ' <div class="col-sm-4">
        <div class="panel panel-primary" style="min-height:400px">
          <div class="panel-heading"><center><h4 style="text-align: center; color:white"><a href="index.php?pilih='.$data['id'].'">'.$data['nama'].'</h4></center></h3></div><div class="panel-body"><center><div class="zoom"><img src="images/'.$data['image'].'" class="img-responsive" style="width:90%; height:250px;" alt="Image"></a></div></center></a></div><div class="container text" style="padding-left:15px;width:100%;">'.$data['desc'].'<br><a href="index.php?pilih='.$data['id'].'"><h5 style="text-align:right">Lihat Ulos</h5></a></div></div></div>';
    }
}
if(isset ($_GET['pilih'])){
    $catId = $_GET['pilih'];
    $resCat= getCategory($catId);
?>
<br>

<div class="container">
<?php
        while($item = mysqli_fetch_array($resCat)){
          $harga=number_format($item['harga'],0,",",".");
          $limited_string = limit_words($item['desk'],10,'...');
?>
      <div class="col-sm-4">
        <div class="panel panel-primary">
          <div class="panel-heading"><h4 style="text-align: center; color:white"><?=$item['nama']?></h4></div>
          <div class="panel-body"><div class="zoom"><img src="images/<?=$item['foto']?>" class="img-responsive" style="width:100%; height:200px;" alt="Image"></div></div>
        <div class="container text" style="padding-left:15px;width:100%;"><h6 style="height: 80px"><?= $limited_string  ?>...</h6>
        
        <h3 style="text-align: center;height: 40px">
        <?php echo "Rp. $harga ,-" ?>
        </h3>
        <a href="selengkapnya.php?item_id=<?=$item['id']?>"><h4 style="text-align: right">selengkapnya</a></h4>
        </div>
        </div>
      </div>


<?php
        }
}

?>
</div>
</div>
</div>
</div>
<?php
require_once(dirname(__FILE__).'/common/footer.php');
?>
