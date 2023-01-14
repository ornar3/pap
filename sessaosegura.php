<?php session_start();
if($_SESSION['tipo'] == 1){
}
else{
	Header("refresh:0.1;url=index.php");}
?>