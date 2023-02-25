document.write(
    '<nav class="navbar navbar-expand-lg bg-body-tertiary ">' +
    '<div class="container-fluid">' +
    '<a class="navbar-brand" href="../html/AdminHome.php"><img src="../assets/logo.png" width="120px" height="100px" alt=""></a>' +
    '<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"' +
    'aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">' +
    '<span class="navbar-toggler-icon"></span>' +
    '</button>' +
    '<div class="collapse navbar-collapse" id="navbarNavAltMarkup">' +
    '<div class="navbar-nav">' +
    '<a class="nav-link active" aria-current="page" href="../html/AdminHome.php">Inicio</a>' +
    '<a class="nav-link" href="../html/AdminProfile.php">Mi Perfil</a>' +
    '<a class="nav-link" href="../html/AdminUsers.php">Admin Usuarios</a>' +
    '<a class="nav-link" href="../html/ReporteMedicamentos.php">Ver Medicamentos</a>' +
    '</div>' +
    '</div>' +
    '<div class="row align-items-center">' +
    '<div class="col">' +
    '<form action="../services/close_session.php" method="GET">' +
    '<button type="submit" class="btn btn-primary">Cerrar sesión</button>' +
    '</form>' +
    '</div>' +
    '</div>' +
    '</div>' +
    '</nav>'
)