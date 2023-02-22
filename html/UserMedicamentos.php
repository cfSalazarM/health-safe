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
							<button class="btn btn-success" data-bs-target="#addUserModal"
								data-bs-toggle="modal"><span>Añadir Medicamentos</span></button>
							<button data-bs-target="#deleteUsersModal" class="btn btn-danger"
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
				</table>
			</div>
		</div>
	</div>
</body>

<!-- Add Modal HTML -->
<div id="addUserModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form class="needs-validation" novalidate>
				<div class="modal-header">
					<h4 class="modal-title">Añadir Medicamento</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cancelar"></button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Código</label>
						<input type="text" class="form-control" id="código" id="validationCustom01" required>
						<div class="valid-feedback">
							El dato está correcto!
						</div>
						<div class="invalid-feedback">
							Por favor ingrese su nombre
						</div>
					</div>
					<div class="form-group">
						<label>Nombre</label>
						<input type="text" class="form-control" id="nombreMedicamento" required>
					</div>
					<div class="form-group">
						<label>Presentación</label>
						<input type="text" class="form-control" id="Presentación" required>
					</div>
					<div class="form-group">
						<label>Fecha de Caducidad</label>
						<input type="date" class="form-control" id="f-caducidad" required>
					</div>
					<div class="form-group">
						<label>Cantidad</label>
						<input type="number" class="form-control" id="Cantidad" required>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancelar">
					<input type="submit" class="btn btn-success" id="bAddUser" value="Añadir">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteUsersModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">
					<h4 class="modal-title">Eliminar Usuarios</h4>
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

</html>