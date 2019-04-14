<?php

function getComments($row) {
	echo "<li class='comment'>";
	echo "<div class='aut'>".$row['a_name']."</div>";
	echo "<div class='aut'>".$row['a_email']."</div>";
	echo "<br>";
	echo "<div class='comment-body'>".$row['a_answer']."</div>";
	echo "<br>";
	echo "<div class='timestamp'>".$row['a_datetime']."</div>";
	echo "<a href='#comment_form' class='reply' id='".$row['id']."'>Reply</a>";
	
	$link = mysqli_connect("localhost","root","");
	mysqli_select_db($link, "p1d4ti06_apululos");
	$q = "SELECT * FROM fanswer WHERE parent_id = ".$row['id']."";
	$r = mysqli_query($link, $q);
	if(mysqli_num_rows($r)>0)
		{
		echo "<ul>";
		while($row = mysqli_fetch_assoc($r)) {
			getComments($row);
		}
		echo "</ul>";
		}
	echo "</li>";
}
?>