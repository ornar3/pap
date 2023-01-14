<!-- Registar Leite -->		
 
 <?php 
	session_start();
	include 'DBConnection.php';
	$vaca=$_SESSION['vaca'];
	if ((isset($_POST["leite"])) && (isset($vaca))){
		$fleite=$_POST["leite"];
		$fvaca=$vaca;
		$datarecolha=date("Y-m-d");
		
		$query=mysqli_query($link,"insert into leite(data,quantidade,numero) values('$datarecolha',$fleite,'$fvaca')");
		
		if($query){
			header("Refresh:0; url=vaca.php");
						}
					else{
						echo"Erro ao inserir!Erro: ".mysqli_error($link)."";
						}
					
					}		
					
 ?>