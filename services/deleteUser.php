<?php
    $user = $_POST['user'];
    
    $conx = mysqli_connect("localhost","root","","health_safe");
    $sql ="DELETE FROM users where user = '$user'";
    $res = mysqli_query($conx,$sql);
    session_start();
    if (!$res) {
        $_SESSION['msj'] = "El registro no se eliminó";
        $_SESSION['typeMsj'] = "error";
        $_SESSION['hmsj'] = "Error";
        header('Location: http://localhost/health_safe/html/AdminUsers.php');
    } else{
        
        $_SESSION['msj'] = "El registro se eliminó correctamente";
        $_SESSION['typeMsj'] = "success";
        $_SESSION['hmsj'] = "Buen trabajo!";
        header('Location: http://localhost/health_safe/html/AdminUsers.php');
    }
?>