<?php
    $code = $_POST['codeDelete'];
    
    $conx = mysqli_connect("localhost","root","","health_safe");
    $sql ="DELETE FROM medicine where code = '$code'";
    $res = mysqli_query($conx,$sql);
    session_start();
    if (!$res) {
        $_SESSION['msj'] = "El Medicamento no se eliminó";
        $_SESSION['typeMsj'] = "error";
        $_SESSION['hmsj'] = "Error";
        header('Location: http://localhost/health_safe/html/UserMedicamentos.php');
    }else{
        
        $_SESSION['msj'] = "El medicamento se eliminó correctamente";
        $_SESSION['typeMsj'] = "success";
        $_SESSION['hmsj'] = "Buen trabajo!";
        header('Location: http://localhost/health_safe/html/UserMedicamentos.php');
    }
?>