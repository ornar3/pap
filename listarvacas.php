<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>4Cows >Listar Vacas</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>
<?php include "DBConnection.php";?>
<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
     
<?php include'menuadmin.html';?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Listagem de Vacas</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="admin.php">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Vacas</a></div>
              <div class="breadcrumb-item">Listar Vacas</div>
            </div>
          </div>

         <!-- <div class="section-body">
            <h2 class="section-title">Tables</h2>
            <p class="section-lead">
				Este espaço serve para Consultar os Animais existentes na Vacaria
            </p>-->

            <div class="row">
          
              <div class="col-12 col-md-12 col-lg-12">
			  <form name="listar vaca" action="listarvacas.php" method="post">
                <div class="form-group">
                      <label>Estado</label>
                      <select class="form-control" name="estado">
                        <option value="todas">Todas</option>
                        <option value="1">Leiteiras</option>
                        <option value="0">Secas</option>
                      </select>
					<button type="submit" class="btn btn-primary btn-lg btn-block" >Listar </button>
                </div>
			  </form>
			  
			<?php if (isset($_POST["estado"])){
					$estado=$_POST["estado"];
			}else{
			$estado="todas";} ?>
			
			<?php if ($estado=='todas'){
									$qry="Select * from vacas order by numero";
									$result=mysqli_query($link,$qry);
				?>
                <div class="card">
                    <table class="table table-striped table-dark">
                      <thead>
                        <tr>
                          <th scope="col">NºBrinco</th>
                          <th scope="col">Data de Nascimento</th>
                          <th scope="col">Espécie</th>
                          <th scope="col">Estado</th>
                        </tr>
                      </thead>
					  <?php while ($row=mysqli_fetch_array($result)){?>
                      <tbody>
                        <tr>
						<?php $url = 'sessaovacaqr.php?'.$row['numero'];?>
                          <td><?php echo $row['numero'];?></td>
                          <td><?php echo $row['datanasc'];?></td>
                          <td><?php echo $row['especie'];?></td>
						  <td><?php if($row['estado']==1){echo "Lactação";}else{echo"Seca";}?></td>
						  <td><button onclick="window.location.href='<?php echo $url; ?>';" class="btn btn-primary btn-lg btn-block">Abrir</button></td>
                        </tr>
                      </tbody>
					  <?php	}?>
                    </table>
                </div>
			<?php } else { 
							$qry="Select * from vacas where estado='$estado' order by numero";
							$result=mysqli_query($link,$qry);
				?>
				<div class="card">
                    <table class="table table-striped table-dark">
                      <thead>
                        <tr>
                          <th scope="col">NºBrinco</th>
                          <th scope="col">Data de Nascimento</th>
                          <th scope="col">Espécie</th>
                          <th scope="col">Estado</th>
                        </tr>
                      </thead>
					  <?php while ($row=mysqli_fetch_array($result)){?>
                      <tbody>
                        <tr>
						  <?php $url = 'sessaovacaqr.php?'.$row['numero'];?>
                          <td><?php echo $row['numero'];?></td>
                          <td><?php echo $row['datanasc'];?></td>
                          <td><?php echo $row['especie'];?></td>
						  <td><?php if($row['estado']==1){echo "Lactação";}else{echo"Seca";}?></td>
						  <td><button onclick="window.location.href='<?php echo $url; ?>';" class="btn btn-primary btn-lg btn-block">Abrir</button></td>
                        </tr>
                      </tbody>
					  <?php	}?>
                    </table>
                </div>
			<?php } ?>
            </div>
          </div>
        </section>
		
      </div>
      <?php include 'footer.php';?>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
</body>
</html>