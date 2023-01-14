<?php 

	include 'DBConnection.php';
	include'sessaosegura.php';
	$fraca=$_POST['raca'];
	$query = mysqli_query($link,"insert into racas(raca) values('$fraca')");
	if($query){	
		$iduser=$_SESSION['iduser'];
		mysqli_query($link,"insert into logs(idu,descricao) values($iduser,'Inseriu uma Nova Raça')");
		Header("Location:racas.php");}
	?>