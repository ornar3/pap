<?php
	include 'DBConnection.php';
	include'sessaosegura.php';
	if (((isset($_POST["stock"])) ))
						{
							$med=$_POST["medicamento"];
							$fstock=$_POST["stock"];
							$addstock=$qdisp+$fstock;
							$query=mysqli_query($link,"update medicamentos set qdisp='$addstock' where idm=$med");
							if($query){
							$iduser=$_SESSION['iduser'];
							mysqli_query($link,"insert into logs(idu,descricao) values($iduser,'Inseriu um Medicamento')");
							$url = 'medicamento.php?'.$med;
							Header("Location:$url");
						}	

?>