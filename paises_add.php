<?php 

	include 'DBConnection.php';
	include'sessaosegura.php';
	$fpais=$_POST['pais'];
	$query = mysqli_query($link,"insert into pais(pais) values('$fpais')");
	if($query){	
			$iduser=$_SESSION['iduser'];
			mysqli_query($link,"insert into logs(idu,descricao) values($iduser,'Inseriu um Novo País')");
			Header("Location:paises.php");}
	?>