<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<title>Administrar Usuarios</title>
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
<body id="body">
	<script src="../js/mainAdmin.js"></script>
	<div class="container-xl d-flex justify-content-center mt-5 pt-5 align-items-center">
		<div class="table-responsive w-75">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-sm-6">
							<h2>Administrar <b>Usuarios</b></h2>
							<?php
							session_start();
							$aux = $_SESSION['l_ok'];
                      		$rol = $aux["rol"];
							if (isset($_SESSION['l_ok']) and $rol == 'admin') {
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
								?>
							</div>
							<div class="col-sm-6">
								<button class="btn btn-success" data-bs-target="#addUserModal"
									data-bs-toggle="modal" id="add"><span>Añadir Usuario</span></button>
								<button data-bs-target="#deleteUsersModal" class="btn btn-danger"
									data-bs-toggle="modal"><span>Eliminar Todo</span></a>
							</div>
						</div>
					</div>
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Nombre de usuario</th>
								<th>Teléfono</th>
								<th>Contraseña</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody id="tbody">
							<?php
								$conx = mysqli_connect("localhost", "root", "", "health_safe");
	
								$sql = "SELECT nom_usuario, user, phone, users.password FROM users WHERE rol ='user'";
								$res = mysqli_query($conx, $sql);
								while ($mostrar = mysqli_fetch_row($res)) {
								?>	
								<tr>
									<td><?php echo $mostrar['0']?></td>
									<td><?php echo $mostrar['1']?></td>	
									<td><?php echo $mostrar['2']?></td>	
									<td><?php echo $mostrar['3']?></td>
									<td class="tEdit">
										<a href="#editUserModal" class="edit" data-bs-toggle="modal" data-bs-u="<?= $mostrar['1']?>"><img src="../assets/icono-editar.svg" width="38" height="38" data-toggle="tooltip" title="Editar"></a>
										<a href="#deleteUserModal" class="delete" data-bs-toggle="modal" data-bs-u="<?= $mostrar['1']?>"><img src="../assets/icono-eliminar.svg" width="38" height="38" data-toggle="tooltip" title="Eliminar"></a>
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
		<div id="addUserModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form id="form-addUser" action="../services/registerUser.php" method="post" novalidate>
						<div class="modal-header">
							<h4 class="modal-title">Añadir Usuario</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cancelar"></button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>Nombre</label>
								<input type="text" class="form-control" id="nom" name="nom">
							</div>
							<div class="form-group">
								<label>Nombre de usuario</label>
								<input type="text" class="form-control" id="user" name="user">
							</div>
							<div class="form-group">
								<label>Teléfono</label>
								<input type="number" class="form-control" id="tel" name="tel">
							</div>
							<div class="form-group">
								<label>Contraseña</label>
								<input type="text" class="form-control" id="password" name="password">
							</div>
							<input type="text" class="form-control visually-hidden" id="rol" name="rol" value="user">
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancelar">
							<input type="submit" class="btn btn-success" id="bAddUser" value="Añadir">
						</div>
					</form>
					
				</div>
			</div>
		</div>
		<!-- Edit Modal HTML -->
		<div id="editUserModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form id="form-editUser" method="post" action="../services/updateUser.php" novalidate>
						<div class="modal-header">
							<h4 class="modal-title">Editar Usuario</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cancelar"></button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label>Nombre</label>
								<input type="text" class="form-control" id="nomEdit" name="nom">
							</div>
							<div class="form-group">
								<label>Nombre de usuario</label>
								<input type="text" class="form-control" id="userEdit" name="user"
								>
							</div>
							<div class="form-group">
								<label>Teléfono</label>
								<input type="number" class="form-control" id="telEdit" name="tel">
							</div>
							<div class="form-group">
								<label>Contraseña</label>
								<input type="text" class="form-control" id="passwordEdit" name="password">
							</div>
							<input type="text" class="form-control visually-hidden" id="userOld" name="userOld">
						</div>
						<div class="modal-footer">
							<input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancelar">
							<input type="submit" class="btn btn-success" id="bAddUser" value="Editar">
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Delete Modal HTML -->
		<div id="deleteUsersModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="../services/deleteAllUsers.php">
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
		
		<div id="deleteUserModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action = "../services/deleteUser.php" method ="post">
						<div class="modal-header">
							<h4 class="modal-title">Eliminar Usuario</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cancelar"></button>
						</div>
						<div class="modal-body">
							<p>Esta seguro de que desea eliminar este registro?</p>
							<p class="text-warning"><small>Esta acción no podrá deshacerse.</small></p>
						</div>
						<div class="modal-footer">
							<input type="text" class="visually-hidden" name="user" id="userDelete">
							<input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancelar">
							<input type="submit" class="btn btn-danger" value="Eliminar">
						</div>
					</form>
				</div>
			</div>
		</div>
		<script src="../js/editDeleteUser.js"></script>
		<script src="../js/cleanModalUsers.js"></script>
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