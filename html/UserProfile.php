<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Perfil</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' type='text/css' media='screen' href='../css/bootstrap.min.css'>
  <link rel='stylesheet' type='text/css' media='screen' href='../css/main.css'>
  <script src='../js/bootstrap.bundle.min.js'></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/a535fe116a.js" crossorigin="anonymous"></script>  
</head>

<body>
  <script src="../js/mainUser.js"></script>
  <div class="container-fluid ps-md-0 mt-4">
    <div class="row g-0">
      <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image ms-5 ms-5"></div>
      <div class="col-md-8 col-lg-6">
        <div class="login d-flex align-items-center py-5">
          <div class="container pt-5">
            <div class="row">
              <div class="col-md-9 col-lg-8 mx-auto">
                <h3 class="login-heading mb-4 ms-5">Mi perfil</h3>

                <!-- Sign In Form -->
                <form class="ms-5">
                  <div class="mb-3 w-100">
                    <?php
                      session_start();
                      $aux = $_SESSION['l_ok'];
                      $rol = $aux["rol"];

                      if (isset($_SESSION['l_ok']) and $rol == 'user') {
                        $user = $aux["user"];
                        $password = $aux["password"];
                        $conx = mysqli_connect("localhost", "root", "", "health_safe");

                        $sql = "SELECT nom_usuario, user, phone, users.password FROM users WHERE users.user = '$user' AND users.password = '$password' and rol ='$rol'";
                        $res = mysqli_query($conx, $sql);
                        
                        while ($mostrar = mysqli_fetch_row($res)) {
                    ?>  
                      <label class="form-label">Nombre y Apellido</label>                    
                      <input type="text" class="form-control border border-primary" id="nameUser" value="<?php echo $mostrar['0']?>" name="name_user" disabled readonly>
                      <label class="form-label">Nombre de usuario</label>
                      <input type="text" class="form-control border border-primary" id="User" value="<?php echo $mostrar['1']?>" name="user" disabled readonly>
                      <label class="form-label">Número telefónico</label>
                      <input type="number" class="form-control border border-primary" id="CellUser" value="<?php echo $mostrar['2']?>" name="phone" disabled readonly>
                      <label class="form-label">Contraseña</label>
                      <div id="is-relative">
                        <input type="password" class="form-control border border-primary" id="password" value="<?php echo $mostrar['3']?>" name="password" disabled readonly>
                        <span id="icon"><i class="fa-solid fa-eye"></i></span>
                      </div>
                      <br>
                      <?php
                        }
                      ?>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="../js/viewPassword.js"></script>
                    <?php    
                        }
                        else {
                          if ($rol == 'admin') {
                              header ('Location: http://localhost/health_safe/html/AdminProfile.php');
                          } else {
                              header ('Location: http://localhost/health_safe/html/');
                          }
                        }    
                    ?>
  </body>

</html>