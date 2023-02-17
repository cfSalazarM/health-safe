<!DOCTYPE html> 
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Farmacia Health&Safe</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/bootstrap.min.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../css/main.css'>
    <script src='../js/bootstrap.bundle.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid ps-md-0 mt-4">
        <div class="row g-0">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image ms-5 ms-5"></div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container pt-5">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <h3 class="login-heading mb-4">Inicio de sesión</h3>

                                <!-- Sign In Form -->
                                <form action="backend.php" method="post">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control user" id="floatingInput"
                                            placeholder="name@example.com" name="user">
                                        <label for="floatingInput">Usuario</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control password" id="floatingPassword"
                                            placeholder="Password" name="password">
                                        <label for="floatingPassword">Contraseña</label>
                                    </div>
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelect"
                                            aria-label="Floating label select example" name="rol">
                                            <option value="admin">Administrador</option>
                                            <option value="user">Usuario</option>
                                        </select>
                                        <label for="floatingSelect">Seleccione su rol</label>
                                    </div>
                                    <br>
                                    <div class="d-grid">
                                        <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2"
                                            id="bLog" type="submit">Iniciar sesión</button>
                                        <div class="text-center">
                                            <a class="small" href="#">Olvidaste tu contraseña?</a>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="#" data-bs-target="#addUserModal" data-bs-toggle="modal" > Registrar Administrador</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<div id="addUserModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="./registrarAdmin.php" method="post" class="needs-validation" novalidate>
				<div class="modal-header">
					<h4 class="modal-title">Registrar Administrador</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cancelar"></button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Nombres</label>
						<input type="text" class="form-control" id="nombre" name="nom" required>
						<div class="valid-feedback">
							El dato está correcto!
						</div>
						<div class="invalid-feedback">
							Por favor ingrese su nombre
						</div>
					</div>
					<div class="form-group">
						<label>Usuario</label>
						<input type="text" class="form-control" id="nomUsuario" name="user" required>
					</div>
					<div class="form-group">
						<label>Teléfono</label>
						<input type="number" class="form-control" id="tel" name="tel" required>
					</div>
					<div class="form-group">
						<label>Contraseña</label>
						<input type="password" class="form-control" id="contraseña" name="password" required>
					</div>
                    <div class="form-group" hidden>
						<label>Rol</label>
						<input type="text" class="form-control" id="rol" name="rol" value="admin" required>
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

</html>