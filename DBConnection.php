	
	<?php
	$db_name= 'pap';
	$link= mysqli_connect('localhost','root','',$db_name,3000);
	if(!$link){
		die('Could not connect: '.mysql_error());
	}
	?>