<?php
// cargar las variables con los datos
    $nombre = $_POST['nom'];
    $user = $_POST['user'];
    $pass = $_POST['password'];
    $telefono = $_POST['tel'];
    $rol = $_POST['rol'];

    #Petición de conexión
    session_start();
//verifica que lAS variables no esten vacías 
    if (empty($nombre) or empty($user) or empty($pass) or empty($telefono) or empty($rol)) {
        $_SESSION['msj'] = "Por favor, llena todos los campos!!";
        $_SESSION['typeMsj'] = "error";
        $_SESSION['hmsj'] = "Error";

        header('Location: http://localhost/health_safe/html/AdminUsers.php');
    }
    else {
        $conexion = new mysqli("localhost", "root", "", "health_safe") or die('could not connect to database');

        $queryRegistro = $conexion->query("SELECT COUNT(user) AS cantidad FROM users WHERE user ='$user'");
        $row = $queryRegistro->fetch_assoc();
       

        #Si la cantidad es mayor a 0 significa que ya hay un registro, por lo contrario, se inserta a la base de datos.

        if($row['cantidad'] >0) {
            $_SESSION['msj'] = "El usuario ingresado ya existe!!";
            $_SESSION['typeMsj'] = "error";
            $_SESSION['hmsj'] = "Error";
            header('Location: http://localhost/health_safe/html/AdminUsers.php');

        }else{
            $conx = mysqli_connect("localhost", "root", "", "health_safe"); 
            $sql = "insert into users values ('$nombre','$user','$telefono','$pass','$rol')";
            $res = mysqli_query($conx, $sql);

            if (!$res) {
                $_SESSION['msj'] = "No se guardó el registro!!";
                $_SESSION['typeMsj'] = "error";
                $_SESSION['hmsj'] = "Error";
                header('Location: http://localhost/health_safe/html/AdminUsers.php');
            }
            else {
                if ($rol == 'admin') {
                    header('Location: http://localhost/health_safe/html');
                }
                else {
                    header('Location: http://localhost/health_safe/html/AdminUsers.php');
                    
                }
                
                $_SESSION['msj'] = "Registro exitoso";
                $_SESSION['typeMsj'] = "success";
                $_SESSION['hmsj'] = "Buen trabajo!";
            }    

        
            //
        }
        $conexion->close(); //cierr La conexion con la base de datos
    }
    
?>