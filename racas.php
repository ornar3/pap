<!DOCTYPE html>
<html lang="en">
<?php include'sessaosegura.php';?>
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>4cows >Raças</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">
  
  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
<!-- Start GA -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
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
            <h1>Raças</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Raças</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-4 col-lg-4">
                <article class="article article-style-c">

                  <div class="article-details">
					<div class="card">
                    <table class="table table-striped table-dark">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Raça</th>
                        </tr>
                      </thead>
					 <?php $qry="Select * from racas where ativo=0";
									$result=mysqli_query($link,$qry);
						while ($row=mysqli_fetch_array($result)){?>
                      <tbody>
                        <tr>
                          <td><?php echo $row['idr'];?></td>
                          <td><?php echo $row['raca'];?></td>
						  <td><button onclick="window.location.href='<?php echo 'raca_delete.php?'.$row['idr'];?> ';" class="btn btn-primary btn-lg btn-block">Eliminar</button></td>
                        </tr>
                      </tbody>
					  <?php	}?>
                    </table>
                </div>
                  </div>
                </article>
              </div>
              <div class="col-12 col-md-4 col-lg-4">
                <article class="article article-style-c">
                  <div class="article-details">
				  <div class="card-stats-title">Adicionar Raça</div>
					<form action="raca_add.php" method="POST">
					<input id="raca_add" type="text" class="form-control" name="raca">
						<div class="card-header">
							<button type="submit" class="btn btn-primary btn-lg btn-block">Inserir</button>
						</div> 
					</form>
                  </div>
                </article>
              </div>
              <div class="col-12 col-md-4 col-lg-4">
                <article class="article article-style-c">
                  <div class="article-details">
                    <div class="card">
                    <table class="table table-striped table-dark">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Raça</th>
                        </tr>
                      </thead>
					 <?php $qry="Select * from racas where ativo=1";
									$result=mysqli_query($link,$qry);
						while ($row=mysqli_fetch_array($result)){?>
                      <tbody>
                        <tr>
                          <td><?php echo $row['idr'];?></td>
                          <td><?php echo $row['raca'];?></td>
						  <td><button onclick="window.location.href='<?php echo 'raca_rest.php?'.$row['idr'];?> ';" class="btn btn-primary btn-lg btn-block">Restaurar</button></td>
                        </tr>
                      </tbody>
					  <?php	}?>
                    </table>
                </div>
                </article>
              </div>
            </div>
         ... </div>
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