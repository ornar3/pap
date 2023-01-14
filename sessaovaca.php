<?php
// CONECTA COM A BASE DE DADOS
include 'DBConnection.php';
// RECEBE OS DADOS DO FORMULÁRIO
$vaca=$_POST['vaca'];
// VERIFICA
$sql = mysqli_query($link,"SELECT * FROM vacas WHERE numero = '$vaca'");
// LINHAS AFECTADAS PELA CONSULTA
$row = mysqli_num_rows($sql);
// VERIFICA SE DEVOLVEU ALGO
// se nao devolveu nada mostra um erro
if($row == 0){
session_start();
$pag='admin.php?erro=1';
$_SESSION['erro']=1;
Header("Location:$pag");
}
//se tiver devolvido algo vai para a pagina vaca.php
else {
	session_start();
	//GRAVA AS VARIÁVEIS NA SESSÃO
	$_SESSION['vaca'] = $vaca;
	Header("Location:vaca.php");

}//fecha else
	?>