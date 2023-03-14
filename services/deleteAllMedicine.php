<?php
    
    $conx = mysqli_connect("localhost","root","","health_safe");
    $sql ="DELETE FROM medicine";
    $res = mysqli_query($conx,$sql);
    session_start();
    if (!$res) {
        echo "No se ha Eliminado";
    } else{
        $_SESSION['msj'] = "Medicamentos eliminados correctamente";
        $_SESSION['typeMsj'] = "success";
        $_SESSION['hmsj'] = "Buen trabajo!";
        header('Location: http://localhost/health_safe/html/UserMedicamentos.php');
    }
?>