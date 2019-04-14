<?php 
require_once(dirname(__FILE__).'/database.php');
require_once(dirname(__FILE__).'/common/header.php');
$itemId = $_GET['item_id'];
$resItem = getItemDetail($itemId);
$item = mysqli_fetch_array($resItem, MYSQLI_ASSOC);
 $harga=number_format($item['harga'],0,",",".");
?>

<br>
<div class="container" style="min-height:480px">
<div class="col-md-12">
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
	<!-- <div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="thumbnail" style="min-height:480px">
		<h2><center><?=$item['nama']?></center></h2><br>
		<img src="images/<?=$item['foto']?>" height="250px" width="200px"><br>
		<table border="0">
		<tr>
			<td colspan="" ="2">deskripsi &emsp;</td>
			<td width="10px"></td>
			<td>:</td> 
			<td width="10px"></td>
			<td><?=$item['desk']?></td>
		</tr>
		<tr height="10px">
		</tr>
		<?php echo "<tr><td>harga </td><td width=`10px`></td><td>:</td><td width=`10px`></td><td> Rp. $harga ,-</td>" ?><br>
		<tr height="10px">
		</tr>
		<tr>
			<td>Ketersediaan </td>
			<td width="10px"></td>
			<td>:</td>
			<td width="10px"></td>
			<td><?=$item['stok']?></td>
		</tr>
		</table>
	</div>
	<a href="index.php">back to product</a>
	<br>
	</div>
	<div class="col-md-3"></div> -->
	<br><br><h2 align="left"><?=$item['nama']?></h2>
	<hr>
	<div class="col-md-4" style="height: 500px">
		<div class="zoom">
			<img src="images/<?=$item['foto']?>" height="100%" width="100%" ><br>
		</div>
	</div>
	<div class="col-md-8">
		<div class="col-md-4"></div>
		<h2 style="text-align: right;padding-right: 40px">Harga</h2>
		<h3 style="text-align: right;">
		<?php echo " Rp. $harga ,-" ?>	
		</h3>
		<hr>
		<h2>deskripsi</h2>
		<h3 style='text-align:justify'>
		<?=$item['desk']?>
		</h3>
		
	</div>
</div>
<br>
<?php 
require_once(dirname(__FILE__).'/common/footer.php');
?>