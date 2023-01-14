<?php 

	include 'DBConnection.php';
	include'sessaosegura.php';
	$fpreco=$_POST['newpreco'];
	$query = mysqli_query($link,"insert into precoleite(preco) values('$fpreco')");
	if($query){	
		$iduser=$_SESSION['iduser'];
		mysqli_query($link,"insert into logs(idu,descricao) values($iduser,'Alterou o Preço do Leite')");
		Header("Location:precoleite.php");}
	?>