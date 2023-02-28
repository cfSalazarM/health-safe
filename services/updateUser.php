<?php
    $name = $_POST['nom'];
    $user = $_POST['user'];
    $phone = $_POST['tel'];
    $password = $_POST['password'];
    $userOld = $_POST['userOld'];

    session_start();

    if (empty($nombre) or empty($user) or empty($pass) or empty($telefono) or empty($rol)) {
        $_SESSION['msj'] = "Por favor, llena todos los campos!!";
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
?>