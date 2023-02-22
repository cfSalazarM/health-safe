<?php
    $code = $_POST['codeDelete'];
    
    $conx = mysqli_connect("localhost","root","","health_safe");
    $sql ="DELETE FROM medicine where code = '$code'";
    $res = mysqli_query($conx,$sql);
    if (!$res) {
        echo "No se ha Eliminado";
    } else{
        header('Location: http://localhost/health_safe/html/UserMedicamentos.php');
    }
?>