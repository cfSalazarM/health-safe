<?php
    $name = $_POST['nom'];
    $user = $_POST['user'];
    $phone = $_POST['tel'];
    $password = $_POST['password'];
    $userOld = $_POST['userOld'];

    $conx = mysqli_connect("localhost", "root", "", "health_safe");
        
    $sql = "update users set nom_usuario = '$name', users.user = '$user', phone = '$phone', password = '$password' where user like '$userOld'";
    $res = mysqli_query($conx, $sql);

    if (!$res) {
        
        echo json_encode("No se actualizo");
    }
    else {
        echo json_encode('Correcto');
    }
    header('Location: http://localhost/health_safe/html/AdminUsers.php')
?>