<?php
    $name = $_POST['name_user'];
    $user = $_POST['user'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    session_start();
    $aux = $_SESSION['l_ok'];
    $userOld = $aux["user"];

    $conx = mysqli_connect("localhost", "root", "", "health_safe");
        
    $sql = "update users set nom_usuario = '$name', users.user = '$user', phone = '$phone', password = '$password' where user like '$userOld'";
    $res = mysqli_query($conx, $sql);

    if (!$res) {
        
        echo json_encode("No se actualizo");
    }
    else {
        $array = array(
            "user" => $user,
            "password" => $password,
            "rol" => $aux["rol"]
        );
        $_SESSION['l_ok'] = $array;
        echo json_encode('Correcto');
    }
?>