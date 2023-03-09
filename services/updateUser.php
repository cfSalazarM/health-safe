<?php
    $name = $_POST['nom'];
    $user = $_POST['user'];
    $phone = $_POST['tel'];
    $password = $_POST['password'];
    $userOld = $_POST['userOld'];

    session_start();

    if (empty($name) or empty($user) or empty($password) or empty($phone) or empty($userOld)) {
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

        }
        else {
            $conx = mysqli_connect("localhost", "root", "", "health_safe");
        
            $sql = "update users set nom_usuario = '$name', users.user = '$user', phone = '$phone', password = '$password' where user like '$userOld'";
            $res = mysqli_query($conx, $sql);
        
            if (!$res) {
                
                echo json_encode("No se actualizo");
            }
            else {
                $_SESSION['msj'] = "Registro Actualizado";
                $_SESSION['typeMsj'] = "success";
                $_SESSION['hmsj'] = "Buen trabajo!";
            }
            header('Location: http://localhost/health_safe/html/AdminUsers.php');
        }
        $conexion->close();
    }
?>