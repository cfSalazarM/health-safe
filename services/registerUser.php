<?php
    $nombre = $_POST['nom'];
    $user = $_POST['user'];
    $pass = $_POST['password'];
    $telefono = $_POST['tel'];
    $rol = $_POST['rol'];
    $conx = mysqli_connect("localhost", "root", "", "health_safe");
        
    $sql = "insert into users values ('$nombre','$user','$pass','$telefono','$rol')";
    $res = mysqli_query($conx, $sql);

    header('Location: http://localhost/health_safe/html');
?>