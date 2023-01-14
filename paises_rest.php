<?php
	include 'DBConnection.php';
	include'sessaosegura.php';
			$divide  = explode("?", $_SERVER["REQUEST_URI"]);
			$divide['1'];
			$idp=$divide['1'];
			$query = mysqli_query($link,"update pais set ativo=0 where idp=$idp");

					if($query){
						$iduser=$_SESSION['iduser'];
						mysqli_query($link,"insert into logs(idu,descricao) values($iduser,'Restaurou uma País')");
						Header("Location:paises.php");
					}
	
?>