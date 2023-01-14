<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html;charset=iso-8859-1"><meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>4Cows >Adicionar Vaca</title>
 
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="assets/modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="assets/modules/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>
<?php include "DBConnection.php";?>
<?php include'sessaosegura.php';?>
<body>
<?php include'menuadmin.html';?>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Adicionar Vaca</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="admin.php">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Vacas</a></div>
              <div class="breadcrumb-item">Adicionar Vaca</div>
            </div>
          </div>
		  
<div class="card card-primary">
              <div class="card-header"><h4>Informação Geral</h4></div>

              <div class="card-body">
                <form enctype="multipart/form-data" action="inserirvaca.php" method="POST">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="num">Número</label>
                      <input id="num" type="text" class="form-control" name="num" autofocus>
                    </div>
                    <div class="form-group col-6">
					<div class="form-group">
                      <label>Data de Nascimento</label>
                      <input type="text" class="form-control datepicker" name="data">
                    </div>
                    </div>
                  </div>
				<div class="row">
                  <div class="form-group col-6">
				  <label>Espécie</label>
                    <select class="form-control" name="espec">
						<?php $qry=mysqli_query($link,"Select * from racas where ativo=0");  
							while ($row=mysqli_fetch_array($qry)){?>
                        <option><?php echo $row['raca'];?></option>
							<?php }?>
                      </select>

					</div>
				  <div class="form-group col-6">
					<div class="form-group">
                      <label>Número da Mãe</label>
                      <select class="form-control" name="nummae">
                        <option>Desconhecido</option>
						<?php $qry=mysqli_query($link,"Select * from vacas order by numero");  
							while ($row=mysqli_fetch_array($qry)){?>
                        <option><?php echo $row['numero'];?></option>
							<?php }?>
                      </select>
                    </div>
                    </div>
                  
				</div>
				  
				  <div class="row">
				  <div class="form-group col-6">
                    <label for="example-text-input" class="form-control-label">Período de</label>
					<div class="selectgroup selectgroup-pills">
                        <label class="selectgroup-item">
                          <input type="radio" name="estado" value="1" class="selectgroup-input" checked=""><!--para fazer um radio group, coloco o mesmo name-->
                          <span class="selectgroup-button selectgroup-button-icon">Lactação</span>
                        </label>
                        <label class="selectgroup-item">
                          <input type="radio" name="estado" value="0" class="selectgroup-input">
                          <span class="selectgroup-button selectgroup-button-icon">  Seca  </span>
                        </label>
					</div>
				  </div>
				  <div class="form-group col-6">
					<div class="form-group">
                      <label>País de Origem</label>
                      <select class="form-control" name="pais">
					  <option>Desconhecido</option>
						<?php $qry=mysqli_query($link,"Select * from pais where ativo=0");  
							while ($row=mysqli_fetch_array($qry)){?>
                        <option><?php echo $row['pais'];?></option>
							<?php }?>
                      </select>
                    </div>
                    </div>
				  </div>
				  
                  <div class="form-group mb-0">
                    <label>Observações</label>
					<textarea class="form-control" required="" style="height: 182px;" name="observ"></textarea>
                  </div>


                  <div class="form-divider">
                    Inserir Imagem
                  </div>
					<div class="form-group">
						<div><input type="file" name="pic" accept="image/*"></div>
					</div>
                  
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Inserir
                    </button>
                  </div>
                </form>
              </div>
            </div>
          <div class="section-body">
            <div class="row">
              
        </section>
      </div>
      <?php include 'footer.php';?>
    </div>
  </div>
  
<?php
if (((isset($_POST["num"])) && (isset($_POST["data"]))&& (isset($_POST["espec"]))&& (isset($_POST["estado"]))))
				{
					
					$fnum=$_POST["num"];
					$fdata=$_POST["data"];
					$fespec=$_POST["espec"];
					$fmae=$_POST["nummae"];
					$fobserv=$_POST["observ"];
					$festado=$_POST["estado"];
					$fpais=$_POST["pais"];
					$_SESSION['numqr']=$fnum;
					
					$query= mysqli_query($link,"insert into vacas(numero,datanasc,especie,nummae,estado,pais,observ) values($fnum,'$fdata','$fespec','$fmae',$festado,'$fpais','$fobserv')");

					if($query){
					$iduser=$_SESSION['iduser'];
					mysqli_query($link,"insert into logs(idu,descricao) values($iduser,'Inseriu uma Vaca')");
					include "gerarqr.php";
					?>
						<script>
						swal({
						  title: "Inserido com Sucesso!",
						  text: "",
						  icon: "success",
						});
						</script>
						<?php
						}
					else{
						echo"Erro ao inserir!Erro: ".mysqli_error($link)."";
						}
					
					}				
?>
<?php
 if(isset($_FILES['pic']))
 {
    $ext = strtolower(substr($_FILES['pic']['name'],-4)); // extensão da imagem
    $new_name = $fnum . $ext; // novo nome para a imagem
    $dir = 'imagens_vacas/'; //pasta para onde vao as imagens 
    move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name); //Fazer upload da imagem
	$query=mysqli_query($link,"update vacas set extensao='$ext' where numero=$fnum");
	if($query){
		 echo("Imagem enviada com sucesso!");
		}
		else{
			echo"Erro ao inserir!Erro: ".mysqli_error($link)."";
		} 
 } 
?>


  <!-- General JS Scripts -->
  
  <script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>
  
  
  <!-- JS Libraies -->
  <script src="assets/modules/cleave-js/dist/cleave.min.js"></script>
  <script src="assets/modules/cleave-js/dist/addons/cleave-phone.us.js"></script>
  <script src="assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <script src="assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="assets/modules/select2/dist/js/select2.full.min.js"></script>
  <script src="assets/modules/jquery-selectric/jquery.selectric.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="assets/js/page/forms-advanced-forms.js"></script>
  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
</body>
</html>