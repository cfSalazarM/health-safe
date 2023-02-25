<!DOCTYPE html>
<html>

<head>
	<meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<title>Medicamentos</title>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel="stylesheet" href="../css/main.css">
	<link rel='stylesheet' type='text/css' media='screen' href='../css/bootstrap.min.css'>
	<link rel='stylesheet' type='text/css' media='screen' href='../css/main.css'>
	<script src='../js/bootstrap.bundle.min.js'></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
		integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
		crossorigin="anonymous"></script>
</head>

<body>
	<?php
		session_start();
        $aux = $_SESSION['l_ok'];
        $rol = $aux["rol"];
		if(isset($_SESSION['l_ok']) and $rol == 'admin' ){
		?>
		<script src="../js/mainAdmin.js"></script>
	<div class="container-xl d-flex justify-content-center mt-5 pt-5 align-items-center">
		<div class="table-responsive w-75">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-sm-6">
							<h2>Medicamentos</b></h2>
						</div>
					</div>
				</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Código</th>
							<th>Nombre</th>
							<th>Presentación</th>
							<th>Fecha de Caducidad</th>
							<th>Cantidad</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$conx = mysqli_connect("localhost", "root", "", "health_safe");

							$sql = "SELECT * from medicine";
							$res = mysqli_query($conx, $sql);
							while ($mostrar = mysqli_fetch_row($res)) {
							?>	
							<tr>
								<td><?php echo $mostrar['0']?></td>
								<td><?php echo $mostrar['1']?></td>	
								<td><?php echo $mostrar['2']?></td>	
								<td><?php echo $mostrar['3']?></td>
								<td><?php echo $mostrar['4']?></td>
							</tr>
							<?php
								}
							?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
		<?php    
            }
            else {
				if ($rol == 'user') {
					header ('Location: http://localhost/health_safe/html/UserMedicamentos.php');
				} else {
					header ('Location: http://localhost/health_safe/html/');
				}
			}       
        ?>    
	
</body>

</html>