<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>4Cows >Preço Leite</title>

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
<?php include'DBConnection.php';?>
<?php include'sessaosegura.php';?>
<body>
  <div id="app">
  <?php include'menuadmin.html';?>
    <div class="main-wrapper main-wrapper-1">
	
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Preço do Leite</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="admin.php">Dashboard</a></div>
              <div class="breadcrumb-item">Preço Leite</div>
            </div>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Histórico de Preços</h4>
                  </div>
				  <article class="article article-style-c">
				  <div class="article-details">
				  <table class="table table-striped table-dark">
                      <thead>
                        <tr>
                          <th scope="col">Preco</th>
                          <th scope="col">Mês</th>
                        </tr>
                      </thead>
					 <?php $qry="Select * from precoleite where ativo=0 order by timestamp desc";
									$result=mysqli_query($link,$qry);
						while ($row=mysqli_fetch_array($result)){?>
                      <tbody>
					  <?php $data=$row['timestamp'];?>
                        <tr>
                          <td><?php echo $row['preco'];?></td>
                          <td><?php echo $data["5"];echo $data["6"];?></td>
						  <td><button onclick="window.location.href='<?php echo 'precoleite_delete.php?'.$row['idpl'];?> ';" class="btn btn-primary btn-lg btn-block">Eliminar</button></td>
                        </tr>
                      </tbody>
					  <?php	}?>
                    </table>
					</div>
					</article>
                </div>

              </div>
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <div class="card-stats-title">Alterar Preço</div>
					<form action="precoleite_add.php" method="POST">
					<input  type="text" class="form-control" name="newpreco">
						<div class="card-header">
							<button type="submit" class="btn btn-primary btn-lg btn-block">Inserir</button>
						</div> 
					</form>
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