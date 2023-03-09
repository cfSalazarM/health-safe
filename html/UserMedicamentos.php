<!DOCTYPE html>
<html>

<head>
	<meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<title>Administrar Medicamentos</title>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel="stylesheet" href="../css/main.css">
	<link rel='stylesheet' type='text/css' media='screen' href='../css/bootstrap.min.css'>
	<link rel='stylesheet' type='text/css' media='screen' href='../css/main.css'>
	<script src='../js/bootstrap.bundle.min.js'></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
		integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>	
</head>

<body>
	<script src="../js/mainUser.js"></script>
	<div class="container-xl d-flex justify-content-center mt-5 pt-5 align-items-center">
		<div class="table-responsive w-75">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-sm-6">
							<h2>Administrar <b>Medicamentos</b></h2>
						</div>
						<div class="col-sm-6">
							<button class="btn btn-success" data-bs-target="#addMedicineModal"
								data-bs-toggle="modal"><span>Añadir Medicamentos</span></button>
							<button data-bs-target="#deleteMedicinesModal" class="btn btn-danger"
								data-bs-toggle="modal"><span>Eliminar</span></a>
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
					<tbody id="tbody">
					<?php
							session_start();
							$aux = $_SESSION['l_ok'];
                      		$rol = $aux["rol"];
							if (isset($_SESSION['l_ok']) and $rol == 'user') {
								if (isset($_SESSION['msj'])) { 
									$resp =$_SESSION['msj']; 
									$type = $_SESSION['typeMsj']; 
									$hresp = $_SESSION['hmsj']; ?>
									<script>
										Swal.fire(
											'<?php echo $hresp ?>',
											'<?php echo $resp ?>',
											'<?php echo $type ?>'
										)
									</script>
								<?php
									unset($_SESSION['msj']);
									unset($_SESSION['typeMsj']);
									unset($_SESSION['hmsj']);		
								}
								
							$conx = mysqli_connect("localhost", "root", "", "health_safe");

							$sql = "SELECT code, medicine.name, presentation, due_date, amount FROM medicine";
							$res = mysqli_query($conx, $sql);
							while ($mostrar = mysqli_fetch_row($res)) {
							?>	
							<tr>
								<td><?php echo $mostrar['0']?></td>
								<td><?php echo $mostrar['1']?></td>	
								<td><?php echo $mostrar['2']?></td>	
								<td><?php echo $mostrar['3']?></td>
								<td><?php echo $mostrar['4']?></td>
								<td class="tEdit">
									<a href="#editMedicineModal" class="edit" data-bs-toggle="modal" data-bs-code="<?= $mostrar['0']?>"><img src="../assets/icono-editar.svg" width="38" height="38" data-toggle="tooltip" title="Editar"></a>
									<a href="#deleteMedicineModal" class="delete" data-bs-toggle="modal" data-bs-code="<?= $mostrar['0']?>"><img src="../assets/icono-eliminar.svg" width="38" height="38" data-toggle="tooltip" title="Eliminar"></a>
								</td>		
							</tr>
							<?php
								}
							?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- Add Modal HTML -->
<div id="addMedicineModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form class="needs-validation" id="form-addMedicine" method="post" action="../services/registerMedicine.php" novalidate>
				<div class="modal-header">
					<h4 class="modal-title">Añadir Medicamento</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cancelar"></button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Código</label>
						<input type="text" class="form-control" id="código" id="validationCustom01" name="code" required>
						<div class="valid-feedback">
							El dato está correcto!
						</div>
						<div class="invalid-feedback">
							Por favor ingrese su nombre
						</div>
					</div>
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" class="form-control" id="nombreMedicamento" name="name" required>
					</div>
					<div class="form-group">
						<label>Presentación</label>
						<input type="text" class="form-control" id="Presentación" name="presentation" required>
					</div>
					<div class="form-group">
						<label>Fecha de Caducidad</label>
						<input type="date" class="form-control" id="f-caducidad" name="due_date" required>
					</div>
					<div class="form-group">
						<label>Cantidad</label>
						<input type="number" class="form-control" id="Cantidad" name="amount" required>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancelar">
					<input type="submit" class="btn btn-success" id="bAddMedicine" value="Añadir">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editMedicineModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="needs-validation" id="form-editMedicine" method="post" action="../services/updateMedicine.php" enctype="multipart/form-data" novalidate>
					<div class="modal-header">
						<h4 class="modal-title">Editar Medicamento</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cancelar"></button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Código</label>
							<input type="text" class="form-control" id="codeEdit" id="validationCustom01" name="code" required disabled>
							<div class="valid-feedback">
								El dato está correcto!
							</div>
							<div class="invalid-feedback">
								Por favor ingrese su nombre
							</div>
						</div>
						<div class="form-group">
							<label>Nombre</label>
							<input type="text" class="form-control" id="nameEdit" name="name" required>
						</div>
						<div class="form-group">
							<label>Presentación</label>
							<input type="text" class="form-control" id="presentationEdit" name="presentation" required>
						</div>
						<div class="form-group">
							<label>Fecha de caducidad</label>
							<input type="date" class="form-control" id="dateEdit" name="due_date" required>
						</div>
						<div class="form-group">
							<label>Cantidad</label>
							<input type="number" class="form-control" id="amountEdit" name="amount" required>
						</div>
						<input type="text" class="form-control visually-hidden" id="codeOld" name="codeOld" required>
						<input type="number" class="form-control visually-hidden" id="amountOld" name="amountOld" required>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" id="bAddMedicine" value="Editar">
					</div>
				</form>
			</div>
		</div>
	</div>
<!-- Delete Modal HTML -->
<div id="deleteMedicinesModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="../services/deleteAllMedicine.php">
				<div class="modal-header">
					<h4 class="modal-title">Eliminar Medicamentos</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cancelar"></button>
				</div>
				<div class="modal-body">
					<p>Esta seguro de que desea eliminar todos los registros?</p>
					<p class="text-warning"><small>Esta acción no podrá deshacerse.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancelar">
					<input type="submit" class="btn btn-danger" value="Eliminar">
				</div>
			</form>
		</div>
	</div>
</div>
<div id="deleteMedicineModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action = "../services/deleteMedicine.php" method ="post">
					<div class="modal-header">
						<h4 class="modal-title">Eliminar Medicamento</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cancelar"></button>
					</div>
					<div class="modal-body">
						<p>Esta seguro de que desea eliminar este registro?</p>
						<p class="text-warning"><small>Esta acción no podrá deshacerse.</small></p>
					</div>
					<div class="modal-footer">
						<input type="text" class="visually-hidden" name="codeDelete" id="codeDelete">
						<input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-danger" value="Eliminar">
					</div>
				</form>
			</div>
		</div>
	</div>
<script src="../js/editDeleteMedicine.js"></script>
					<?php    
                        }
                        else {
							if ($rol == 'admin') {
								header ('Location: http://localhost/health_safe/html/ReporteMedicamentos.php');
							} else {
								header ('Location: http://localhost/health_safe/html/');
							}
						}      
                    ?>    
</body>
</html>