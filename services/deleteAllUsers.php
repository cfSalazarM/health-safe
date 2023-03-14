<?php
    
    $conx = mysqli_connect("localhost","root","","health_safe");
    $sql ="DELETE FROM users where rol = 'user'";
    $res = mysqli_query($conx,$sql);
    session_start();
    if (!$res) {
        $_SESSION['msj'] = "Usuarios no eliminados";
        $_SESSION['typeMsj'] = "error";
        $_SESSION['hmsj'] = "Error!";
        header('Location: http://localhost/health_safe/html/AdminUsers.php');
    } else{
        $_SESSION['msj'] = "Usuarios eliminados correctamente";
        $_SESSION['typeMsj'] = "success";
        $_SESSION['hmsj'] = "Buen trabajo!";
        header('Location: http://localhost/health_safe/html/AdminUsers.php');
    }
?>