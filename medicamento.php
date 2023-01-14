<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html;charset=iso-8859-1"><meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>4Cows >Medicamento</title>
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
	  <?php 
	  $divide  = explode("?", $_SERVER["REQUEST_URI"]);
	  $divide['1'];
	  $med=$divide['1'];
	  $qry="Select * from medicamentos where idm='$med'";
	  $result=mysqli_query($link,$qry);
	  ?>
	  <?php while ($row=mysqli_fetch_array($result)){?>
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?php echo $row['nome'];?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="admin.php">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Medicamentos</a></div>
              <div class="breadcrumb-item"><?php echo $row['nome'];?></div>

            </div>
          </div>

<div class="card card-primary">
              <div class="card-header"><h4>Informação Geral</h4></div>

              <div class="card-body">
			  
                <form enctype="multipart/form-data" action="med_addstock.php" method="POST">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="num">Nome</label>
                      <input id="nome" type="text" class="form-control" name="nome" value="<?php echo $row['nome'];?>" readonly>
                    </div>
                    <div class="form-group col-6">
					<div class="form-group">
                      <label>Data de Validade</label>
                      <input type="text" class="form-control datepicker" name="validade" value="<?php echo $row['validade'];?>" readonly>
                    </div>
                    </div>
                  </div>
				<div class="row">
                 <div class="form-group col-6">
                      <label for="num">Intervalo de Segurança(dias)</label>
                      <input id="intseg" type="text" class="form-control" name="intseg" value="<?php echo $row['intseg'];?>" readonly>
                    </div>
				  <div class="form-group col-6">
                      <label for="num">Quantidade em Stock(ml)</label>
					  <?php $qdisp=$row['qdisp'];?>
                      <input id="qt" type="text" class="form-control" name="qt" value="<?php echo $qdisp;?>" readonly>
                    </div>
                  
				</div>

				  
                  <div class="form-group mb-0">
                    <label>Observações</label>
                    <textarea class="form-control" required="" style="height: 182px;" name="observ"  readonly><?php echo $row['observ'];?></textarea>
                  </div>
				  <br>
				  <?php $_POST["medicamento"]= $row['idm']; ?>
				  <label><h5>Adicionar Stock(ml)</h5></label>
				  
                  <div class="input-group mb-3">					
                        <input type="text" class="form-control" name="stock" aria-label="">
                        <div class="input-group-append">
                          <button class="btn btn-primary" type="submit">Adicionar</button>
                        </div>
                      </div>
                </form>
				<?php }?>
              </div>
            </div>
          <div class="section-body">
            <div class="row">
              
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