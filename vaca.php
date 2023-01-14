<!DOCTYPE html>
<?php include'sessaosegura.php';?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>4Cows ><?php echo $_SESSION['vaca'];?></title>
  
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="https://cdn.anychart.com/releases/8.11.0/js/anychart-base.min.js"></script>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/chocolat/dist/css/chocolat.css">
  <link rel="stylesheet" href="assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
   <link rel="stylesheet" href="assets/css/meucss.css">
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

<?php
		$vaca=$_SESSION['vaca'];
		$qry="Select * from vacas where numero ='$vaca' ";
		$result=mysqli_query($link,$qry);
		$row=mysqli_fetch_array($result);
		 $dir = 'imagens_vacas/';
		 $ext= $row['extensao'];;
		 $fotoname=$vaca.$ext;
		?>
<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
	<?php include'menuadmin.html';?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?php echo $vaca;?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="admin.php">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Vacas</a></div>
              <div class="breadcrumb-item">Menu Vaca</div>
            </div>
          </div>

          <div class="section-body">
            

            <div class="row">
              <div class="col-12 col-sm-12 col-lg-4">
                <div class="row">
                  <div class="col-12 col-sm-6 col-lg-12">
                    <div class="card">
                      <div class="card profile-widget">
						<div class="gallery">		  
							<br><img class="gallery-item" data-image="<?php echo $dir.$fotoname;?>" width="100" height="100">
							<div class="profile-widget-items">
							  <div class="profile-widget-item">
								<div class="profile-widget-item-label">DataNascimento</div>
								<div class="profile-widget-item-value"><?php echo $row['datanasc'];?></div>
							  </div>
							  <div class="profile-widget-item">
								<div class="profile-widget-item-label">Idade(anos)</div>
								<div class="profile-widget-item-value"><?php echo calcularIdade($row['datanasc'])?></div>
							  </div>
							  <div class="profile-widget-item">
								<div class="profile-widget-item-label">Estado</div>
								<div class="profile-widget-item-value"><?php if($row['estado']==1){echo "Lactação";}else{echo"Seca";}?></div>
							  </div>
							</div>
						  </div>
						  <div class="profile-widget-description">
							<div class="profile-widget-name"><?php echo $row['especie'];?> <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> <?php echo $row['pais'];?></div></div>
							<?php echo $row['observ'];?>
						  </div>
						  <div class="card-footer text-center">
							<div class="font-weight-bold mb-2"></div> 
						  </div>
						</div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-6 col-lg-12">
                    <div class="card">
                      <div class="card-body">
					  <form action="registarleite.php" method="POST">
                      <div class="form-group">
                      <label for="leite"><h5>Leite</h5></label>
                      <input id="leite" type="text" class="form-control" name="leite" autofocus>
                    </div>
					  <div class="form-group">
					   <button type="submit" class="btn btn-primary btn-lg btn-block">Inserir</button>
					  </div>
					  </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
			  
			  
              <div class="col-12 col-sm-12 col-lg-8">
				 <div class="card card-danger">
                  <div class="card-header">
                    <h4>Média Mensal</h4>
                  </div>
				  <div class="card-body">
				  <div class="row">
				<!--  <form name="filtrar leite" action="vaca.php" method="post">
                  <div class="form-group col-6">
				  <label>Mês</label>
                    <select class="form-control" name="espec">
                        <option value="1">Janeiro</option>
						<option value="2">Fevereiro</option>
						<option value="3">Março</option>
						<option value="4">Abril</option>
						<option value="5">Maio</option>
						<option value="6">Junho</option>
						<option value="7">Julho</option>
 						<option value="9">Setembro</option>
						<option value="10">Outubro</option>
						<option value="11">Novembro</option>
						<option value="12">Dezembro</option>
                      </select>
					</div>
				  <div class="form-group col-6">
					<div class="form-group">
                      <label>Ano</label>
                      <select class="form-control" name="nummae">
                        <option>2022</option>
						<option>2023</option>
                      </select>
                    </div>
                    </div>
					</form>	-->
					<div id="curve_chart" style="width: 100%; height: 600"></div>
				</div>  
				</div>
				
                </div>
				 <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card">
                      <div class="card-body">
					  <form action="registarvaci.php" method="POST">
                      <div class="form-group">
                      <label for="leite"><h5>Vacinação</h5></label>
					<div class="form-group">
                      <label>Medicamento</label>
                      <select class="form-control" name="medic">
						<?php $qry=mysqli_query($link,"Select * from medicamentos where ativo=0");  
							while ($row=mysqli_fetch_array($qry)){?>
                        <option><?php echo $row['nome'];?></option>
							<?php }?>
                      </select>
                    </div>
					  <label>Motivo</label>
                      <input id="motivo" type="text" class="form-control" name="motivo" autofocus>
                    </div>
					  <div class="form-group">
					   <button type="submit" class="btn btn-primary btn-lg btn-block">Inserir</button>
					  </div>
					  </form>
                      </div>
                    </div>
                  </div>
              </div>

            </div>
          </div>
        </section>
      </div>
      <?php include 'footer.php';?>
    </div>
  </div>
  <!-- CalcularIdade -->
  <?php
	
	function calcularIdade($datanasc){
		
		$datanasc = explode("-",$datanasc);

		 $anoNasc    = $datanasc[0];
		 $mesNasc    = $datanasc[1];
		 $diaNasc    = $datanasc[2];
		 
		 $anoAtual   = date("Y");
		 $mesAtual   = date("m");
		 $diaAtual   = date("d");
		 
		 $idade      = $anoAtual - $anoNasc;
		 
		 if ($mesAtual < $mesNasc){
			$idade -= 1;
		} elseif ( ($mesAtual == $mesNasc) && ($diaAtual <= $diaNasc) ){
			$idade -= 1;
		}
		
		return $idade;
	}
  ?>
	
 <!-- Grafico -->
 <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Dia', 'Sales', 'Expenses'],
		  <?php 
			$qry2="SELECT * FROM (SELECT * FROM leite ORDER BY idl DESC LIMIT 8) AS leite ORDER BY leite.idl";
			$qry="Select * from leite where numero ='$vaca' ";
			$result=mysqli_query($link,$qry2);
			$row=mysqli_fetch_array($result);
	      while ($row=mysqli_fetch_array($result)){?>
          ['<?php echo $row['data'];?>', <?php echo $row['quantidade'];?>,3],
          <?php } ?>
        ]);

        var options = {
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
	

 
 
  <!-- General JS Scripts -->
  <script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
  <script src="assets/modules/jquery.sparkline.min.js"></script>
  <!-- <script src="assets/modules/chart.min.js"></script>-->
  <script src="assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
  <script src="assets/modules/summernote/summernote-bs4.js"></script>

  <!-- Page Specific JS File -->
  <script src="assets/js/page/index.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  
</body>
</html>

