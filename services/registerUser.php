<?php
    $nombre = $_POST['nom'];
    $user = $_POST['user'];
    $pass = $_POST['password'];
    $telefono = $_POST['tel'];
    $rol = $_POST['rol'];
    $conx = mysqli_connect("localhost", "root", "", "health_safe"); 
    $sql = "insert into users values ('$nombre','$user','$telefono','$pass','$rol')";
    $res = mysqli_query($conx, $sql);

    if (!$res) {
        echo json_encode("No se hizo el registro");
    }
    else {
        if ($rol == 'admin') {
            header('Location: http://localhost/health_safe/html');
        }
        else {
            echo json_encode('Correcto');
        }
    }
    
?>