<?php
    $user = $_POST['user'];
    
    $conx = mysqli_connect("localhost","root","","health_safe");
    $sql ="DELETE FROM users where user = '$user'";
    $res = mysqli_query($conx,$sql);
    if (!$res) {
        echo "No se ha Eliminado";
    } else{
        session_start();
        $_SESSION['msj'] = "El registro se eliminó correctamente";
        $_SESSION['typeMsj'] = "success";
        $_SESSION['hmsj'] = "Buen trabajo!";
        header('Location: http://localhost/health_safe/html/AdminUsers.php');
    }
?>