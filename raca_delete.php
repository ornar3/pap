<?php
	include 'DBConnection.php';
	include'sessaosegura.php';
			$divide  = explode("?", $_SERVER["REQUEST_URI"]);
			$divide['1'];
			$idr=$divide['1'];
			$query = mysqli_query($link,"update racas set ativo=1 where idr=$idr");

					if($query){
						$iduser=$_SESSION['iduser'];
						mysqli_query($link,"insert into logs(idu,descricao) values($iduser,'Eliminou uma Raça')");
						Header("Location:racas.php");
					}
	
?>